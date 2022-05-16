<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractor extends MY_Controller {

    public function __construct(){
        parent::__construct();
       
        if(!auth_check()){
            redirect('login');
        }

        $this->system_dir =dirname(dirname(__dir__)).'/';
    }

     public function index(){
        $data['title'] = trans('contractor');
        $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'contractor']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/contractor/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    
     public function add(){
        $data['title'] = trans('add_contractor');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/contractor/add', $data);
        $this->load->view('admin/includes/_footer');
    } 

    public function details($slug){

    $data['title'] = trans('contractor');
    $data['user'] = $this->auth_model->get_user_by_slug($slug);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/contractor/show', $data);
    $this->load->view('admin/includes/_footer');
    }

    public function edit($slug){

        //check if admin
        if(is_admin() == false) {
            redirect('login');
        }

        $data['title'] = trans('edit_contractor');
        $data['user'] = $this->auth_model->get_user_by_slug($slug);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/contractor/edit', $data);
        $this->load->view('admin/includes/_footer');
    }

   
    public function add_user_post(){
        $email = $this->input->post('email');
        // $username = $this->input->post('username');
        $first_name =($this->input->post('first_name'))?$this->input->post('first_name'):"";
        $last_name =($this->input->post('last_name'))?$this->input->post('last_name'):"";
        $address = ($this->input->post('address'))?$this->input->post('address'):"";
        $phone = $this->input->post('phone');
        $monthly_price = $this->input->post('monthly_price');
        $payment_method = $this->input->post('payment_method');
        $projects_allowed = $this->input->post('projects_allowed');
        $payment_currency = $this->input->post('payment_currency');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        $role = 'contractor';
            
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
        
        if(empty($projects_allowed)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('project_allowed'));
        redirect($this->agent->referrer());
        }
        
        if(empty($monthly_price)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('monthly_price'));
        redirect($this->agent->referrer());
        }
        
        if(empty($payment_currency)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('payment_currency'));
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
        
        // $username_check_db=$this->auth_model->get_data_table_by_where('users',['role'=>$role,'username',$username]);
      
        // if(!empty($username_check_db)){
        // $this->session->set_flashdata('error','sorry (username) is already exists, please enter different username.');
        // redirect($this->agent->referrer());
        // }
    
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
        // $set['username']=$username;
        $set['first_name']=$first_name;
        $set['last_name']=$last_name;
        $set['phone']=$phone;
        $set['address']=$address;
        $set['monthly_price']=$monthly_price;
        $set['payment_method']=$payment_method;
        $set['projects_allowed']=$projects_allowed;
        $set['payment_currency']=$payment_currency;
        $set['role']=$role;


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


    public function edit_post(){

    // $username = $this->input->post('username');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $address = $this->input->post('address');
    $id = $this->input->post('id');
    $monthly_price = $this->input->post('monthly_price');
    $payment_method = $this->input->post('payment_method');
    $projects_allowed = $this->input->post('projects_allowed');
    $payment_currency = $this->input->post('payment_currency');
    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');
        if(empty($first_name)){
            $this->session->set_flashdata('error',trans('please_enter') .' '. trans('first_name'));
            redirect($this->agent->referrer());
        }
        if(empty($confirm_password)){
            $this->session->set_flashdata('error',trans('please_enter') .' '. trans('confirm_password'));
            redirect($this->agent->referrer());
        }
        
        if(empty($projects_allowed)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('project_allowed'));
        redirect($this->agent->referrer());
        }
        
        if(empty($monthly_price)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('monthly_price'));
        redirect($this->agent->referrer());
        }
        
        if(empty($payment_currency)){
        $this->session->set_flashdata('error',trans('please_enter') .' '. trans('payment_currency'));
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
        $set['monthly_price'] = $monthly_price;
        $set['payment_method'] = $payment_method;
        $set['projects_allowed']=$projects_allowed;
        $set['payment_currency']=$payment_currency;
        if($this->auth_model->update_users_byid($id,$set)){
        $this->session->set_flashdata('success', trans("message_profile_success"));
        }else{
            $this->session->set_flashdata('error',trans("message_profile_error"));
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
    
    public function allClients($slug){
        $data['title'] = 'Clients';
        $con = $this->auth_model->get_user_by_slug($slug);
        $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'client', 'contractor_id' => $con->id]);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/client/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function allWorkers($slug){
        $data['title'] = 'Workers';
        $con = $this->auth_model->get_user_by_slug($slug);
        $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'worker','contractor_id' => $con->id]);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/worker/index', $data);
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
    
    public function emailPhoneCheck(){
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        if($email){
            $email_check_db=$this->auth_model->get_data_table_by_where('users',['email'=>$email]);
            if(!empty($email_check_db)){
                echo json_encode(['email' => trans('message_email_unique_error')]);
            }else{
                echo json_encode(['success' => 'success']);
            }
            
        }
        if($phone){
            $phone_check_db=$this->auth_model->get_data_table_by_where('users',['phone'=>$phone]);
            if(!empty($phone_check_db)){
                echo json_encode(['phone' => trans('message_phone_unique_error')]);
            }else{
                echo json_encode(['success' => 'success']);
            }
        }
            
    }

}
