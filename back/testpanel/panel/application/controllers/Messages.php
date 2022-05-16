<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller{


    public function __construct(){
        parent::__construct();
       
        if(!auth_check()){
            redirect('login');
        }
    }


    /**
     * Index Page
     */
    public function index(){
    $user=user();

    $data['title'] = "Messages";
    $data['messages'] = $this->message_model->get_message_join_by_where(['messages.user_id'=>$user->id]);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/message/messages', $data);
    $this->load->view('admin/includes/_footer');
    }

    /**
     * Index Page
     */
    public function receive_message(){
        $user=user();

        //pin_msg_update
        $this->pin_msg_update();

        $data['title'] = "Receive Messages";
        $data['messages'] = $this->message_model->get_message_join_by_where(['messages.parent_id'=>$user->id]);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/message/receive_messages', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * send_message
     */
    public function pin_msg_update(){

        $user=user();
        return $this->message_model->update_messages(['parent_id'=>$user->id],['pin'=>'0']);
        
    }


    /**
     * send_message
     */
    public function add_send_message(){

        $user=user();
        
        $data['title'] = "Send Messages";
        $data['user'] =$user;
        $data['messages'] = $this->message_model->get_message_by_where(['user_id'=>$user->id]);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/message/add', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * send_message_post
     */
    public function send_message_post(){
         //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

         $user=$this->auth_model->get_logged_user();

        

        $userselect=$this->input->post('userselect');
        $subject=$this->input->post('subject');
        $content=$this->input->post('content');

        if(empty($userselect[0])){
            $this->session->set_flashdata('error','Please select users.');
            redirect($this->agent->referrer());
        }

        if(empty($subject)){
            $this->session->set_flashdata('error','Please enter subject.');
            redirect($this->agent->referrer());
        }

        if(empty($content)){
        $this->session->set_flashdata('error','Please enter message.');
        redirect($this->agent->referrer());
        }

       foreach($userselect as $vl){
         $data=[
            'user_id'=>$user->id,
            'name'=>$subject,
            'content'=>$content,
            'parent_id'=>$vl,
        ];

         $dataadd=$this->message_model->add_message_data($data);
           
       }
        
       if($dataadd){

         $this->session->set_flashdata('success','Send message success.');
        redirect($this->agent->referrer());

       }else{
        $this->session->set_flashdata('error','Send message failed.');
        redirect($this->agent->referrer());
       }


    }

}