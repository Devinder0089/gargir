<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

     var $dir_path="";

    public function __construct(){
        parent::__construct();

    $this->dir_path=dirname(dirname(__dir__));

    }

    //input values
    public function input_values(){

        $data = array(
            'username' => $this->input->post('username', true),
            'email' => $this->input->post('email', true),
            'password' => $this->input->post('password', true)
        );

        return $data;
    }

    //add_users_data
    public function add_users_data($data){
         $time = time();
          if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
            $image_url = $_FILES['file']['tmp_name'];
            $image_explode =explode(".",$_FILES['file']['name']);
            $image_type= end($image_explode);
            $image_name=$time.".".$image_type;
            $img_upload =$this->dir_path.'/uploads/profile/'.$image_name;
            $img_upload_update ='uploads/profile/'.$image_name;
             $check=move_uploaded_file($image_url, $img_upload);
            $data['avatar']=$img_upload_update;

        }

    $data['slug']=str_slug($data['username']."-".uniqid());
    $data['time_temp']= $time;
    $data['time_tempdura']= $time;

    return $this->db->insert('users', $data);

    }

    //change password input values
    public function change_password_input_values()
    {
        $data = array(
            'old_password' => $this->input->post('old_password', true),
            'password' => $this->input->post('password', true),
            'password_confirmation' => $this->input->post('password_confirmation', true)
        );
        return $data;
    }

    //login
    public function login(){

        $time_temp =time();
        $data = $this->input_values();
        $user = $this->get_user_by_email($data['email']);
              if(!empty($user)){

            //password does not match stored password.
            if(!$this->bcrypt->check_password($data['password'], $user->password)) {
                return false;
            }

            if ($user->status == 0){
                return "banned";
            }

      
            //set user data
            $user_data = array(
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $user->role,
                'logged_in' => true,
                'app_key' => $this->config->item('app_key'),
            );

                $this->session->set_userdata($user_data);

                $update_data = array(
                'login_is' =>'1',
                'time_temp' => $time_temp,
                'time_tempdura' => $time_temp);

            $this->update_user_data_by_uid($user->id,$update_data);

            return "success";

        }else{
            return false;
        }

    }

    public function update_user_data_by_uid($id,$data){

    $this->db->where('id', $id);
    return $this->db->update('users', $data);
    }

    //login direct
    public function login_direct($user)
    {
        //set user data
        $user_data = array(
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
            'logged_in' => true,
            'app_key' => $this->config->item('app_key'),
        );

        $this->session->set_userdata($user_data);
    }

    //login with facebook
    public function login_with_facebook($user_info)
    {

        $user = $this->get_user_by_email($user_info['email']);

        //check if user registered
        if (empty($user)) {

            //add user to database
            $data = array(
                'facebook_id' => $user_info['id'],
                'email' => $user_info['email'],
                'username' => $user_info['first_name'] . " " . $user_info['last_name'],
                'slug' => str_slug($user_info['first_name'] . " " . $user_info['last_name'] . "-" . uniqid()),
                'avatar' => $user_info['picture']['data']['url'],
                'user_type' => "facebook",
            );

            $this->db->insert('users', $data);

            $user = $this->get_user_by_email($user_info['email']);

            //login
            $this->login_direct($user);

        } else {

            //login
            $this->login_direct($user);
        }
    }


    //login with google
    public function login_with_google($user_info)
    {
        $user = $this->get_user_by_email($user_info['email']);

        //check if user registered
        if (empty($user)) {

            //add user to database
            $data = array(
                'google_id' => $user_info['id'],
                'email' => $user_info['email'],
                'username' => $user_info['name'],
                'slug' => str_slug($user_info['name'] . "-" . uniqid()),
                'avatar' => $user_info['picture'],
                'user_type' => "google",
            );

            $this->db->insert('users', $data);

            $user = $this->get_user_by_email($user_info['email']);

            //login
            $this->login_direct($user);

        } else {

            //login
            $this->login_direct($user);
        }
    }

    //register
    public function register()
    {
        $data = $this->auth_model->input_values();
        //secure password
        $data['password'] = $this->bcrypt->hash_password($data['password']);
        $data['user_type'] = "registered";
        $data["slug"] = str_slug($data["username"] . "-" . uniqid());

        if ($this->db->insert('users', $data)) {
            $last_id = $this->db->insert_id();
            return $this->get_user($last_id);
        } else {
            return false;
        }
    }

    //logout
    public function logout(){
        $time_temp=time();

            $update_data = array(
            'login_is' =>'0',
            'time_tempdura' => $time_temp,
            );

        if(!empty($_SESSION['id'])){
        $this->update_user_data_by_uid($_SESSION['id'],$update_data);
        }
              
        /* $this->session->unset_userdata('id');
        // $this->session->unset_userdata('email');
        // $this->session->unset_userdata('role');
        // $this->session->unset_userdata('logged_in');
        // $this->session->unset_userdata('app_key');

        // $this->googleplus->revokeToken();
        // $this->facebook->destroy_session();*/

        /* destroy the session*/

        session_destroy();

        
        redirect('login');
       
    }

    //update user
    public function update_user($id)
    {
        $user = $this->get_user($id);

        $data = array(
            'username' => $this->input->post('username', true),
        );

        //get file
        $file = $_FILES['file'];
        if (!empty($file['name'])) {

            //delete old
            delete_image_from_server($user->avatar);

         
            //upload new
            $data["avatar"] = $this->upload_model->avatar_upload($id, $file);
        }

        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }


  //update user
    public function update_users_byid($id,$data){

        $user = $this->get_user($id);


        if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){

           delete_image_from_server($user->avatar);

            $time = time();
            $image_url = $_FILES['file']['tmp_name'];
            $image_explode =explode(".",$_FILES['file']['name']);
            $image_type= end($image_explode);
            $image_name=$time.".".$image_type;
            $img_upload =$this->dir_path.'/uploads/profile/'.$image_name;
            $img_upload_update ='uploads/profile/'.$image_name;
             $check=move_uploaded_file($image_url, $img_upload);
            $data['avatar']=$img_upload_update;

        }

        
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }


    //update author
    public function update_author($id)
    {
        $user = $this->get_user($id);

        $data = array(
            'username' => $this->input->post('username', true),
            'slug' => $this->input->post('slug', true),
            'about_me' => $this->input->post('about_me', true),
            'facebook_url' => $this->input->post('facebook_url', true),
            'twitter_url' => $this->input->post('twitter_url', true),
            'google_url' => $this->input->post('google_url', true),
            'instagram_url' => $this->input->post('instagram_url', true),
            'pinterest_url' => $this->input->post('pinterest_url', true),
            'linkedin_url' => $this->input->post('linkedin_url', true),
            'vk_url' => $this->input->post('vk_url', true),
            'youtube_url' => $this->input->post('youtube_url', true),
        );

        //get file
        $file = $_FILES['file'];
        if (!empty($file['name'])) {

            //delete old
            delete_image_from_server($user->avatar);

            //upload new
            $data["avatar"] = $this->upload_model->avatar_upload($id, $file);
        }

        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    //change password
    public function change_password($password){
        $user = user();

        if(!empty($user)){


            $data = array(
                'password' => $this->bcrypt->hash_password($password)
            );

            $this->db->where('id', $user->id);
            return $this->db->update('users', $data);

        }else{
            return false;
        }
    }

    //reset password
    public function reset_password($email)
    {
        //generate new password
        $new_password = bin2hex(openssl_random_pseudo_bytes(3));

        $data = array(
            'password' => $this->bcrypt->hash_password($new_password)
        );

        //change password
        $this->db->where('email', $email);
        $this->db->update('users', $data);
        return $new_password;
    }

    //change user role
    public function change_user_role($id, $role)
    {
        $data = array(
            'role' => $role
        );

        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    //delete user
    public function delete_user($id)
    {
        $user = $this->get_user($id);

        if (!empty($user)) {
            $this->db->where('id', $id);
            return $this->db->delete('users');
        } else {
            return false;
        }
    }

    //ban user
    public function ban_user($id)
    {
        $user = $this->get_user($id);

        if (!empty($user)) {

            $data = array(
                'status' => 0
            );

            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        } else {
            return false;
        }
    }

    //remove user ban
    public function remove_user_ban($id)
    {
        $user = $this->get_user($id);

        if (!empty($user)) {

            $data = array(
                'status' => 1
            );

            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        } else {
            return false;
        }
    }

    //is logged in
    public function is_logged_in(){

        //check if user logged in
        if($this->session->userdata('logged_in') == true && $this->session->userdata('app_key') == $this->config->item('app_key')) {
            return true;
        }else{
            return false;
        }
    }

    //is admin
    public function is_admin(){

        //check role
        if($this->get_logged_user() && $this->get_logged_user()->role == 'admin'){
            return true;
        }else{
            return false;
        }

    }

    //is author
    public function is_author(){
      
        if($this->get_logged_user() && $this->get_logged_user()->role == 'author'){
            return true;
        }else{
            return false;
        }
    }

    //is_customer
    public function is_customer(){
      
        if($this->get_logged_user() && $this->get_logged_user()->role == 'customer'){
            return true;
        }else{
            return false;
        }
    }

    //is_contractor
    public function is_contractor(){
      
        if($this->get_logged_user() && $this->get_logged_user()->role == 'contractor'){
            return true;
        }else{
            return false;
        }
    }

    //is_client
    public function is_client(){
      
        if($this->get_logged_user() && $this->get_logged_user()->role == 'client'){
            return true;
        }else{
            return false;
        }
    }

  

    //is_user
    public function is_worker(){
      
        if($this->get_logged_user() && $this->get_logged_user()->role == 'worker'){
            return true;
        }else{
            return false;
        }
        
    }


    //is_user
    public function is_user(){
      
        if($this->get_logged_user() && $this->get_logged_user()->role == 'user'){
            return true;
        }else{
            return false;
        }
        
    }

    //function get user
    public function get_logged_user(){


        if ($this->session->userdata('logged_in') == true) {
            $query = $this->db->get_where('users', array('id' => $this->get_user_id()));
            return $query->row();
        }
    }

	
    //get user by id
    public function get_user($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    //get user by email
    public function get_user_by_email($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }

    //get user by slug
    public function get_user_by_slug($slug)
    {
        $query = $this->db->get_where('users', array('slug' => $slug));
        return $query->row();
    }

    //get users
    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

 //get users
    public function get_data_table_by_where($table,$where=false)
    {

        if($where){
           $this->db->where($where);
        }
        
        $query = $this->db->get($table);
        return $query->result();
    }

    //get last users
    public function get_last_users()
    {
        $this->db->limit(7);
        $this->db->order_by('users.id', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    //get logged user id
    public function get_user_id()
    {
        if ($this->session->userdata('logged_in') == true) {
            return $this->session->userdata('id');
        }
    }

    //get logged username
    public function get_username()
    {
        if ($this->session->userdata('logged_in') == true) {
            return $this->session->userdata('username');
        }
    }

    //user count
    public function get_user_count()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }


    //check if email is unique
    public function is_unique_email($email, $user_id = 0)
    {
        $user = $this->auth_model->get_user_by_email($email);

        //if id doesnt exists
        if ($user_id == 0) {
            if (empty($user)) {
                return true;
            } else {
                return false;
            }
        }

        if ($user_id != 0) {
            if (!empty($user) && $user->id != $user_id) {
                //email taken
                return false;
            } else {
                return true;
            }
        }
    }


}