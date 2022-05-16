<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model{

     var $dir_path="";

    public function __construct(){
        parent::__construct();

    $this->dir_path=dirname(dirname(__dir__));

    }
    
    public function index(){
        $user=$this->auth_model->get_logged_user();
        if($user && $user->role == 'admin'){
            $result=$this->db->get('projects')->result(); 
        }else if($user && $user->role == 'contractor'){
            $this->db->where('uid',$user->id);
            $result=$this->db->get('projects')->result(); 
        }else if($user && $user->role == 'worker'){
            $project = array();
            $assigned = $this->db->get('projects_assign')->result();
            foreach($assigned as $assign){
                $worker = explode(',', $assign->assign_user_id);
                if(in_array($user->id, $worker)){
                    $this->db->where('id', $assign->project_id);
                    $project[] = $this->db->get('projects')->row();
                }
            }
            $result = $project;
        }else{
            $this->db->where('client_id',$user->id);
            $apartments = $this->db->get('apartments')->result();
            $project = array();
            foreach($apartments as $apartment){
                 $this->db->where('id', $apartment->project_id);
                  $pro = $this->db->get('projects')->row();
                if(!in_array($pro, $project)){
                    $this->db->where('id', $apartment->project_id);
                    $project[] = $this->db->get('projects')->row();
                }
            }
            $result = $project;
        }
        return $result;

    }

   public function create($data){
       $time = time();
       $total = array();
        $count = count($_FILES['files']['name']);
          for($i=0;$i<$count;$i++){
            if(!empty($_FILES['files']['name'][$i])){
                $image_url = $_FILES['files']['tmp_name'][$i];
                $image_explode =explode(".",$_FILES['files']['name'][$i]);
                $image_type= end($image_explode);
                 $image_name=$time.$i.".".$image_type;
                $img_upload =$this->dir_path.'/uploads/project/'.$image_name;
                $img_upload_update =$image_name;
                $check=move_uploaded_file($image_url, $img_upload);
                $total[]=$img_upload_update;
          }
              
          }
          $data['images'] = implode(',', $total);
        $data['slug']=str_slug($data['title']."-".uniqid());

         if($this->db->insert('projects',$data)){
         $insert_id = $this->db->insert_id();

         }else{
            return false;
         }
         $assign_user_id=$this->input->post('assign_user_id');
         $assign = implode(',', $assign_user_id);
            $adddata=[
            'project_id'=>$insert_id,
            'assign_user_id'=>$assign,
            ];
            $reslt= $this->add_projects_assign($adddata);
  
        return $reslt;
    }  
    
     public function edit($data){
         $time = time();
         $total = array();
        $id=$this->input->post('project_id');
        $this->db->where('id', $id);
        $project = $this->db->get('projects')->row();
         if(!empty($_FILES['files']['name'][0])){
             $old_images = explode(',',$project->images);
             foreach($old_images as $old){
                  unlink($this->dir_path.'/uploads/project/'.$old);
             }
            $count = count($_FILES['files']['name']);
              for($i=0;$i<$count;$i++){
                  
                    $image_url = $_FILES['files']['tmp_name'][$i];
                    $image_explode =explode(".",$_FILES['files']['name'][$i]);
                    $image_type= end($image_explode);
                    $image_name=$time.$i.".".$image_type;
                    $img_upload =$this->dir_path.'/uploads/project/'.$image_name;
                    $img_upload_update =$image_name;
                    $check=move_uploaded_file($image_url, $img_upload);
                    $total[]=$img_upload_update;
              }
             
            $data['images'] = implode(',',$total);
        }else{
            
             $data['images'] = $project->images;
        }

        $this->db->where('id', $id);
        $this->db->update('projects', $data);
        $assign_user_id=$this->input->post('assign_user_id');
        $assign = implode(',', $assign_user_id);
        $adddata=[
        'assign_user_id'=>$assign,
        ];
        $this->db->where('project_id', $id);
        $reslt=  $this->db->update('projects_assign', $adddata);
        return $reslt;
    }  


    public function project_edit($slug){
         $result=$this->get_single_projects_assign_by_join([
            'projects.slug'=>$slug,
            ]); 
  
        return $result;
    }
    
     public function add_projects_assign($data){
       
         if($this->db->insert('projects_assign',$data)){
            return true;
         }else{
            return false;
         }
    
    }
    
    public function project_details($slug){

       $result=$this->get_single_projects_assign_by_join([
            'projects.slug'=>$slug,
            ]); 
  
        return $result;
        
    }

   
     public function project_count(){
        $project = $this->index();
        $result = count($project);
        return $result;
    }


   public function delete_project($id){
        $this->db->where('id',$id);
        return $this->db->delete('projects');
    }
    
    public function get_project_assign($where=false){
     if($where){
     $this->db->where($where);
        }
   
    $this->db->join('projects_assign', 'projects.id = projects_assign.project_id');
    $this->db->select('projects.*, projects_assign.assign_user_id as assign');
    $query = $this->db->get('projects');
    return $query->result();
    }
    
    public function get_single_projects_assign_by_join($where=false){

     if($where){
     $this->db->where($where);
        }
   
    $this->db->join('projects_assign', 'projects.id = projects_assign.project_id');
    $this->db->select('projects.*, projects_assign.assign_user_id as assign');
    $query = $this->db->get('projects');
    return $query->row();
    }
    
    public function changestatus($data){
        $id = $this->input->post('project_id');
        $this->db->where('id', $id);
        $this->db->update('projects', $data);
        return true; 
    }
    
    public function project_reports($id){
        $this->db->where('project_id', $id);
        $this->db->join('users', 'project_reports.user_id = users.id');
        $this->db->select('project_reports.*, users.email as user');
        $query = $this->db->get('project_reports');
        return $query->result();
    }
    
    public function project_reports_post($data){
        $time = time();
        $total = array();
        $count = count($_FILES['files']['name']);
          for($i=0;$i<$count;$i++){
            if(!empty($_FILES['files']['name'][$i])){
                $image_url = $_FILES['files']['tmp_name'][$i];
                $image_explode =explode(".",$_FILES['files']['name'][$i]);
                $image_type= end($image_explode);
                $image_name=$time.$i.".".$image_type;
                $img_upload =$this->dir_path.'/uploads/project/'.$image_name;
                $img_upload_update =$image_name;
                $check=move_uploaded_file($image_url, $img_upload);
                $total[]=$img_upload_update;
          }
              
          }
          $data['images'] = implode(',', $total);

         if($this->db->insert('project_reports',$data)){
             return $total;
         }else{
            return false;
         }
    }
    
      public function project_reports_edit_post($data){
      $time = time();
      $id = $this->input->post('id');
      $this->db->where('id',$id);
      $report = $this->db->get('project_reports')->row();
         if(!empty($_FILES['files']['name'][0])){
             $old_images = explode(',',$report->images);
             foreach($old_images as $old){
                  unlink($this->dir_path.'/uploads/project/'.$old);
             }
              $count = count($_FILES['files']['name']);
              for($i=0;$i<$count;$i++){
                    $image_url = $_FILES['files']['tmp_name'][$i];
                    $image_explode =explode(".",$_FILES['files']['name'][$i]);
                    $image_type= end($image_explode);
                    $image_name=$time.$i.".".$image_type;
                    $img_upload =$this->dir_path.'/uploads/project/'.$image_name;
                    $img_upload_update =$image_name;
                    $check=move_uploaded_file($image_url, $img_upload);
                    $total[]=$img_upload_update;
              }
              $data['images'] = implode(',', $total);
        }else{
             $data['images'] = $report->images;
        }
        $this->db->where('id', $id);
        if($this->db->update('project_reports',$data)){
             return $data['images'];
         }else{
            return false;
         }
    }
    
    public function get_report_by($id){
        $this->db->where('project_reports.id', $id);
        $this->db->join('users', 'project_reports.user_id = users.id');
         $this->db->join('projects', 'project_reports.project_id = projects.id');
        $this->db->select('project_reports.*, users.email as user, projects.slug as project_slug');
        return $this->db->get('project_reports')->row();
    }
    
     public function delete_project_report($id){
        $this->db->where('id', $id);
        $this->db->delete('project_reports');
        return true;
    }
    
    
    public function total_finance_in_debt($where=false){
        $user = $this->auth_model->get_logged_user();
        $result = $this->get_finance_sum();
        $this->db->select_sum('saled_in');
        $this->db->where('user_id', $user->id);
        $query=$this->db->get('apartments');
        $total=$query->row()->saled_in;
        if($total && $result){
            return $total - $result;
        }else{
            return false;
        }
    }
    
    public function sum_payment_by_project($id){
        
        $this->db->select_sum('saled_in');
        $this->db->where('project_id', $id);
        $query=$this->db->get('apartments');
        $total=$query->row()->saled_in;
        return $total;
    }
    
    public function get_paid_payment_sum_by_project($id){
        $this->db->where('project_id', $id);
        $query=$this->db->get('apartments')->result();
        $total = 0;
        foreach($query as $que){
            $this->db->select_sum('payment');
            $this->db->where(['apartment_id' => $que->id, 'status' => 1]);
            $query = $this->db->get('apartment_payments');
            $total+=$query->row()->payment;
        }
        
        $data = $total;
        return $data;
    }
    
     public function total_money_raised_projects(){
        
        $this->db->select_sum('payment');
        $this->db->where('status', 1);
        $query=$this->db->get('apartment_payments');
        $total=$query->row()->payment;
        return $total;
    }
    
}

    