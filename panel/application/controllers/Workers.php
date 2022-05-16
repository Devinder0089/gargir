<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workers extends MY_Controller{

   
    public function __construct(){
        parent::__construct();
        $this->load->library('bcrypt');
    }


    public function add(){

        $data['title'] = trans('add_worker');
        $data['contractor'] = $this->auth_model->get_data_table_by_where('users',['role'=>'contractor', 'status' => 1]);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/worker/add', $data);
        $this->load->view('admin/includes/_footer');

    } 
    public function index(){
     
        $data['title'] = trans('workers');
        if(is_admin()){
             $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'worker']);
        }else{
            $logged_user = $this->auth_model->get_logged_user(); 
            $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'worker', 'contractor_id' => $logged_user->id]);
        }
       
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/worker/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function edit($slug){
        $userdata=$this->auth_model->get_user_by_slug($slug);
        if(empty($userdata)){
            $this->session->set_flashdata('error','No found data.');
            redirect($this->agent->referrer());
        }

        $data['title'] = trans('edit_worker');
        $data['user'] = $userdata;
        $data['contractor'] = $this->auth_model->get_data_table_by_where('users',['role'=>'contractor', 'status' => 1]);  
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/worker/edit', $data);
        $this->load->view('admin/includes/_footer');
    }

 public function details($slug){

    $data['title'] = trans('workers');
    $data['user'] = $this->auth_model->get_user_by_slug($slug);
    $data['contractor'] = $this->auth_model->get_user($data['user']->contractor_id);
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/worker/details', $data);
    $this->load->view('admin/includes/_footer');
    }


    public function add_user_post(){

    $email = $this->input->post('email');
    $first_name =($this->input->post('first_name'))?$this->input->post('first_name'):"";
    $last_name =($this->input->post('last_name'))?$this->input->post('last_name'):"";
    $address = ($this->input->post('address'))?$this->input->post('address'):"";
    $phone = $this->input->post('phone');

    $password = $this->input->post('password');
    $confirm_password = $this->input->post('confirm_password');
    $role = $this->input->post('role');
         if(is_admin()){
            $contractor_id = $this->input->post('contractor_id');
        }else{
            $user=$this->auth_model->get_logged_user();
            $contractor_id = $user->id;
        }
        
       if(empty($contractor_id)){
        $this->session->set_flashdata('error',trans('please_select') .' '. trans('contractor'));
        redirect($this->agent->referrer());
        }
        
        if(empty($role)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('role'));
        redirect($this->agent->referrer());
        }

        if(empty($email)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('email'));
        redirect($this->agent->referrer());
        }
        if(empty($first_name)){
            $this->session->set_flashdata('error',trans('please_enter') .' '. trans('first_name'));
            redirect($this->agent->referrer());
        }
         if(empty($password)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('password'));
        redirect($this->agent->referrer());
        }

         if(empty($confirm_password)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('confirm_password'));
        redirect($this->agent->referrer());
        }

        if(empty($phone)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('phone_number'));
        redirect($this->agent->referrer());
        }

        if(!empty($password) && !empty($confirm_password)){

        if($password != $confirm_password){
        $this->session->set_flashdata('error',trans('password_not_match'));
        redirect($this->agent->referrer());
        }

        $set['password']=$this->bcrypt->hash_password($confirm_password);

        }
        
        $email_check_db=$this->auth_model->get_data_table_by_where('users',['email'=>$email]);
      
        if(!empty($email_check_db)){
        $this->session->set_flashdata('error',trans('message_email_unique_error'));
        redirect($this->agent->referrer());
        }
        
        $phone_check_db=$this->auth_model->get_data_table_by_where('users',['phone'=>$phone]);
      
        if(!empty($phone_check_db)){
        $this->session->set_flashdata('error',trans('message_phone_unique_error'));
        redirect($this->agent->referrer());
        }
    
        $set['email']=$email;
        $set['first_name']=$first_name;
        $set['last_name']=$last_name;
        $set['phone']=$phone;
        $set['address']=$address;
        $set['role']=$role;
        $set['contractor_id']=$contractor_id;

       if($this->auth_model->add_users_data($set)){
            $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = "Congratulations, your account is created";
            $to = $email;
            $datas = array(
             'name'=> $first_name,
             'status' => 'hello' .' ' .$first_name. ' ' . 'we have created your account with email'. ' ' . $email. ' ' . 'and password' . ' ' .$password,
                 );
            $message = $this->load->view('admin/email/status_change',$datas,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            $this->session->set_flashdata('success',trans('user_created'));
            redirect($this->agent->referrer());
    
           }else{
            $this->session->set_flashdata('error',trans('user_creat_error'));
            redirect($this->agent->referrer());
       }


    }

    /**
    * update_user_post
    */
    public function user_edit_post(){

    //check if logged in
    if (!auth_check()){
    redirect('login');
    }

    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $address = $this->input->post('address');
    $id = $this->input->post('id');

    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');
    if(is_admin()){
        $contractor_id = $this->input->post('contractor_id');
    }else{
        $user=$this->auth_model->get_logged_user();
        $contractor_id = $user->id;
    }
        if(empty($contractor_id)){
            $this->session->set_flashdata('error',trans('please_select') .' '. trans('contractor'));
        redirect($this->agent->referrer());
        }
        if(empty($first_name)){
                $this->session->set_flashdata('error',trans('please_enter') .' '. trans('first_name'));
                redirect($this->agent->referrer());
            }
        if(empty($id)){
        redirect($this->agent->referrer());
        }


    if(isset($_POST['new_password'])){

        if(!empty($new_password) && !empty($confirm_password)){

        if($new_password != $confirm_password){
        $this->session->set_flashdata('error',trans('password_not_match'));
        redirect($this->agent->referrer());
        }

         $set['password']=$this->bcrypt->hash_password($confirm_password);

        }
    }
    
        $set['first_name']=$first_name;
        $set['last_name']=$last_name;
        $set['address']=$address;
        $set['contractor_id']=$contractor_id;

        if($this->auth_model->update_users_byid($id,$set)){
        $this->session->set_flashdata('success', trans("message_profile_success"));
        }

        redirect($this->agent->referrer());

    }

   
    /**
     * User Options Post
     */
    public function user_options_post(){
      $option = $this->input->post('option', true);
        $id = $this->input->post('id', true);
        $logged_id = user()->id;

        //if option delete
        if ($option == 'delete') {
            if ($this->auth_model->delete_user($id)) {
                $this->session->set_flashdata('success', trans('user_delete'));

                if ($id == $logged_id) {
                    redirect("logout");
                } else {
                    redirect($this->agent->referrer());
                }

            } else {
                $this->session->set_flashdata('error', trans('user_delete_error'));
                redirect($this->agent->referrer());
            }
        }

        //if option ban
        if ($option == 'ban') {
            if ($this->auth_model->ban_user($id)) {
                $this->session->set_flashdata('success', trans('user_ban'));
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', trans('user_ban_error'));
                redirect($this->agent->referrer());
            }
        }

        //if option remove ban
        if ($option == 'remove_ban') {
            if ($this->auth_model->remove_user_ban($id)) {
                $this->session->set_flashdata('success', trans('user_unban'));
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', trans('user_unban_error'));
                redirect($this->agent->referrer());
            }
        }

    }

    public function reset_flash_data()
    {
        $this->session->set_flashdata('errors', "");
        $this->session->set_flashdata('error', "");
        $this->session->set_flashdata('success', "");
    }
    
    public function assignedProjects($slug){
        $worker=$this->auth_model->get_user_by_slug($slug);
        if(empty($worker)){
            $this->session->set_flashdata('error',trans('no_data_found'));
            redirect($this->agent->referrer());
        }
        $data['title'] = "Projects";
        $assigned = array();
        $projectss = $this->project_model->get_project_assign();
        
        foreach($projectss as $project){
            $workerid = explode(',',$project->assign);
            if(in_array($worker->id,$workerid)){
                $assigned[] = $project;                 
            }
        }
        $data['projects'] = $assigned;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/projects/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function notFound(){
        $data['title'] = "Error 404";
        $data['description'] = "Error 404";
        $data['keywords'] = "error,404";

        $this->load->view('partials/_header', $data);
        $this->load->view('errors/not_found');
        $this->load->view('partials/_footer');
    }

}
