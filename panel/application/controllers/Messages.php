<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller{


    public function __construct(){
        parent::__construct();
       
        if(!auth_check()){
            redirect('login');
        }

    $this->system_dir =dirname(dirname(__dir__)).'/';

    }


    /**
     * Index Page
     */
    public function index(){
    $user=user();

    $data['title'] = trans('messages');
    $data['messages'] = $this->message_model->get_message_join_by_where(['messages.user_id'=>$user->id]);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/message/messages', $data);
    $this->load->view('admin/includes/_footer');

    }

public function sentmail($id){
    $user=user();
    
    $message=$this->message_model->get_message_row_by_where(['id'=>$id]);
    if(empty($message)){
        $this->session->set_flashdata('error',trans('mail_failed'));
        redirect($this->agent->referrer());
    }

    $subject=$message->name;

    /************ start sent mail and update message table ********************/
    $html='<div class="nadlanpromsg">';
    $html.="<h1>hi Dear</h1></br>";
    $html.='<p>'.$message->content.'</p>';
    if(!empty($message->file)){
    $html.='</br><img src="'.base_url().$message->file.'">';
    }
    $html.='</div>';

    $usr=$this->message_model->get_table_row_by_table_where('users',['id'=>$message->parent_id]);

    if(empty($usr)){
        $this->session->set_flashdata('error',trans('mail_failed'));
        redirect($this->agent->referrer());
    }


    if($this->email_model->send_email($usr->email,$subject,$html)){
        $this->message_model->update_messages(['id'=>$dataadd],['send_mail'=>'1']);
       
         $this->session->set_flashdata('success',trans('mail_sent'));
        redirect($this->agent->referrer());

    }else{

        $this->session->set_flashdata('error',trans('mail_failed'));
        redirect($this->agent->referrer());
    }
  
    /************ end sent mail and update message table ********************/

}

    public function details($id){
    
    $data['title'] = trans('messages');
    $data['messages'] = $this->message_model->get_message_row_by_where(['id'=>$id]);
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/message/messages_details', $data);
    $this->load->view('admin/includes/_footer');

    }

    /**
     * Index Page
     */
    public function receive_message(){
        $user=user();

        //pin_msg_update
        $this->pin_msg_update();

        $data['title'] = trans('received_messages');
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
        
        $data['title'] = trans('send_message');
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
    $this->session->set_flashdata('error',trans('please_select').' '. trans('users'));
    redirect($this->agent->referrer());
    }

    if(empty($subject)){
    $this->session->set_flashdata('error',trans('please_enter').' '. trans('subject'));
    redirect($this->agent->referrer());
    }

    if(empty($content)){
    $this->session->set_flashdata('error',trans('please_enter').' '. trans('message'));
    redirect($this->agent->referrer());
    }


    if(isset($_FILES["file"]["name"])){
   
        //define upload folder name
        $file_upload_dir ="uploads/message/";       
        //get upload file name
        $file_name =time().basename($_FILES["file"]["name"]);
        //file upload path
        $file_target_upload =$this->system_dir.$file_upload_dir.$file_name;
        //get file upload path
        $file_upload_url =$file_upload_dir.$file_name;
        $filetmp_name = $_FILES["file"]["tmp_name"];
        if(move_uploaded_file($filetmp_name, $file_target_upload)){
        $file_url=$file_upload_url;
        }else{

            $file_url='';
        }

    }else{

         $file_url='';
    } 

    
       foreach($userselect as $vl){

         $data=[
            'user_id'=>$user->id,
            'name'=>$subject,
            'content'=>$content,
            'parent_id'=>$vl,
            'file'=>$file_url,
        ];

        $dataadd=$this->message_model->add_message_data($data);

        /************ start sent mail and update message table ********************/
        $html='<div class="nadlanpromsg">';
        $html.="<h1>hi Dear</h1></br>";
        $html.='<p>'.$content.'</p>';
        if(!empty($file_url)){
        $html.='</br><img src="'.base_url().$file_url.'">';
        }
        $html.='</div>';

        $usr=$this->message_model->get_table_row_by_table_where('users',['id'=>$vl]);
        if(!empty($usr)){
            if($this->email_model->send_email($usr->email,$subject,$html)){
            $this->message_model->update_messages(['id'=>$dataadd],['send_mail'=>'1']);
            }
        }
        /************ end sent mail and update message table ********************/
      
       }
        

       if($dataadd){
         $this->session->set_flashdata('success',trans('mail_sent'));
        redirect($this->agent->referrer());

       }else{
        $this->session->set_flashdata('error',trans('mail_failed'));
        redirect($this->agent->referrer());
       }


    }

    public function delete_message_post(){
        $id=$this->input->post('id');
        if(empty($id)){
        $this->session->set_flashdata('error', trans('message_delete_error'));
        redirect($this->agent->referrer());
        }

        if($this->message_model->delete($id)){

        $this->session->set_flashdata('success', trans('message_deleted'));
        redirect($this->agent->referrer());

        }else{
        $this->session->set_flashdata('error', trans('message_delete_error'));
        redirect($this->agent->referrer());
        }
    }

}