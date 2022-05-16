<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment_model extends CI_Model{

     var $dir_path="";

    public function __construct(){
        parent::__construct();

    $this->dir_path=dirname(dirname(__dir__));

    }
    
    public function index($id){
       $user=$this->auth_model->get_logged_user();
       if($user->role == 'client'){
           $result = $this->get_data_apartments_assign_by_join([
            'apartments.project_id' => $id,
            'apartments.client_id'   => $user->id
           ]);
       }else{
           $result = $this->get_data_apartments_assign_by_join([
            'apartments.project_id' => $id,
           ]);
       }
       
       return $result;
    }
    


   public function create($data){
      $time = time();
        $count = count($_FILES['images']['name']);
          for($i=0;$i<$count;$i++){
            if(!empty($_FILES['images']['name'][$i])){
                $image_url = $_FILES['images']['tmp_name'][$i];
                $image_explode =explode(".",$_FILES['images']['name'][$i]);
                $image_type= end($image_explode);
                $image_name=$time.$i.".".$image_type;
                $img_upload =$this->dir_path.'/uploads/project/apartment/'.$image_name;
                $img_upload_update =$image_name;
                $check=move_uploaded_file($image_url, $img_upload);
                $total[]=$img_upload_update;
          }
              
          }
          $data['images'] = implode(',', $total);

        $data['slug']=str_slug($data['title']."-".uniqid());
        $sold_status = $data['sold_status'];
         if($this->db->insert('apartments',$data)){
             $insert_id = $this->db->insert_id();
            if($sold_status == 'sold'){
                 $payment_mode=$this->input->post('payment_mode');
                $adddata = [
                    'user_id' => $data['user_id'],
                    'client_id' => $data['client_id'],
                    'payment' => $data['price_paid'],
                    'apartment_id' => $insert_id,
                    'payment_mode' => $payment_mode,
                    'status'       => 1
                    ];
            $this->db->insert('apartment_payments',$adddata);
            }
            
            return true;
         }else{
             return false;
         }
    }  
    
     public function edit($data){
        $time = time();
         $id = $this->input->post('apartment_id');
         $client_id=$this->input->post('client_id');
          $this->db->where('id',$id);
          $apartment = $this->db->get('apartments')->row();
         if(!empty($_FILES['images']['name'][0])){
             $old_images = explode(',',$apartment->images);
             foreach($old_images as $old){
                  unlink($this->dir_path.'/uploads/project/apartment/'.$old);
             }
           $count = count($_FILES['images']['name']);
              for($i=0;$i<$count;$i++){
                    $image_url = $_FILES['images']['tmp_name'][$i];
                    $image_explode =explode(".",$_FILES['images']['name'][$i]);
                    $image_type= end($image_explode);
                    $image_name=$time.$i.".".$image_type;
                    $img_upload =$this->dir_path.'/uploads/project/apartment/'.$image_name;
                    $img_upload_update =$image_name;
                    $check=move_uploaded_file($image_url, $img_upload);
                    $total[]=$img_upload_update;
              }
              $data['images'] = implode(',', $total);
        }else{
             $data['images'] = $apartment->images;
        }
        
          $sold_status = $this->input->post('sold_status');
    
          if($sold_status == 'unsold'){
                $this->db->where('apartment_id',$id);
                $this->db->delete('apartment_payments');
            }else if($sold_status == 'sold'){
                $this->db->where('apartment_id',$id);
                $this->db->order_by('id','asc');
                $query = $this->db->get('apartment_payments');
                $payment=$query->row();
                if($payment){
                    $payment_mode=$this->input->post('payment_mode');
                    $update = [
                    'payment' => $data['price_paid'],
                    'payment_mode' => $payment_mode
                    ];
                     $this->db->where('id',$payment->id);
                    $this->db->update('apartment_payments',$update);
                }else{
                    $payment_mode=$this->input->post('payment_mode');
                    $adddata = [
                    'user_id' => $apartment->user_id,
                    'client_id' => $data['client_id'],
                    'payment' => $data['price_paid'],
                    'apartment_id' => $id,
                    'payment_mode' => $payment_mode,
                    'status'       => 1
                    ];
                    if($this->db->insert('apartment_payments',$adddata)){
                        $client = $this->auth_model->get_user($client_id);
                        $this->load->config('email');
                        $this->load->library('email');
                        $from = $this->config->item('smtp_user');
                        $subject = "this is testing email";
                        $to = $client->email;
                        $datas = array(
                         'name'=> $client->first_name,
                         'status' => 'we assign you your bought apartment. please login to see your apartment status.'
                             );
                        $message = $this->load->view('admin/email/status_change',$datas,true);
                        $this->email->set_newline("\r\n");
                        $this->email->from($from);
                        $this->email->to($to);
                        $this->email->subject($subject);
                        $this->email->message($message);
                        $this->email->send();
                    };
                }
            }
             $this->db->where('id',$id);
             if($this->db->update('apartments',$data)){
                return true;
         }else{
             return false;
         }

    }  

 
    public function apartment_details($slug){

     $result=$this->get_single_apartment_assign_by_join([
            'apartments.slug'=>$slug,
            ]); 
  
    return $result;

    }
    
     public function apartment_by_id($id){

        $this->db->where('id', $id);
        return $this->db->get('apartments')->row();

    }

    public function apartment_count(){
        $user = $this->auth_model->get_logged_user();
        $this->db->where(['status' => '1', 'client_id' => $user->id]);
        $result = $this->db->count_all_results('apartments');
        return $result;
    }
    
     public function project_count(){
        $this->db->where('status','1');
        $logged_user = $this->auth_model->get_logged_user(); 
        if(is_contractor()){
            $this->db->where('uid',$logged_user->id);
        }
        $result = $this->db->count_all_results('projects');
        return $result;
    }

 
     public function get_single_apartment_assign_by_join($where=false){

     if($where){
     $this->db->where($where);
        }
    $this->db->join('projects', 'apartments.project_id = projects.id');
    // $this->db->join('`users` `worker`', 'apartments.assign_user_id = worker.id', 'left');
    $this->db->join('`users` `client`', 'apartments.client_id = client.id', 'left');
    $this->db->select('apartments.*, client.email as client, projects.title as projectTitle, projects.slug as project_slug');
    $query = $this->db->get('apartments');
    return $query->row();
    }
   
   public function get_data_apartments_assign_by_join($where=false){

     if($where){
     $this->db->where($where);
        }
    // $this->db->join('`users` `worker`', 'apartments.assign_user_id = worker.id', 'left');
    $this->db->join('`users` `client`', 'apartments.client_id = client.id', 'left');
    $this->db->join('`projects`', 'apartments.project_id = projects.id');
    $this->db->select('apartments.*, client.email as client, client.first_name as name');
    $query = $this->db->get('apartments');
    return $query->result();
    }

   public function delete_apartment($id){

       $this->db->where('id',$id);
       if($this->db->delete('apartments')){
           return true;
       }else{
           return false;
       }

   
    }

    
    public function apartment_reports($id){
        $this->db->where('apartment_id', $id);
        $this->db->join('users', 'apartment_reports.user_id = users.id');
        $this->db->select('apartment_reports.*, users.email as user');
        $query = $this->db->get('apartment_reports');
        return $query->result();
    }
    
    public function apartment_reports_post($data){
        $time = time();
        $count = count($_FILES['files']['name']);
          for($i=0;$i<$count;$i++){
            if(!empty($_FILES['files']['name'][$i])){
              $image_url = $_FILES['files']['tmp_name'][$i];
                $image_explode =explode(".",$_FILES['files']['name'][$i]);
                $image_type= end($image_explode);
                $image_name=$time.$i.".".$image_type;
                $img_upload =$this->dir_path.'/uploads/project/apartment/'.$image_name;
                $img_upload_update =$image_name;
                $check=move_uploaded_file($image_url, $img_upload);
                $total[]=$img_upload_update;
            }
          }
          $data['images'] = implode(',', $total);
        if($this->db->insert('apartment_reports',$data)){
             return $total;
         }else{
            return false;
         }
    }
    
      public function apartment_reports_edit_post($data){
      $time = time();
      $id = $this->input->post('id');
      $this->db->where('id',$id);
      $report = $this->db->get('apartment_reports')->row();
        if(!empty($_FILES['files']['name'][0])){
             $old_images = explode(',',$report->images);
             foreach($old_images as $old){
                  unlink($this->dir_path.'/uploads/project/apartment/'.$old);
             }
            $count = count($_FILES['files']['name']);
              for($i=0;$i<$count;$i++){
                    $image_url = $_FILES['files']['tmp_name'][$i];
                    $image_explode =explode(".",$_FILES['files']['name'][$i]);
                    $image_type= end($image_explode);
                    $image_name=$time.$i.".".$image_type;
                    $img_upload =$this->dir_path.'/uploads/project/apartment/'.$image_name;
                    $img_upload_update =$image_name;
                    $check=move_uploaded_file($image_url, $img_upload);
                    $total[]=$img_upload_update;
              }
            $data['images'] = implode(',', $total);
        }else{
             $data['images'] = $report->images;
        }
        $this->db->where('id', $id);
        if($this->db->update('apartment_reports',$data)){
             return $data['images'];
         }else{
            return false;
         }
    }
    
    public function get_report_by($id){
        $this->db->where('apartment_reports.id', $id);
         $this->db->join('apartments', 'apartment_reports.apartment_id = apartments.id');
        $this->db->join('users', 'apartment_reports.user_id = users.id');
        $this->db->select('apartment_reports.*, users.email as user, apartments.slug as apart_slug');
        return $this->db->get('apartment_reports')->row();
    }
    
     public function delete_apartment_report($id){
        $this->db->where('id', $id);
        $this->db->delete('apartment_reports');
        return true;
    }
    
    public function changestatus($data){
        $id = $this->input->post('apartment_id');
        $this->db->where('id', $id);
        $this->db->update('apartments', $data);
        return true; 
    }
    
     public function get_payment_by($id){
        $this->db->where('apartment_id', $id);
        return $this->db->get('apartment_payments')->result();
    }
    
      public function add_payment($data){
        $this->db->insert('apartment_payments',$data);
        return true;
    }
    
     public function update_payment($data){
        $paymentid=$this->input->post('paymentid');
        $this->db->where('id', $paymentid);
        $this->db->update('apartment_payments',$data);
        return true;
    }
    
    public function delete_apartment_payment($id){
        $this->db->where('id', $id);
        $this->db->delete('apartment_payments');
        return true;
    }
    
    public function sum_payment_by_id($id){
        $this->db->select_sum('payment');
        $this->db->where(['apartment_id' => $id, 'status' => 1]);
        $query=$this->db->get('apartment_payments');
        $total=$query->row()->payment;
        return $total;
    }
    
     public function get_single_payment_by($id){
        $this->db->where('id', $id);
        return $this->db->get('apartment_payments')->row();
    }
    
     public function client_apartments($id){

       $result = $this->get_data_apartments_assign_by_join([
            'apartments.client_id' => $id,
           ]);
       return $result;
    }
    
     public function allApartments(){
       $user = $this->auth_model->get_logged_user();
       if($user->role == 'admin'){
            $result = $this->get_data_apartments_assign_by_join();
       }elseif($user->role == 'client'){
           $result = $this->get_data_apartments_assign_by_join([
                'apartments.client_id' => $user->id,
               ]);
       }elseif($user->role == 'contractor'){
            $result = $this->get_data_apartments_assign_by_join([
                'apartments.user_id' => $user->id,
               ]);
       }else{
           $apa = array();
           $apartments = $this->get_data_apartments_assign_by_join();
          foreach($apartments as $apartment){
               $this->db->where('project_id', $apartment->project_id);
               $pro = $this->db->get('projects_assign')->row();
               $worker = explode(',', $pro->assign_user_id);
               if(in_array($user->id, $worker)){
                   $apa[] = $apartment;
               }
          }
           $result = $apa;
       }
       return $result;
    }
    
    public function files($id){
        $this->db->where('apartment_files.apartment_id', $id);
        $this->db->join('users', 'apartment_files.user_id = users.id');
        $this->db->select('apartment_files.*, users.email as user');
        return $this->db->get('apartment_files')->result();
    }
    
     public function files_post($data){
        $time = time();
            if(!empty($_FILES['files']['name'])){
              $image_explode =explode(".",$_FILES['files']['name']);
              $image_type= end($image_explode);
              $image_name=$time.".".$image_type;
              $_FILES['file']['name'] = $_FILES['files']['name'];
              $_FILES['file']['type'] = $_FILES['files']['type'];
              $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
              $_FILES['file']['error'] = $_FILES['files']['error'];
              $_FILES['file']['size'] = $_FILES['files']['size'];
              $config['upload_path'] = 'uploads/project/apartment/files';
              $config['allowed_types'] = '*';
              $config['max_size'] = '5000';
              $config['file_name'] = $image_name;
              $this->load->library('upload',$config); 
              if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $data['files'] = $uploadData['file_name'];
              }
            }
        if($this->db->insert('apartment_files',$data)){
             return true;
         }else{
            return false;
         }
    }
    
    public function get_files_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get('apartment_files')->row();
    }
    
    public function delete_apartment_file($id){
        $this->db->where('id', $id);
        $this->db->delete('apartment_files');
        return true;
    }
}

    