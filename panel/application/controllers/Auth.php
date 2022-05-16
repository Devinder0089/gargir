<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{

   
    public function __construct(){
        parent::__construct();
         $this->dir_path=dirname(dirname(__dir__));
    }

    public function login(){


        // //check if logged in
        if(auth_check()){

           // $this->auth_model->logout();
           
            redirect(base_url().'Dashboard');
        }

        $this->load->view('login');
    
    }


    /**
     * Login Post
     */
    public function login_post(){
        //check if logged in
        if(auth_check()){
            redirect(base_url());
        }

        //validate inputs
        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[100]');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            redirect($this->agent->referrer());
        }else{

            $result = $this->auth_model->login();
            if($result == "banned"){
                //user banned
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', trans("message_ban_error"));
                redirect($this->agent->referrer());
            }elseif($result == "success"){
                //logged in
                redirect(base_url());

            }else{
                //error
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', trans("login_error"));
                redirect($this->agent->referrer());
            }

        }
    }


    /**
     * Login Ajax Post
     */
    public function login_ajax_post()
    {
        $this->reset_flash_data();

        //validate inputs
        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[100]');
        $this->form_validation->set_rules('password', trans("form_password"), 'required|xss_clean|max_length[30]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            $this->load->view('partials/_messages');
        } else {

            $result = $this->auth_model->login();

            if ($result == "banned") {
                //user banned
                $this->session->set_flashdata('error', trans("message_ban_error"));
                $this->load->view('partials/_messages');
                $this->reset_flash_data();
            } elseif ($result == "success") {
                //logged in
                echo $result;
                $this->reset_flash_data();
            } else {
                //error
                $this->session->set_flashdata('error', trans("login_error"));
                $this->load->view('partials/_messages');
                $this->reset_flash_data();
            }
        }
    }


    /**
     * Login with Facebook
     */
    public function login_with_facebook()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        // Check if user is logged in
        if ($this->facebook->is_authenticated()) {
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture');

            $this->auth_model->login_with_facebook($userProfile);
        }


        redirect($this->agent->referrer());
    }


    /**
     * Login with Google
     */
    public function login_with_google()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        $code = $this->input->get('code');

        if (!empty($code)) {
            $this->googleplus->getAuthenticate();
            $this->auth_model->login_with_google($this->googleplus->getUserInfo());
        }

        redirect($this->agent->referrer());
    }


    /**
     * Register
     */
    public function register()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        $page = $this->page_model->get_page("register");

        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/register');
        $this->load->view('partials/_footer');
    }


    /**
     * Register Post
     */
    public function register_post(){
        $this->reset_flash_data();

        //validate inputs
        $this->form_validation->set_rules('username', trans("form_username"), 'required|xss_clean|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[200]|is_unique[users.email]');
        $this->form_validation->set_rules('password', trans("form_password"), 'required|xss_clean|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('confirm_password', trans("form_confirm_password"), 'required|xss_clean|matches[password]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //register
            $user = $this->auth_model->register();
            if ($user) {
                $this->auth_model->login_direct($user);
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', trans("message_register_error"));
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * get_contractor
     */
    public function user_add(){


        //check if admin
        if(is_admin() == false){
            redirect('login');
        }

        $data['title'] = 'add User';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/user_add', $data);
        $this->load->view('admin/includes/_footer');
    } 

    

     /**
     * Change Password
     */
    public function change_password(){
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

       
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
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

       
        $data['title'] ='Change password';
        $data['user'] = $this->auth_model->get_user($id);
         $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/user_change_password');
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Change Password Post
     */
    public function change_password_post()
    {
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

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


    /* get_contractor
     */
    public function get_contractor(){
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $data['title'] = 'Contractor';
        $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'contractor']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/users', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    
     /* get_client
     */
    public function get_client(){
         //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $data['title'] = 'Client';
        $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'client']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/users', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    /* get_worker
     */
    public function get_worker(){
         //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $data['title'] = 'Worker';
        $data['users'] = $this->auth_model->get_data_table_by_where('users',['role'=>'worker']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/users', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    /* get_customer
     */
  
    /**
    * Users
    */
    public function users(){


    //check if admin
    if (is_admin() == false) {
    redirect('login');
    }

    $data['title'] = 'Users';
    $data['users'] = $this->auth_model->get_users();

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/users/users', $data);
    $this->load->view('admin/includes/_footer');
    }

    /**
    * Users
    */
    public function details($id){


   if(!auth_check()){
        redirect('login');
    }


    $data['title'] = 'Users';
    $data['user'] = $this->auth_model->get_user($id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/users/details', $data);
    $this->load->view('admin/includes/_footer');
    }


    /**
    * Users
    */
    public function users_edit($id){


        //check if admin
        if(is_admin() == false) {
            redirect('login');
        }

        $data['title'] = 'Users-edit';
        $data['user'] = $this->auth_model->get_user($id);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/user_edit', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Logout
     */
    public function logout()
    {
        $this->auth_model->logout();
        redirect($this->agent->referrer());

    }

    public function profile(){

        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

   
        $data['title'] ='Profile';
        $data['description'] ='Profile';
        $data['keywords'] ='Profile';
        $data["user"] = user();

         $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/users/profile', $data);
        $this->load->view('admin/includes/_footer');

        
    } 

      /**
     * Update Profile
     */
    public function update_profile(){

        //check if logged in
        if(!auth_check()) {
            redirect('login');
        }

        $page = $this->page_model->get_page("update-profile");
        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }
        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $data["user"] = user();

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/update_profile');
        $this->load->view('partials/_footer');
    }

      /**
     * add_user_post
     */
    public function add_user_post(){

         //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

    var_dump('gshdhjs'); die;
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $first_name =($this->input->post('first_name'))?$this->input->post('first_name'):"";
    $last_name =($this->input->post('last_name'))?$this->input->post('last_name'):"";
    $address = ($this->input->post('address'))?$this->input->post('address'):"";
    $phone = $this->input->post('phone');
    $project_allowed = $this->input->post('projects_allowed');
    $monthly_price = $this->input->post('monthly_price');
    $payment_method = $this->input->post('payment_method');
    $payment_currency = $this->input->post('payment_currency');
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
        $set['projects_allowed']=$projects_allowed;
        $set['monthly_price']=$monthly_price;
        $set['payment_method']=$payment_method;
        $set['payment_currency']=$payment_currency;
        $set['role']=$role;


        if($this->auth_model->add_users_data($set)){

         $this->session->set_flashdata('success','User is add done.');
        redirect($this->agent->referrer());

       }else{
        $this->session->set_flashdata('error','User is add failed.');
        redirect($this->agent->referrer());
       }


    }

    /**
    * update_user_post
    */
    public function update_user_post(){

    //check if logged in
    if (!auth_check()){
    redirect('login');
    }

    // $username = $this->input->post('username');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    // $phone = $this->input->post('phone');
    $address = $this->input->post('address');
    $id = $this->input->post('id');

    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');

        
    // if(empty($username)){
    // redirect($this->agent->referrer());
    // }

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


    
        // $set['username']=$username;
        $set['first_name']=$first_name;
        $set['last_name']=$last_name;
        // $set['phone']=$phone;
        $set['address']=$address;
   

        if($this->auth_model->update_users_byid($id,$set)){
        $this->session->set_flashdata('success', trans("message_profile_success"));
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


    /**
     * User Options Post
     */
    public function user_options_post()
    {
        //check if admin
        if (is_admin() == false) {
            redirect('login');
        }

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
    
}
