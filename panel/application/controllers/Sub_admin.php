<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_admin extends MY_Controller{

   
    public function __construct(){
        parent::__construct();
        $this->load->library('bcrypt');
    }

 public function index(){
     
        $data['title'] = 'sub admin';
        $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'sub-admin']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/sub-admin/index', $data);
        $this->load->view('admin/includes/_footer');
}
    public function add(){

        $data['title'] = 'add sub admin';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/sub-admin/add', $data);
        $this->load->view('admin/includes/_footer');

    } 
    public function edit($id){

        $data['title'] = 'sub admin edit';
        $data['user'] = $this->auth_model->get_user($id);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/sub-admin/edit', $data);
        $this->load->view('admin/includes/_footer');
    }
   

 public function details($id){

    $data['title'] = 'sub admin';
    $data['user'] = $this->auth_model->get_user($id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/sub-admin/details', $data);
    $this->load->view('admin/includes/_footer');
    }



     /**
     * Change Password
     */
    public function change_password(){
       
        $data['title'] ='Change password';
        $data["user"] = user();

         $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/change_password');
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Change Password
     */
    public function user_change_password($id){
       
        $data['title'] ='Change password';
        $data['user'] = $this->auth_model->get_user($id);
         $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/user_change_password');
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Change Password Post
     */
    public function change_password_post(){
       
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');


        if($new_password != $confirm_password) {
            $this->session->set_flashdata('error','No Match password');
            redirect($this->agent->referrer());
        }else{

            if($this->auth_model->change_password($new_password)){

                $this->session->set_flashdata('success', html_escape(trans("message_change_password_success")));
                 redirect($this->agent->referrer());
            }else{
                  $this->session->set_flashdata('error','Password changed error.');
                redirect($this->agent->referrer());
            }
       
            
        }
    }

   
    public function add_user_post(){

    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $first_name =($this->input->post('first_name'))?$this->input->post('first_name'):"";
    $last_name =($this->input->post('last_name'))?$this->input->post('last_name'):"";
    $address = ($this->input->post('address'))?$this->input->post('address'):"";
    $phone = $this->input->post('phone');

    $password = $this->input->post('password');
    $confirm_password = $this->input->post('confirm_password');
    $role = $this->input->post('role');

        if(empty($role)){
        $this->session->set_flashdata('error','Please enter role.');
        redirect($this->agent->referrer());
        }

    if(empty($email)){
        $this->session->set_flashdata('error','Please enter email.');
        redirect($this->agent->referrer());
        }

         if(empty($password)){
        $this->session->set_flashdata('error','Please enter password.');
        redirect($this->agent->referrer());
        }

         if(empty($confirm_password)){
        $this->session->set_flashdata('error','Please enter confirm password.');
        redirect($this->agent->referrer());
        }

        if(empty($username)){
            $this->session->set_flashdata('error','Please usersname.');
            redirect($this->agent->referrer());
        }

        if(empty($phone)){
        $this->session->set_flashdata('error','Please enter phone number.');
        redirect($this->agent->referrer());
        }

       

         if(empty($confirm_password)){
        $this->session->set_flashdata('error','Please enter confirm password.');
        redirect($this->agent->referrer());
        }

        if(!empty($password) && !empty($confirm_password)){

        if($password != $confirm_password){
        $this->session->set_flashdata('error','No Match password');
        redirect($this->agent->referrer());
        }

        $set['password']=$this->bcrypt->hash_password($confirm_password);

        }
        
$username_check_db=$this->auth_model->get_data_table_by_where('users',['role'=>$role,'username',$username]);
  
    if(!empty($username_check_db)){
    $this->session->set_flashdata('error','sorry (username) is already exists, please enter different username.');
    redirect($this->agent->referrer());
    }

    $email_check_db=$this->auth_model->get_data_table_by_where('users',['role'=>$role,'email'=>$email]);
  
    if(!empty($email_check_db)){
    $this->session->set_flashdata('error','sorry (email) is already exists, please enter different email.');
    redirect($this->agent->referrer());
    }
    
        $set['email']=$email;
        $set['username']=$username;
        $set['first_name']=$first_name;
        $set['last_name']=$last_name;
        $set['phone']=$phone;
        $set['address']=$address;
        $set['role']=$role;


        if($this->auth_model->add_users_data($set)){

         $this->session->set_flashdata('success','add done.');
        redirect($this->agent->referrer());

       }else{
        $this->session->set_flashdata('error','add failed.');
        redirect($this->agent->referrer());
       }


    }

 
    public function user_edit_post(){

    $username = $this->input->post('username');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $phone = $this->input->post('phone');
    $address = $this->input->post('address');
    $id = $this->input->post('id');

    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');

        
    if(empty($username)){
    $this->session->set_flashdata('error','please enter username');
    redirect($this->agent->referrer());
    }

    if(empty($id)){
    redirect($this->agent->referrer());
    }


    if(isset($_POST['new_password'])){

        if(!empty($new_password) && !empty($confirm_password)){

        if($new_password != $confirm_password){
        $this->session->set_flashdata('error','No Match password');
        redirect($this->agent->referrer());
        }

         $set['password']=$this->bcrypt->hash_password($confirm_password);

        }
    }


    
        $set['username']=$username;
        $set['first_name']=$first_name;
        $set['last_name']=$last_name;
        $set['phone']=$phone;
        $set['address']=$address;
   

        if($this->auth_model->update_users_byid($id,$set)){
        $this->session->set_flashdata('success', 'update success');
        }else{
        $this->session->set_flashdata('error','add failed.');
       }

        redirect($this->agent->referrer());

    }


    /**
     * Update Profile Post
     */
    public function update_profile_post()
    {
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $email = $this->input->post('email', true);
            //is email unique
            if (!$this->auth_model->is_unique_email($email, user()->id)) {
                $this->session->set_flashdata('error', trans("message_email_unique_error"));
                redirect($this->agent->referrer());
            }
            if ($this->auth_model->update_user(user()->id)) {
                $this->session->set_flashdata('success', trans("message_profile_success"));
            }
            redirect($this->agent->referrer());
        }
    }


   


    /**
     * Reset Password
     */
    public function reset_password()
    {
        //check if logged in
        if (auth_check()) {
            redirect('login');
        }

        $page = $this->page_model->get_page("reset-password");
        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }
        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/reset_password');
        $this->load->view('partials/_footer');
    }


    /**
     * Reset Password Post
     */
    public function reset_password_post()
    {
        $this->reset_flash_data();

        $email = $this->input->post('email', true);

        //get user
        $user = $this->auth_model->get_user_by_email($email);


        //if user not exists
        if (empty($user)) {
            $this->session->set_flashdata('error', html_escape(trans("reset_password_error")));
            redirect($this->agent->referrer());
        } else {
            //generate new password
            $new_password = $this->auth_model->reset_password($email);

            $subject = "Password Reset";
            $message = trans("email_reset_password") . " <strong>" . $new_password . "</strong>";

            //send email
            if ($this->email_model->send_email($email, $subject, $message)) {
                $this->session->set_flashdata('success', html_escape(trans("reset_password_success")));
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Change User Role
     */
    public function change_user_role_post()
    {
        //check if admin
        if (is_admin() == false) {
            redirect('login');
        }

        $id = $this->input->post('user_id', true);
        $role = $this->input->post('role', true);

        $user = $this->auth_model->get_user($id);

        //check if exists
        if (empty($user)) {
            redirect($this->agent->referrer());
        }else{

            if ($this->auth_model->change_user_role($id, $role)) {
                $this->session->set_flashdata('success', "User role successfully changed!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem changing the user role!");
                redirect($this->agent->referrer());
            }
        }
    }
 public function delete(){
       
    $id =$this->input->post('id', true);
      
    if($this->auth_model->delete_user($id)) {
    $this->session->set_flashdata('success', "User successfully deleted!");

    }else{
    $this->session->set_flashdata('error', "There was a problem deleting the user!");
    redirect($this->agent->referrer());
    }
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
                $this->session->set_flashdata('success', "User successfully deleted!");

                if ($id == $logged_id) {
                    redirect("logout");
                } else {
                    redirect($this->agent->referrer());
                }

            } else {
                $this->session->set_flashdata('error', "There was a problem deleting the user!");
                redirect($this->agent->referrer());
            }
        }

        //if option ban
        if ($option == 'ban') {
            if ($this->auth_model->ban_user($id)) {
                $this->session->set_flashdata('success', "User successfully banned!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem banning the user!");
                redirect($this->agent->referrer());
            }
        }

        //if option remove ban
        if ($option == 'remove_ban') {
            if ($this->auth_model->remove_user_ban($id)) {
                $this->session->set_flashdata('success', "User ban successfully removed!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem removing user ban!");
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
    
     public function agreementSign($client, $agreement){
         $data['agreement'] = $this->db->get_where('customer_agreements', array('id' => $agreement))->row();
         $data['client'] = $this->db->get_where('customer_clients', array('id' => $client))->row();
          $query = $this->db->get_where('customer_signed_agreements', array(
            'agreement_id' => $agreement,
            'client_id'    => $client 
        ));
         if(empty($data['agreement']) || empty($data['client'])){
              redirect('not_found');
         }
        
         elseif($query->num_rows() > 0 ){
             $this->load->library('session');
             $this->session->set_userdata("alreadySubmit",'you already signed agreement');
             $this->session->set_userdata("clientID",$client);
             redirect('sign_success');
           }
         else{
             $data['user'] = $this->db->get_where('users', array('id' => $data['client']->user_id))->row();
             $data['asking_price'] = explode(",", $data['agreement']->asking_price);
             $data['requested_rent'] = explode(",", $data['agreement']->requested_rent);
             $property = explode(",", $data['agreement']->property_id);
             $i=0;
             foreach($property as $prop){
                 $data['propert'][] = $this->db->get_where('customer_property', array('id' => $prop))->result_array();
                $i++;
             }
             
            $agreements = $this->db->get('customer_agreements')->result_array();
            foreach($agreements as $agreement){
                $client_ids = explode(",", $agreement['client_id']);
                if(in_array($client,$client_ids)){
                    $signed = $this->db->get_where('customer_signed_agreements', array('agreement_id' => $agreement['id'], 'client_id' => $client))->row();
                    if(empty($signed)){
                        $unsign[] = $agreement; 
                    }
                }
            }
            $data['unsigned'] = count($unsign);
            $this->load->view('admin/customer/agreement', $data);
         }
         
    }
    
     public function unsignedAgreements($client){
        $agreements = $this->db->get('customer_agreements')->result_array();
        foreach($agreements as $agreement){
            $client_ids = explode(",", $agreement['client_id']);
            if(in_array($client,$client_ids)){
                $signed = $this->db->get_where('customer_signed_agreements', array('agreement_id' => $agreement['id'], 'client_id' => $client))->row();
                if(empty($signed)){
                    $unsign[] = $agreement; 
                }
            }
        }
        $data['unsigned'] = $unsign;
        $data['client']   = $client;
        $data['property'] = $this->db->get('customer_property')->result_array();
        $this->load->view('admin/customer/unsigned_agreements',$data);
    }
    
    public function agreementSign_post(){
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('alreadySubmit');
        $client_id=$this->input->post('client_id');
        $agreement_id=$this->input->post('agreement_id');
        $id_no=$this->input->post('id_no');
        $private_address=$this->input->post('private_address');
        $fname = $this->input->post('fname');
        
        if(empty($fname)){
        echo 'Name can not empty';
        exit;
        } 
        
        if(empty($id_no)){
        echo 'ID number can not empty';
        exit;
        }
      
        if(empty($private_address)){
        echo 'private address can not empty';
        exit;
        }
        
         $query = $this->db->get_where('customer_signed_agreements', array(
            'agreement_id' => $agreement_id,
            'client_id'    => $client_id 
        ));
        if($query->num_rows() > 0 ){
             $this->load->library('session');
             $this->session->set_userdata("alreadySubmit",'you already signed agreement');
             $this->session->set_userdata("clientID",$client_id);
            //  $msg = json_encode(['message' => 'you already submit agreement']);
            //  echo $msg;
           }
       else{
        $time = time();
        $upload_dir = './uploads/signature/'; 
        $img = $_POST['signature'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $image_name = $time."_"."image.png";
        $file = $upload_dir.$image_name;
        $success = file_put_contents($file, $data);

         $data = array(
        'signature'       => $image_name,
        'client_id'       => $client_id,
        'agreement_id'    => $agreement_id,
        'fname'           => $fname,
        'id_no'           => $id_no,
        'private_address' => $private_address,
        );
        $this->db->insert('customer_signed_agreements', $data);  
         $this->load->library('session');
         $this->session->set_userdata("clientID",$client_id);
         $this->session->set_userdata("success",'Agreement is signed successfully');
        $msg = json_encode(['success' => 'Agreement is submitted successfully']);
            echo $msg;
       }
        
    }
    
    public function signSuccess(){
        $data['alreadySubmit'] = $this->session->userdata("alreadySubmit");
        $data['success'] = $this->session->userdata("success");
        $client = $this->session->userdata("clientID");
         $agreements = $this->db->get('customer_agreements')->result_array();
         $unsign = array();
            foreach($agreements as $agreement){
                $client_ids = explode(",", $agreement['client_id']);
                if(in_array($client,$client_ids)){
                    $signed = $this->db->get_where('customer_signed_agreements', array('agreement_id' => $agreement['id'], 'client_id' => $client))->row();
                    if(empty($signed)){
                        $unsign[] = $agreement; 
                    }
                }
            }
        $data['client'] = $client;
        $data['unsigned'] = count($unsign);
        $this->load->view('admin/customer/sign_success', $data);
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
