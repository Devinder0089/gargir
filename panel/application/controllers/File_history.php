<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_history extends MY_Controller{


    public function __construct(){
        parent::__construct();

        if(!auth_check()){
            redirect('login');
        }
        
    }

    public function index(){
        $user=$this->auth_model->get_logged_user();
        $data['files'] =$this->files_history_model->files();
    	$data['title'] = "File history";
        if($user->role == 'contractor'){
             $this->db->where(['contractor_id' => $user->id, 'role' => 'client']);
             $data['clients'] = $this->db->get('users')->result();
        }else{
            $this->db->where(['contractor_id' => $user->contractor_id, 'role' => 'client']);
            $data['clients'] = $this->db->get('users')->result();
        }
       
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/file-history/index', $data);
        $this->load->view('admin/includes/_footer');

    }

      public function files_post(){
        $user=$this->auth_model->get_logged_user();
        if($user->role == 'client'){
            $client_id = $user->id;
        }else{
            $client_id = $this->input->post('client_id');
        }
        if($user->role == 'contractor'){
             $user_id = $user->id;
        }else{
            $user_id = $user->contractor_id;
        }
        // $project_id = $this->input->post('project_id');
        $title = $this->input->post('title');
        if(empty($title) || empty($client_id) || empty($user_id)){
             redirect($this->agent->referrer());
        }
       
        $data=[
        'user_id'=>$user_id,
        'client_id'=>$client_id,
        'title'=>$title,
        'uploaded_by'=>$user->id,
        ];
        if($this->files_history_model->files_post($data)){
         $this->session->set_flashdata('success',trans('file_created'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('file_create_error'));
        redirect($this->agent->referrer());
       }
    }
    
    
    public function file_status_change(){
       
        $status = $this->input->post('status');
        $file_id = $this->input->post('file_id');
        if(empty($file_id)){
             redirect($this->agent->referrer());
        }
       
        $data=[
        'status'=>$status,
        ];
        
        $this->db->where('id', $file_id);
        if($this->db->update('files', $data)){
         $this->session->set_flashdata('success',trans('file_updated'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('file_update_error'));
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
    
    public function delete_file(){
       
         $id=$this->input->post('id');
         $this->db->where('id',$id);
        if($this->db->delete('files')) {
          $this->session->set_flashdata('success', trans('file_deleted'));
                redirect($this->agent->referrer());
        } else {
           $this->session->set_flashdata('error', trans('file_delete_error'));
            redirect($this->agent->referrer());
        }

    }

}