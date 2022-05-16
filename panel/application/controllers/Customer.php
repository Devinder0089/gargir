<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller{

    public function __construct(){
        parent::__construct();
        if(!auth_check()){
            redirect('login');
        } 
    }

    public function index(){
    if(is_admin() || is_permission_user('customer_show')){

    	$data['title'] = "Customer";
        $data['customer'] =$this->customer_model->index();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/index', $data);
        $this->load->view('admin/includes/_footer');

        }else{

            $this->session->set_flashdata('error','No allowed permission.');
            redirect($this->agent->referrer());
        }
    }  

    public function details($id){
         
        $customer=$this->customer_model->get_data_by_id($id);
        if(empty($customer)){
        redirect($this->agent->referrer());
        }

    if(is_admin() || is_permission_user('customer_view')){
    
        $data['title'] = "Customer";
        $data['customer'] =$customer;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/details', $data);
        $this->load->view('admin/includes/_footer');

        }else{

            $this->session->set_flashdata('error','No allowed permission.');
            redirect($this->agent->referrer());
        }
    } 

     public function pending_customer(){

        if(is_admin() || is_permission_user('customer_pending')){

         $data['title'] = "Pending Customer";
         $data['pending_customer'] =$this->customer_model->get_pending_customer();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/pending-customer', $data);
        $this->load->view('admin/includes/_footer');
        }else{

            $this->session->set_flashdata('error','No allowed permission.');
            redirect($this->agent->referrer());
        }
    } 

     public function add(){

        if(is_admin() || is_permission_user('customer_edit')){

             $data['title'] = "Add Customer";
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/customer/add', $data);
            $this->load->view('admin/includes/_footer');
        }else{

            $this->session->set_flashdata('error','No allowed permission.');
            redirect($this->agent->referrer());
        }
    } 

    public function active_customer(){

        if(is_admin() || is_permission_user('customer_active')){

         $data['title'] = "Active Customer";
        $data['customer'] =$this->customer_model->get_active_customer();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/active-customer', $data);
        $this->load->view('admin/includes/_footer');
        }else{

            $this->session->set_flashdata('error','No allowed permission.');
            redirect($this->agent->referrer());
        }
    }

public function add_user_post(){

    //check if logged in
    if(!auth_check()) {
    redirect('login');
    }


$email = $this->input->post('email');
$username = $this->input->post('username');
$first_name =($this->input->post('first_name'))?$this->input->post('first_name'):"";
$last_name =($this->input->post('last_name'))?$this->input->post('last_name'):"";
$address = ($this->input->post('address'))?$this->input->post('address'):"";
$phone = $this->input->post('phone');
$password = $this->input->post('password');
$confirm_password = $this->input->post('confirm_password');


      
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

      

        if(!empty($password) && !empty($confirm_password)){

        if($password != $confirm_password){
        $this->session->set_flashdata('error','No Match password');
        redirect($this->agent->referrer());
        }

        $set['password']=$this->bcrypt->hash_password($confirm_password);

        }


    $username_check_db=$this->auth_model->get_data_table_by_where('users',['role'=>'customer','username',$username]);
  
    if(!empty($username_check_db)){
    $this->session->set_flashdata('error','sorry (username) is already exists, please enter different username.');
    redirect($this->agent->referrer());
    }

    $email_check_db=$this->auth_model->get_data_table_by_where('users',['role'=>'customer','email'=>$email]);
  
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
    $set['role']='customer';


    if($this->auth_model->add_users_data($set)){

  
        // $datas = array(
        // 'email'=> $email,
        // 'username'=>$username,
        // 'first_name' =>$first_name,
        // 'last_name' =>$last_name,
        // );

        // $subject='Nadlanpro';
        // $message=$this->load->view('admin/customer/email_template',$datas,true);

        // //sent mail
        // $this->email_model->send_email($email,$subject,$message);
   

         $this->session->set_flashdata('success','customer is add done.');
       redirect(base_url().'admin/customer');

       }else{
        $this->session->set_flashdata('error','customer is add failed.');
        redirect($this->agent->referrer());
       }

    }

  public function delete_post(){
    
     if(is_admin() || is_permission_user('customer_delete')){

        $id=$this->input->post('id');

        if($this->customer_model->delete($id)){

            $this->session->set_flashdata('success', "customer successfully deleted!");
            redirect($this->agent->referrer());

        }else{
            $this->session->set_flashdata('error', "There was a problem deleting the customer!");
            redirect($this->agent->referrer());
        }

        }else{
        $this->session->set_flashdata('error','No allowed permission.');
        redirect($this->agent->referrer());
       }

    }

  

    public function stampInForm(){

        $data['title']  = "stamping is interested";
        $data['clients'] = $this->clients_model->index();
        $data['property'] = $this->clients_model->property();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/stamp_in_form', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function stampOwnerForm(){

       

    	$data['title'] = "stamping property owner";
        $data['clients'] = $this->clients_model->index();
        $data['property'] = $this->clients_model->property();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/stamp_owner', $data);
        $this->load->view('admin/includes/_footer');
    }
    
     public function coForm(){

    	$data['title'] = "Collaborators";
        $data['clients'] = $this->clients_model->index();
        $data['property'] = $this->clients_model->property();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/collaborators', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function clients(){
       

    	$data['title'] = "Clients";
        $data['clients'] =$this->clients_model->index();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/clients', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function addClient(){
       
    	$data['title'] = "Add Customer";

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/add_clients', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function addClient_post(){
       
     
       if($this->input->is_ajax_request()) {
            $data = $this->clients_model->add_client();
            echo json_encode($data);
        }else{
             //validate inputs
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|max_length[200]|is_unique[customer_clients.email]');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|min_length[08]|max_length[20]');
            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('errors', validation_errors());
                redirect($this->agent->referrer());
            } else {
               $data = $this->clients_model->add_client();
               redirect(base_url('admin/customer/clients'));
            }
        }
      
    }
    
    public function editClient($id){
      
        $data['client'] = $this->db->get_where('customer_clients', array('id' => $id))->row();
    	$data['title'] = "Edit Customer";

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/edit_client', $data);
        $this->load->view('admin/includes/_footer');
    }
    
     public function editClient_post(){
        
         $this->form_validation->set_rules('name', 'name', 'required|xss_clean|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|min_length[08]|max_length[20]');
            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('errors', validation_errors());
                redirect($this->agent->referrer());
            } else {
               $data = $this->clients_model->edit_client();
               redirect(base_url('admin/customer/clients'));
            }
      
    }
    
    public function deleteClient(){
        $client = $this->input->post('clientID');
          $data = array(
            'status'  => 0
        );
        foreach($client as $cli){
        $this->db->where('id', $cli);
        $this->db->update('customer_clients', $data);
        }
        echo 'deleted successfully';
    }
    
     public function property(){
       if(is_admin() || is_permission_user('property_show')){

    	$data['title'] = "Property";
        $data['property'] =$this->clients_model->property();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/property', $data);
        $this->load->view('admin/includes/_footer');
         }else{

            $this->session->set_flashdata('errors','No Allowed Permission.');
            redirect($this->agent->referrer());
        }

    }

    public function addProperty(){
        if(is_admin() || is_permission_user('property_show') && is_permission_user('property_create')){

        	$data['title'] = "Add Property";

            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/customer/add_property', $data);
            $this->load->view('admin/includes/_footer');
        }else{

            $this->session->set_flashdata('errors','No Allowed Permission.');
            redirect($this->agent->referrer());
        }

    }
    
    public function addProperty_post(){
      
       if($this->input->is_ajax_request()) {
           $data = $this->clients_model->add_property();
            echo json_encode($data);
        }else{
            $this->form_validation->set_rules('street', 'street', 'required|xss_clean|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('buil_number', 'building number', 'required|xss_clean|max_length[30]');
            $this->form_validation->set_rules('city', 'city', 'required|xss_clean|min_length[03]|max_length[20]');
            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('errors', validation_errors());
                redirect($this->agent->referrer());
            } else {
               $data = $this->clients_model->add_property();
              redirect(base_url('admin/customer/property'));
            }
             
        }
    }
    
    public function editProperty($id){
        if(is_admin() || is_permission_user('property_show') && is_permission_user('property_edit')){


        $data['title'] = "Edit Property";
        $data['property'] = $this->db->get_where('customer_property', array('id' => $id))->row();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/edit_property', $data);
        $this->load->view('admin/includes/_footer');
        }else{

        $this->session->set_flashdata('errors','No Allowed Permission.');
        redirect($this->agent->referrer());
        }
    }
    
    public function editProperty_post(){
      
        $this->form_validation->set_rules('street', 'street', 'required|xss_clean|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('buil_number', 'building number', 'required|xss_clean|max_length[30]');
        $this->form_validation->set_rules('city', 'city', 'required|xss_clean|min_length[03]|max_length[20]');
        if($this->form_validation->run() === false){
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        }else{
           $data = $this->clients_model->edit_property();
           redirect(base_url('admin/customer/property'));
        }
       
    }
    
    public function deleteProperty(){
        if(is_admin() || is_permission_user('property_show') && is_permission_user('property_delete')){

            $property = $this->input->post('propertyID');
              $data = array(
                'status'  => 0
            );
            foreach($property as $pro){
            $this->db->where('id', $pro);
            $this->db->update('customer_property', $data);
            }
            echo 'deleted successfully';

        }else{

            echo 'deleted no allowed permission.';
        
        }

        
    }
    
    public function getProperty(){
        $data = $this->clients_model->getProperty();
        echo json_encode($data);
    }
    
     public function getClients(){
       
       $data = $this->clients_model->getClients();
        echo json_encode($data);
    }

    public function agreement(){
       
        $this->session->unset_userdata('ageementID');
        $data = $this->clients_model->clientAgreement();
        if($this->input->post('agree_pro')== 1){
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $subject = "this is testing email";
        $clients = $this->input->post('client_id');
        $num=0;
        foreach($clients as $client)
        {
            $query[] = $this->db->get_where('customer_clients', array('id' => $client))->result_array();
            $to = $query[$num][0]['email'];
            $datas = array(
             'name'=> $query[$num][0]['name'],
             'clientID'=> $query[$num][0]['id'],
             'agreementID' => $data[0]['id'],
                 );
            $message = $this->load->view('admin/customer/agreement_email',$datas,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();

            $num++;
        };
        echo 'Your Email has successfully been sent.';
            
        }else{
            $this->load->library('session');
            $this->session->set_userdata("ageementID",$data[0]['id']);
            echo 'Agreement Produced';
        }
        
        
    }
    
    public function success(){
        $agreement_id = $this->session->userdata("ageementID");
        $exclusiveAgeementID = $this->session->userdata("exclusiveAgeementID");
        if($agreement_id){
            $data['title'] = 'sucess'; 
            if($exclusiveAgeementID){
                $data['exclusiveAgeementID'] = $exclusiveAgeementID;
            }
            $data['agreement_id'] = $agreement_id;
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/customer/success', $data);
            $this->load->view('admin/includes/_footer');
        }else{
            $data['title'] = 'sucess'; 
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/customer/success');
            $this->load->view('admin/includes/_footer');
        }
    }
    
     public function ownerAgreement(){
        
        $this->session->unset_userdata('ageementID');
        $this->session->unset_userdata('exclusiveAgeementID');
        $data = $this->clients_model->ownerAgreement();
        if($this->input->post('exclusivity') !=0){
            $id = $data[0]['id'];
            $ids = $id + 1;
        }
        if($this->input->post('agree_pro')== 1){
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $subject = "this is testing email";
        $clients = $this->input->post('client_id');
        $num=0;
        foreach($clients as $client)
        {
            $query[] = $this->db->get_where('customer_clients', array('id' => $client))->result_array();
            $to = $query[$num][0]['email'];
            $datas = array(
             'name'=> $query[$num][0]['name'],
             'clientID'=> $query[$num][0]['id'],
             'agreementID' => $data[0]['id'],
                 );
            $message = $this->load->view('admin/customer/agreement_email',$datas,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            
            if($this->input->post('exclusivity') !=0){
            $datass = array(
             'name'=> $query[$num][0]['name'],
             'clientID'=> $query[$num][0]['id'],
             'agreementID' => $ids,
                 );
            $message = $this->load->view('admin/customer/agreement_email',$datass,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            }
            $num++;
        };
        echo 'Your Email has successfully been sent.';
            
        }else{
            $this->load->library('session');
            $this->session->set_userdata("ageementID",$data[0]['id']);
            if($this->input->post('exclusivity') !=0){
                $this->session->set_userdata("exclusiveAgeementID",$ids);
            }
            echo 'Agreement Produced';
        }
        
        
    }
    
    public function clientAgreements($id){
       
        $data['title']  = "Client Agreements";
        $user=$this->auth_model->get_logged_user();
        $agreements = $this->db->get_where('customer_agreements', array('user_id' => $user->id))->result_array();
        $datas = array();
        foreach($agreements as $agreement){
            $client_ids = explode(",", $agreement['client_id']);
            if(in_array($id,$client_ids)){
                $datas[] = $agreement;
            }
        }
        $data['agreements'] = $datas;
        $data['client'] = $this->db->get_where('customer_clients', array('id' => $id))->row();
        $data['property'] = $this->db->get('customer_property')->result_array();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/client_agreements', $data);
        $this->load->view('admin/includes/_footer');
    }
    
     public function propertyAgreements($id){
      
        $data['title']  = "Client Agreements";
        $user=$this->auth_model->get_logged_user();
        $agreements = $this->db->get_where('customer_agreements', array('user_id' => $user->id))->result_array();
        $clients = $this->db->get_where('customer_clients', array('user_id' => $user->id))->result_array();
        $agre = array();
        foreach($agreements as $agreement){
            $prop_ids = explode(",", $agreement['property_id']);
            if(in_array($id,$prop_ids)){
                $cli = explode(",", $agreement['client_id']);
                foreach($clients as $cl){
                    if(in_array($cl['id'], $cli)){
                        $agreement['client_name'] = $cl['name'];
                         $agreement['clientID'] = $cl['id'];
                        $agre[] = $agreement;
                    }
                }
            }
        }
        
        $data['agreements'] = $agre;
        $data['property'] = $this->db->get('customer_property')->result_array();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/property_agreements', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function binderAgreements(){
        
        $data['title']  = "Binder of Agreements";
        $user=$this->auth_model->get_logged_user();
        $this->db->select("*");
        $this->db->from("customer_agreements");
        $this->db->where('user_id', $user->id);
        $this->db->where('month(created_at)', date('m'));
        $this->db->where('year(created_at)', date('Y'));
        $agreements = $this->db->get()->result_array();  
        $clients = $this->db->get('customer_clients')->result_array();
        $agre = array();
        $data['m'] = date('m');
        $data['y'] = date('Y');
        foreach($agreements as $agreement){
            $cli = explode(",", $agreement['client_id']);
            foreach($clients as $cl){
                if(in_array($cl['id'], $cli)){
                    $agreement['client_name'] = $cl['name'];
                    $agreement['clientID'] = $cl['id'];
                    $agre[] = $agreement;
                }
            }
        }
        $data['agreements'] = $agre;
        $data['property'] = $this->db->get('customer_property')->result_array();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/binder_agreements', $data);
        $this->load->view('admin/includes/_footer');
    }
    
     public function binderAgreements_ajax(){
        
        $user=$this->auth_model->get_logged_user();
        $year = $this->input->post('yea');
        $month = $this->input->post('mon');
        $this->db->select("*");
        $this->db->from("customer_agreements");
        $this->db->where('user_id', $user->id);
        $this->db->where('month(created_at)', $month);
        $this->db->where('year(created_at)', $year);
        $agreements = $this->db->get()->result_array();  
        $data['title']  = "Binder of Agreements";
        $data['m'] = $month;
        $data['y'] = $year;
        $clients = $this->db->get('customer_clients')->result_array();
        $agre = array();
        foreach($agreements as $agreement){
            $cli = explode(",", $agreement['client_id']);
            foreach($clients as $cl){
                if(in_array($cl['id'], $cli)){
                    $agreement['client_name'] = $cl['name'];
                    $agreement['clientID'] = $cl['id'];
                    $agre[] = $agreement;
                }
            }
        }
        $data['agreements'] = $agre;
        $data['property'] = $this->db->get('customer_property')->result_array();
        $this->session->set_userdata("data",$data);
    }
    
    public function ajaxAgreements(){
        $data = $this->session->userdata("data");
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/binder_agreements', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function deleteAgreement(){
       $agreement_id = $this->input->post('agreementID');
       $client_id = $this->input->post('clientID');
       
       foreach($agreement_id as $k => $agree){
           $data = array(
               'agreement_id' => $agree,
               'client_id' => $client_id[$k],
               );
          $this->db->insert('deleted_agreements', $data);
       }
       
       echo 'deleted success';
    }
    
    public function deletedAgreements(){
        
        $data['title'] = 'Deleted agreements';
        $deleted_agre = $this->db->get('deleted_agreements')->result_array();
        $deleted = array();
        foreach($deleted_agre as $del){
            $deleteds = $this->db->get_where('customer_agreements',array('id' => $del['agreement_id']))->row();
            $client  = $this->db->get_where('customer_clients',array('id' => $del['client_id']))->row();
            $deleteds->clientID = $client->id;
            $deleteds->name     = $client->name;
            $deleted[] = $deleteds; 
        }
        $data['agreements'] = $deleted;
        $data['property'] = $this->db->get('customer_property')->result_array();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/customer/deleted_agreements', $data);
        $this->load->view('admin/includes/_footer');
    }
    
     public function reconstructAgreement(){
        
        $client_id = $this->input->post('client_id');
        $agreement_id = $this->input->post('agreement_id');
        foreach($agreement_id as $k => $agree){
            $this->db->delete('deleted_agreements', array('agreement_id' => $agree, 'client_id' => $client_id[$k]));
        }
        echo 'deleted success';
        
    }
    
    public function sendReminder(){
        $agreement_id = $this->input->post('agreement_id');
        $client_id    = $this->input->post('client_id');
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $subject = "this is reminder email";
        
        $query = $this->db->get_where('customer_clients', array('id' => $client_id))->row();
        $to = $query->email;
        $datas = array(
         'name'=> $query->name,
         'clientID'=> $query->id,
         'agreementID' => $agreement_id,
             );
        $message = $this->load->view('admin/customer/agreement_email',$datas,true);
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        $msgs = json_encode(['success' => 'Reminder is send']);
        echo $msgs;
    }
    
     public function reminderSend(){
        $agreement_id = $this->input->post('agreement_id');
        $exclusive_agreement_id = $this->input->post('exclusive_agreement_id');
        $agreement = $this->db->get_where('customer_agreements', array('id' => $agreement_id))->row();
        $clients = explode(",", $agreement->client_id);
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $subject = "this is testing email";
        $num = 0;
        foreach($clients as $client)
        {
            $query[] = $this->db->get_where('customer_clients', array('id' => $client))->result_array();
            $to = $query[$num][0]['email'];
            $datas = array(
             'name'=> $query[$num][0]['name'],
             'clientID'=> $query[$num][0]['id'],
             'agreementID' => $agreement_id,
                 );
            $message = $this->load->view('admin/customer/agreement_email',$datas,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            
            if($exclusive_agreement_id !=0){
            $datass = array(
             'name'=> $query[$num][0]['name'],
             'clientID'=> $query[$num][0]['id'],
             'agreementID' => $exclusive_agreement_id,
                 );
            $message = $this->load->view('admin/customer/agreement_email',$datass,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            }
            $num++;
        };
        
    }
    
    public function viewAgreement($agree, $client, $signed){
        $data['user']=$this->auth_model->get_logged_user();
         $data['agreement'] = $this->db->get_where('customer_agreements', array('id' => $agree))->row();
         $data['asking_price'] = explode(",", $data['agreement']->asking_price);
         $data['requested_rent'] = explode(",", $data['agreement']->requested_rent);
         $property = explode(",", $data['agreement']->property_id);
         $data['client'] = $this->db->get_where('customer_clients', array('id' => $client))->row();
         $i=0;
         $properties = array();
         foreach($property as $prop){
             $properties[] = $this->db->get_where('customer_property', array('id' => $prop))->result_array();
            $i++;
         }
         $data['propert'] = $properties;
        $data['signed']    = $this->db->get_where('customer_signed_agreements', array('id' => $signed))->row();
        // $data['image'] = base64_encode('<img src="https://zeroitsolutions.com/nandlanpro/panel/uploads/signature/1624369774_image.png"/>');
        // print_r($data['image']); die;
      	$this->load->library('pdf');
        $html = $this->load->view('admin/customer/view_agreement', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }



    public function user_options_post(){
        
        $option = $this->input->post('option', true);
        $id = $this->input->post('id', true);
        $logged_id = user()->id;

        //option delete
        if($option == 'delete'){
            if(is_admin() || is_permission_user('customer_delete')):

                if($this->auth_model->delete_user($id)){

                $this->session->set_flashdata('success', "customer successfully deleted!");

                redirect($this->agent->referrer());
               
                }else{

                $this->session->set_flashdata('error', "There was a problem deleting the customer!");
                redirect($this->agent->referrer());

                }
            else:
                $this->session->set_flashdata('error', "No allowed permission.");
                redirect($this->agent->referrer());
            endif;
        }

        //if option ban
        if($option == 'ban'){
             if(is_admin() || is_permission_user('customer_ban')):

            if($this->auth_model->ban_user($id)){
                $this->session->set_flashdata('success', "customer successfully banned!");
                redirect($this->agent->referrer());
            }else{
                $this->session->set_flashdata('error', "There was a problem banning the customer!");
                redirect($this->agent->referrer());
            }

             else:
                $this->session->set_flashdata('error', "No allowed permission.");
                redirect($this->agent->referrer());
            endif;
        }

        //if option remove ban
        if($option == 'remove_ban'){
             if(is_admin() || is_permission_user('customer_ban')):
                    if($this->auth_model->remove_user_ban($id)) {
                    $this->session->set_flashdata('success', "customer ban successfully removed!");
                    redirect($this->agent->referrer());
                    }else{
                    $this->session->set_flashdata('error', "There was a problem removing customer ban!");
                    redirect($this->agent->referrer());
                    }
             else:
                $this->session->set_flashdata('error', "No allowed permission.");
                redirect($this->agent->referrer());
            endif;
        }

    }


}