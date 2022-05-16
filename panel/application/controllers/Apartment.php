<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment extends MY_Controller{

    public function __construct(){
        parent::__construct();

        if(!auth_check()){
            redirect('login');
        }
    }


    /**
     * Index Page
     */
    public function index($slug){
        $data['title'] = trans('apartments');
        $data['project'] = $this->project_model->project_details($slug);
        $data['apartments'] = $this->apartment_model->index($data['project']->id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/index', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * add
     */
    public function add($slug){
      
        $data['title'] = trans('add_apartment');
        $data['user'] =user();
        $data['project'] = $this->project_model->project_details($slug);
         if(empty($data['project'])){
            redirect(base_url() . 'admin');
        }
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/add', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * add
     */
    public function add_apartment_post(){
       
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }
        $project_id=$this->input->post('project_id');
        $this->db->where('id',$project_id);
        $project = $this->db->get('projects')->row();
        $user=$project->uid;
        
        $client_id=$this->input->post('client_id');
        $title=$this->input->post('title');
        $apartment_no=$this->input->post('apartment_no');
        $owner_name=$this->input->post('owner_name');
        $sale_price= ($this->input->post('sale_price') == " ")? 0 : $this->input->post('sale_price');
        $saled_in=($this->input->post('saled_in') == " ")? 0: $this->input->post('saled_in');
        $price_paid=($this->input->post('price_paid') == " ")?0 :$this->input->post('price_paid');
        $no_of_rooms=$this->input->post('no_of_rooms');
        $floor=$this->input->post('floor');
        $city=$this->input->post('city');
        $zipcode=$this->input->post('zipcode');
        $additional=$this->input->post('additional');
        $address=$this->input->post('address');
        $discount=$this->input->post('discount');
        $url=$this->input->post('url');
        
        $sold_status = $this->input->post('sold_status');
        
         if(empty($sold_status)){
            $this->session->set_flashdata('error',trans('please_select').' '. trans('sold_status'));
            redirect($this->agent->referrer());
        }
        if(empty($title)){
            $this->session->set_flashdata('error',trans('please_enter').' '. trans('title'));
            redirect($this->agent->referrer());
        }

        
        if(empty($apartment_no)){
            $this->session->set_flashdata('error',trans('please_enter').' '. trans('apartment_no'));
            redirect($this->agent->referrer());
        }
        
       if(empty($sale_price)){
            $this->session->set_flashdata('error',trans('please_enter').' '. trans('asking_sale_price'));
            redirect($this->agent->referrer());
        }

        if($sold_status == 'sold'){
            if(empty($client_id)){
                $this->session->set_flashdata('error',trans('please_select').' '. trans('client'));
                redirect($this->agent->referrer());
            }
            if(empty($saled_in)){
                $this->session->set_flashdata('error',trans('please_enter').' '. trans('sale_in'));
                redirect($this->agent->referrer());
            }
    
            if(empty($price_paid)){
                $this->session->set_flashdata('error',trans('please_enter').' '. trans('price_paid_by_client'));
                redirect($this->agent->referrer());
            }
            
            if($price_paid > $saled_in){
                $this->session->set_flashdata('error',trans('price_paid_not_more_than_sale_price'));
                redirect($this->agent->referrer());
            }
        }
     
        $data=[
        'user_id'=>$user,
        'title'=>$title,
        'client_id'=>$client_id,
        'apartment_no'=>$apartment_no,
        'discount'=>$discount,
        'owner_name'=>$owner_name,
        'sale_price'=>$sale_price,
        'saled_in'=>$saled_in,
        'price_paid'=>$price_paid,
        'no_of_rooms'=>$no_of_rooms,
        'floor'=>$floor,
        'city'=>$city,
        'zipcode'=>$zipcode,
        'additional'=>$additional,
        'address'=>$address,
        'project_id'=>$project_id,
        'url'=>$url,
        'sold_status'=>$sold_status,
        ];


        if($this->apartment_model->create($data)){
           if($sold_status == 'sold'){
               $client = $this->auth_model->get_user($client_id);
                $this->load->config('email');
                $this->load->library('email');
                $from = $this->config->item('smtp_user');
                $subject = "this is testing email";
                $to = $client->client;
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
           }
            $this->session->set_flashdata('success',trans('apartment_created'));
            redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('apartment_create_error'));
        redirect($this->agent->referrer());
       }

    }

    /**
    * project_details
    */
    public function apartments_details($slug){
      
        $data['title'] = "Apartment details";

        $data['apartment'] = $this->apartment_model->apartment_details($slug);
        if(empty($data['apartment'])){
            redirect(base_url() . 'admin');
        }
        $data['total'] = $this->apartment_model->sum_payment_by_id($data['apartment']->id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/details', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
    * project_details
    */
    public function apartment_edit($slug){
        $data['title'] = "Apartment Edit";
        $data['user'] =user();
        $data['apartment'] = $this->apartment_model->apartment_details($slug);
        if(empty($data['apartment'])){
            redirect(base_url() . 'admin');
        }
        $this->db->where('apartment_id',$data['apartment']->id);
        $this->db->order_by('id','asc');
        $query = $this->db->get('apartment_payments');
        $data['payment']=$query->row();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/edit', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function apartment_edit_post(){
        
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }
        
        $client_id=$this->input->post('client_id');
        $apartment_no=$this->input->post('apartment_no');
        $owner_name=$this->input->post('owner_name');
        $sale_price= ($this->input->post('sale_price') == " ")? 0 : $this->input->post('sale_price');
        $saled_in=($this->input->post('saled_in') == " ")? 0: $this->input->post('saled_in');
     
        $price_paid=($this->input->post('price_paid') == " ")?0 :$this->input->post('price_paid');
        $no_of_rooms=$this->input->post('no_of_rooms');
        $floor=$this->input->post('floor');
        $city=$this->input->post('city');
        $zipcode=$this->input->post('zipcode');
        $additional=$this->input->post('additional');
        $address=$this->input->post('address');
        $discount=$this->input->post('discount');
        $url=$this->input->post('url');
        $sold_status = $this->input->post('sold_status');
        $id = $this->input->post('apartment_id');
          if(empty($sold_status)){
            $this->session->set_flashdata('error',trans('please_select').' '. trans('sold_status'));
            redirect($this->agent->referrer());
        }
        if(empty($apartment_no)){
            $this->session->set_flashdata('error',trans('please_enter').' '. trans('apartment_no'));
            redirect($this->agent->referrer());
        }
        
       if(empty($sale_price)){
            $this->session->set_flashdata('error',trans('please_enter').' '. trans('asking_sale_price'));
            redirect($this->agent->referrer());
        }
       

        if($sold_status == 'sold'){
            $this->db->where('apartment_id',$id);
            $this->db->order_by('id','asc');
            $query = $this->db->get('apartment_payments');
            $payment=$query->row();
            $sum = $this->apartment_model->sum_payment_by_id($id);
            $total = $sum + $price_paid - $payment->payment;
            if($total > $saled_in){
                 $this->session->set_flashdata('error',trans('price_paid_not_more_than_sale_price'));
                redirect($this->agent->referrer());
            }
            if(empty($client_id)){
                $this->session->set_flashdata('error',trans('please_select').' '. trans('client'));
                redirect($this->agent->referrer());
            }
            if(empty($saled_in)){
                $this->session->set_flashdata('error',trans('please_enter').' '. trans('sale_in'));
                redirect($this->agent->referrer());
            }
    
            if(empty($price_paid)){
                $this->session->set_flashdata('error',trans('please_enter').' '. trans('price_paid_by_client'));
                redirect($this->agent->referrer());
            }
        }

        $data=[
        'client_id'=>$client_id,
        'apartment_no'=>$apartment_no,
        'discount'=>$discount,
        'owner_name'=>$owner_name,
        'sale_price'=>$sale_price,
        'saled_in'=>$saled_in,
        'price_paid'=>$price_paid,
        'no_of_rooms'=>$no_of_rooms,
        'floor'=>$floor,
        'city'=>$city,
        'zipcode'=>$zipcode,
        'additional'=>$additional,
        'address'=>$address,
        'url'=>$url,
         'sold_status'=>$sold_status,
        ];


        if($this->apartment_model->edit($data)){
         $this->session->set_flashdata('success',trans('apartment_updated'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('apartment_update_error'));
        redirect($this->agent->referrer());
       }
    }



    /**
     * delete_project_post
     */
    public function delete_apartment_post(){
       
         $id=$this->input->post('id');

        if($this->apartment_model->delete_apartment($id)) {
            $this->session->set_flashdata('success', trans('apartment_deleted'));
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans('apartment_delete_error'));
            redirect($this->agent->referrer());
        }

    }

    
    public function getUser(){
        $email=$this->input->post('email');
        $data['ajax'] ="";
        $data['user'] = $this->auth_model->get_user_by_email($email);  
        $data['contractor'] = $this->auth_model->get_user($data['user']->contractor_id);
        if($data['user']->role == 'worker'){
            $data['title'] = 'worker';
            echo json_encode($this->load->view('admin/worker/details', $data));
        }else{
            $data['title'] = 'Client';
            echo json_encode($this->load->view('admin/client/details', $data));
        }
        
    }
    
    public function apartmentReports($slug){
        $data['title'] = trans('apartment_reports');
        $data['apartment'] = $this->apartment_model->apartment_details($slug);
        if(empty($data['apartment'])){
            redirect(base_url() . 'admin');
        }
        $data['apartment_reports'] = $this->apartment_model->apartment_reports($data['apartment']->id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/apartment_reports', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function apartmentReports_post(){
        $user=$this->auth_model->get_logged_user();
        $apartment_id = $this->input->post('apartment_id');
        $apartment = $this->apartment_model->get_single_apartment_assign_by_join(['apartments.id' => $apartment_id]);
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        if(empty($title) || empty($apartment_id) || empty($description)){
             redirect($this->agent->referrer());
        }
        $data=[
        'user_id'=>$user->id,
        'apartment_id'=>$apartment_id,
        'title'=>$title,
        'description'=>$description
        ];
        if($file = $this->apartment_model->apartment_reports_post($data)){
            if(isset($_POST['type'])){
                $this->load->config('email');
                $this->load->library('email');
                $from = $this->config->item('smtp_user');
                $subject = "this is testing email";
                $to = $apartment->client;
                $message = $description;
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($title);
                $this->email->message($message);
                if(!empty($file)){
                   foreach($file as $f){
                    $this->email->attach("https://zeroitsolutions.com/gargir/panel/uploads/project/apartment/$f");
                    } 
                }
                $this->email->send(); 
            }
            
         $this->session->set_flashdata('success',trans('report_created'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('report_create_error'));
        redirect($this->agent->referrer());
       }
    }
    
    public function apartmentReportEdit($id){
        $data['title'] = trans('apartment_reports_edit');
        $data['report'] = $this->apartment_model->get_report_by($id);
        
        if(empty($data['report'])){
           redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/report_edit', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function apartmentReportEdit_post(){
        $id = $this->input->post('id');
        $user=$this->auth_model->get_logged_user();
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $apartment_id = $this->input->post('apartment_id');
        $apartment = $this->apartment_model->get_single_apartment_assign_by_join(['apartments.id' => $apartment_id]);
        if(empty($title) || empty($description) || empty($id)){
             redirect($this->agent->referrer());
        }
        $data=[
        'updated_by'=>$user->id,
        'title'=>$title,
        'description'=>$description
        ];
          
        if($files = $this->apartment_model->apartment_reports_edit_post($data)){
            $file = explode(',', $files);
            if(isset($_POST['type'])){
                $this->load->config('email');
                $this->load->library('email');
                $from = $this->config->item('smtp_user');
                $subject = "this is testing email";
                $to = $apartment->client;
                $message = $description;
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($title);
                $this->email->message($message);
                if(!empty($file)){
                   foreach($file as $f){
                    $this->email->attach("https://zeroitsolutions.com/gargir/panel/uploads/project/apartment/$f");
                    } 
                }
                $this->email->send(); 
            }
         $this->session->set_flashdata('success',trans('report_update_error'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('report_update_error'));
        redirect($this->agent->referrer());
       }
    }
    
     public function getDetails(){
        $id=$this->input->post('id');
        $data['ajax'] ="";
        $data['report'] = $this->apartment_model->get_report_by($id);
        echo json_encode($this->load->view('admin/apartment/report_details', $data));
    }
    
    public function delete_apartment_report_post(){
       
         $id=$this->input->post('id');
        if($this->apartment_model->delete_apartment_report($id)) {
            $this->session->set_flashdata('success', trans('report_deleted'));
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans('report_delete_error'));
            redirect($this->agent->referrer());
        }

    }
    
    public function apartment_status_change(){
       $status = $this->input->post('status');
       $id = $this->input->post('apartment_id');
       $apartment = $this->apartment_model->get_single_apartment_assign_by_join(['id' => $id]);
       $data=[
        'status'=>$status,
        ];
        if($status == 1){
            $value = 'we inform you that we started building your apartment';
        }else if($status == 2){
            $value = 'we inform you that your apartment work is Completed';
        }else{
            $value = 'we are sorry to inform you that your apartment work is delay for some days';
        }
       if($this->apartment_model->changestatus($data)) {
           $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = "this is testing email";
            $to = $apartment->client;
            $datas = array(
             'name'=> $apartment->client,
             'status' => $value,
                 );
            $message = $this->load->view('admin/email/status_change',$datas,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            $this->session->set_flashdata('success', trans('status_change_success'));
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans('status_change_error'));
            redirect($this->agent->referrer());
        }
        
    }
    
     public function getPayments(){
        $id=$this->input->post('id');
        $data['ajax'] ="";
        $data['payments'] = $this->apartment_model->get_payment_by($id);
        $apartment = $this->apartment_model->apartment_by_id($id);
        $data['saled_in'] = $apartment->saled_in;
        $data['total_paid'] = $this->apartment_model->sum_payment_by_id($id);
        $data['total_debt'] = $data['saled_in'] - $data['total_paid'];
        echo json_encode($this->load->view('admin/apartment/payment', $data));
    }
    
     public function addPayment(){
        $id=$this->input->post('apartment_ids');
        $new_payment=$this->input->post('payment');
         $user=$this->auth_model->get_logged_user();
         if($user->role == 'client'){
              $status=0;
         }else{
             $status=$this->input->post('status');
         }
        $payment_mode=$this->input->post('payment_mode');
        $apartment = $this->apartment_model->apartment_by_id($id);
        $payment_sum = $this->apartment_model->sum_payment_by_id($id);
        if($payment_sum){
            $add = $payment_sum + $new_payment;
            if($add >= $apartment->saled_in){
                echo json_encode(['error' => trans('total_sum_exceeds')]);
            }else{
                $data = [
                    'user_id'      => $apartment->user_id,
                    'client_id'    => $apartment->client_id,
                    'apartment_id' => $id,
                    'payment'      => $new_payment,
                    'status'       => $status,
                    'payment_mode' => $payment_mode
                    ];
                 if($this->apartment_model->add_payment($data)){
                    echo json_encode(['success' => trans('payment_created')]);
                 }else{
                     echo json_encode(['problem' => trans('payment_create_error')]);
                 }
            }
        }else{
              echo json_encode(['problem' => trans('payment_create_error')]);
        }
    }
    
    public function editPayment(){
        $id=$this->input->post('id');
        $paymentid=$this->input->post('paymentid');
        $new_payment=$this->input->post('payment');
        $status=$this->input->post('status');
        $payment_mode=$this->input->post('payment_mode');
        $apartment = $this->apartment_model->apartment_by_id($id);
        $old_payment_row = $this->apartment_model->get_single_payment_by($paymentid);
        $old_payment = $old_payment_row->payment;
        $payment_sum = $this->apartment_model->sum_payment_by_id($id);
        $new_sum = $payment_sum - $old_payment;
        if($payment_sum){
            $add = $new_sum + $new_payment;
            if($add >= $apartment->saled_in){
                echo json_encode(['error' => trans('total_sum_exceeds')]);
            }else{
                $data = [
                    'payment'      => $new_payment,
                    'status'       => $status,
                    'payment_mode' => $payment_mode
                    ];
                 if($this->apartment_model->update_payment($data)){
                    echo json_encode(['success' => trans('payment_updated')]);
                 }else{
                     echo json_encode(['problem' => trans('payment_update_error')]);
                 }
            }
        }
    }
    
     public function delete_apartment_payment(){
       
         $id=$this->input->post('ids');
        if($this->apartment_model->delete_apartment_payment($id)) {
           echo json_encode(['success' => trans('payment_deleted')]);
        } else {
           echo json_encode(['problem' => trans('payment_delete_error')]);
        }

    }
    
    public function allApartments(){
        $data['title'] = trans('apartments');
        $data['client'] = "";
        $data['apartments'] = $this->apartment_model->allApartments();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    
     public function files($slug){
        $data['title'] = trans('apartment_files');
        $apartment = $this->apartment_model->apartment_details($slug);
        if(empty($apartment)){
            redirect(base_url() . 'admin');
        }
        $data['apartment_id'] = $apartment->id;
        $data['files'] = $this->apartment_model->files($apartment->id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/apartment/files', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function files_post(){
        $user=$this->auth_model->get_logged_user();
        $apartment_id = $this->input->post('apartment_id');
        $title = $this->input->post('title');
        if(empty($title) || empty($apartment_id)){
             redirect($this->agent->referrer());
        }
        $data=[
        'user_id'=>$user->id,
        'apartment_id'=>$apartment_id,
        'title'=>$title,
        ];
        if($this->apartment_model->files_post($data)){
         $this->session->set_flashdata('success',trans('file_created'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('file_create_error'));
        redirect($this->agent->referrer());
       }
    }
    
     public function send_files_post(){
       $email = $this->input->post('email');
       $subject = $this->input->post('subject');
       $message = $this->input->post('message');
       $file_id = $this->input->post('file_id');
       $files = $this->apartment_model->get_files_by_id($file_id);
        if(empty($files)){
            $this->session->set_flashdata('error', trans('file_sending_error'));
            redirect($this->agent->referrer());
        }
           $attach_file = "https://zeroitsolutions.com/gargir/panel/uploads/project/apartment/files/$files->files";
           $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = $subject;
            $to = $email;
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->attach($attach_file);
            if($this->email->send()){
                $this->session->set_flashdata('success', trans('file_send_success'));
                redirect($this->agent->referrer());
            }
            else {
            $this->session->set_flashdata('error', trans('file_sending_error'));
            redirect($this->agent->referrer());
        }
        
    }
    
    public function delete_apartment_file(){
       
         $id=$this->input->post('id');
        if($this->apartment_model->delete_apartment_file($id)) {
          $this->session->set_flashdata('success', trans('file_deleted'));
                redirect($this->agent->referrer());
        } else {
           $this->session->set_flashdata('error', trans('file_delete_error'));
            redirect($this->agent->referrer());
        }

    }
}