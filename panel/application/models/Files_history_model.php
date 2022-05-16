<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_history_model extends CI_Model{

     var $dir_path="";

    public function __construct(){
        parent::__construct();

    $this->dir_path=dirname(dirname(__dir__));

    }

    
    public function files(){
        $user=$this->auth_model->get_logged_user();
        if($user->role == 'contractor'){
           $this->db->where('files.user_id', $user->id);
        }elseif($user->role == 'worker'){
            
            $this->db->where('files.user_id', $user->contractor_id);
        }else{
            $this->db->where('files.client_id', $user->id);
        }
        $this->db->join('users', 'files.uploaded_by = users.id');
        $this->db->select('files.*, users.email as user');
        return $this->db->get('files')->result();
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
              $config['upload_path'] = 'uploads/project/files/';
              $config['allowed_types'] = '*';
              $config['max_size'] = '10000';
              $config['file_name'] = $image_name;
              $this->load->library('upload',$config); 
              if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $data['files'] = $uploadData['file_name'];
              }
            }
        if($this->db->insert('files',$data)){
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

    