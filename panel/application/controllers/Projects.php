<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends MY_Controller{

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
      

        $data['title'] = trans('projects');

        $data['projects'] = $this->project_model->index();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/projects/index', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * add
     */
    public function add(){
       
        if(is_contractor() && !contractor_project_check()){
             redirect($this->agent->referrer());
        }
      
        $data['title'] = trans('add_project');
        $data['user'] =user();
        $data['workers'] = $this->auth_model->get_users(['role'=>'worker','contractor_id'=> $data['user']->id]);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/projects/add', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * add
     */
    public function add_project_post(){
      
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }
        $user=$this->auth_model->get_logged_user();
        $title=$this->input->post('title');
        $buil_no=$this->input->post('building_no');
        $city=$this->input->post('city');
        $zipcode=$this->input->post('zipcode');
        $address=$this->input->post('address');
        $content=$this->input->post('content');
        $no_of_apartments=$this->input->post('no_of_apartments');
        $type=$this->input->post('type');
        $currency=($this->input->post('currency')?$this->input->post('currency'):"$");
        $url=$this->input->post('url');
        $assign_user_id=$this->input->post('assign_user_id');
        $expt_delvry_date=$this->input->post('expt_delvry_date');
        $project_manager_name=$this->input->post('project_manager_name');
        $manager_email=$this->input->post('manager_email');
        $manager_phone=$this->input->post('manager_phone');
        
    
        if(empty($title)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('title'));
            redirect($this->agent->referrer());
        }
        if(empty($buil_no)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('building_number'));
            redirect($this->agent->referrer());
        }
        if(empty($city)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('city'));
            redirect($this->agent->referrer());
        }
        if(empty($zipcode)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('zip_code'));
            redirect($this->agent->referrer());
        }
        if(empty($address)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('address'));
            redirect($this->agent->referrer());
        }
        if(empty($currency)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('project_currency'));
            redirect($this->agent->referrer());
        }
        
        if(empty($type)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('type'));
            redirect($this->agent->referrer());
        }
        if(empty($no_of_apartments)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('number_apartments'));
            redirect($this->agent->referrer());
        }
        if(empty($content)){
        $this->session->set_flashdata('error',trans('please_enter').' '.trans('content'));
        redirect($this->agent->referrer());
        }
        if(empty($assign_user_id)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('workers'));
            redirect($this->agent->referrer());
        }
         if(empty($project_manager_name)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('manager_name'));
            redirect($this->agent->referrer());
        }
         if(empty($manager_email)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('manager_email'));
            redirect($this->agent->referrer());
        }
         if(empty($manager_phone)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('manager_phone'));
            redirect($this->agent->referrer());
        }
        $data=[
        'uid'=>$user->id,
        'title'=>$title,
        'building_no'=>$buil_no,
        'city'=>$city,
        'zipcode'=>$zipcode,
        'address'=>$address,
        'type'=>$type,
        'content'=>$content,
        'currency'=>$currency,
        'url'=>$url,
        'no_of_apartments'=>$no_of_apartments,
        'expt_delvry_date' => $expt_delvry_date,
        'project_manager_name'=>$project_manager_name,
        'manager_email'=>$manager_email,
        'manager_phone' => $manager_phone
        ];


        if($this->project_model->create($data)){

         $this->session->set_flashdata('success',trans('project_created'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('project_create_error'));
        redirect($this->agent->referrer());
       }

    }

    /**
    * project_details
    */
    public function project_details($slug){
      
        $data['title'] = trans('project_details');
        $data['project'] = $this->project_model->project_details($slug);
        $users = array();
        if(empty($data['project'])){
            redirect(base_url() . 'admin');
        }
        $workers = $this->auth_model->get_users(['role'=>'worker']);
        foreach($workers as $worker){
            $assign = explode(',', $data['project']->assign);
            if(in_array($worker->id, $assign)){
                $users[] = $worker; 
            }
        }
        $data['users'] = $users;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/projects/project_details', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
    * project_details
    */
    public function project_edit($slug){
        $data['title'] = trans('project_edit');
        $data['project'] = $this->project_model->project_edit($slug);
        if(empty($data['project'])){
            redirect(base_url() . 'admin');
        }
        $data['workers'] = $this->auth_model->get_users(['role'=>'worker','contractor_id'=> $data['project']->uid]);   
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/projects/edit', $data);
        $this->load->view('admin/includes/_footer');
    }
    
        public function project_edit_post(){
      
          //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $user=$this->auth_model->get_logged_user();
        $buil_no=$this->input->post('building_no');
        $city=$this->input->post('city');
        $zipcode=$this->input->post('zipcode');
        $address=$this->input->post('address');
        $content=$this->input->post('content');
        $no_of_apartments=$this->input->post('no_of_apartments');
        $type=$this->input->post('type');
        $currency=($this->input->post('currency')?$this->input->post('currency'):"$");
        $url=$this->input->post('url');
        $assign_user_id=$this->input->post('assign_user_id');
        $expt_delvry_date=$this->input->post('expt_delvry_date');
        $project_manager_name=$this->input->post('project_manager_name');
        $manager_email=$this->input->post('manager_email');
        $manager_phone=$this->input->post('manager_phone');
        if(empty($buil_no)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('building_number'));
            redirect($this->agent->referrer());
        }
        if(empty($city)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('city'));
            redirect($this->agent->referrer());
        }
        if(empty($zipcode)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('zip_code'));
            redirect($this->agent->referrer());
        }
        if(empty($address)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('address'));
            redirect($this->agent->referrer());
        }
        if(empty($currency)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('project_currency'));
            redirect($this->agent->referrer());
        }
        
        if(empty($type)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('type'));
            redirect($this->agent->referrer());
        }
        if(empty($no_of_apartments)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('number_apartments'));
            redirect($this->agent->referrer());
        }
        if(empty($content)){
        $this->session->set_flashdata('error',trans('please_enter').' '.trans('content'));
        redirect($this->agent->referrer());
        }
        if(empty($assign_user_id)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('workers'));
            redirect($this->agent->referrer());
        }
         if(empty($project_manager_name)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('manager_name'));
            redirect($this->agent->referrer());
        }
         if(empty($manager_email)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('manager_email'));
            redirect($this->agent->referrer());
        }
         if(empty($manager_phone)){
            $this->session->set_flashdata('error',trans('please_enter').' '.trans('manager_phone'));
            redirect($this->agent->referrer());
        }
        $data=[
        'building_no'=>$buil_no,
        'city'=>$city,
        'zipcode'=>$zipcode,
        'address'=>$address,
        'type'=>$type,
        'content'=>$content,
        'currency'=>$currency,
        'url'=>$url,
        'no_of_apartments'=>$no_of_apartments,
        'expt_delvry_date' => $expt_delvry_date,
        'project_manager_name'=>$project_manager_name,
        'manager_email'=>$manager_email,
        'manager_phone' => $manager_phone
        ];
        if($this->project_model->edit($data)){

         $this->session->set_flashdata('success',trans('project_updated'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('project_update_error'));
        redirect($this->agent->referrer());
       }

    }



    /**
     * delete_project_post
     */
    public function delete_project_post(){
       
         $id=$this->input->post('id');

        if($this->project_model->delete_project($id)) {
            $this->session->set_flashdata('success', trans('project_delete'));
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans('project_delete_error'));
            redirect($this->agent->referrer());
        }

    }


    public function getUser(){
        $email=$this->input->post('email');
        $data['ajax'] ="";
        $data['user'] = $this->auth_model->get_user_by_email($email);  
        $data['contractor'] = $this->auth_model->get_user($data['user']->contractor_id);
        if($data['user']->role == 'worker'){
            $data['title'] = 'worker';
            echo json_encode($this->load->view('admin/worker/details', $data));
        }else{
            $data['title'] = 'Client';
            echo json_encode($this->load->view('admin/client/details', $data));
        }
        
    }
    
    public function projectReports($slug){
        $data['title'] = trans('project_reports');
        $data['project'] = $this->project_model->project_edit($slug);
        if(empty($data['project'])){
            redirect(base_url() . 'admin');
        }
        $data['project_reports'] = $this->project_model->project_reports($data['project']->id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/projects/project_reports', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function projectReports_post(){
        $user=$this->auth_model->get_logged_user();
        $project_id = $this->input->post('project_id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        if(empty($title) || empty($project_id) || empty($description)){
             redirect($this->agent->referrer());
        }
        $data=[
        'user_id'=>$user->id,
        'project_id'=>$project_id,
        'title'=>$title,
        'description'=>$description
        ];
          
        if($file = $this->project_model->project_reports_post($data)){
            // var_dump($file); die;
            if(isset($_POST['type'])){
                $this->load->config('email');
                $this->load->library('email');
                $from = $this->config->item('smtp_user');
                $subject = $title;
                $apartments = $this->apartment_model->index($project_id);
                foreach($apartments as $apartment)
                {
                    $to = $apartment->client;
                    $message = $description;
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    if(!empty($file)){
                       foreach($file as $f){
                        $this->email->attach("https://zeroitsolutions.com/gargir/panel/uploads/project/$f");
                        } 
                    }
                    $this->email->send();
                };
                
            }
        $this->session->set_flashdata('success',trans('report_created'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('report_create_error'));
        redirect($this->agent->referrer());
       }
    }
    
    public function projectReportEdit($id){
        $data['title'] = trans('project_reports_edit');
        $data['report'] = $this->project_model->get_report_by($id);
        if(empty($data['report'])){
           redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/projects/project_report_edit', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function projectReportEdit_post(){
        $id = $this->input->post('id');
        $user=$this->auth_model->get_logged_user();
        $title = $this->input->post('title');
         $project_id = $this->input->post('project_id');
        $description = $this->input->post('description');
        if(empty($title) || empty($description) || empty($id)){
             redirect($this->agent->referrer());
        }
        $data=[
        'updated_by'=>$user->id,
        'title'=>$title,
        'description'=>$description
        ];
          
        if($files = $this->project_model->project_reports_edit_post($data)){
            $file = explode(',', $files);
            if(isset($_POST['type'])){
                $this->load->config('email');
                $this->load->library('email');
                $from = $this->config->item('smtp_user');
                $subject = $title;
                $apartments = $this->apartment_model->index($project_id);
                foreach($apartments as $apartment)
                {
                    $to = $apartment->client;
                    $message = $description;
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    if(!empty($file)){
                       foreach($file as $f){
                        $this->email->attach("https://zeroitsolutions.com/gargir/panel/uploads/project/$f");
                        } 
                    }
                    $this->email->send();
                };
                
            }
         $this->session->set_flashdata('success',trans('report_updated'));
        redirect($this->agent->referrer());

       }else{

        $this->session->set_flashdata('error',trans('report_update_error'));
        redirect($this->agent->referrer());
       }
    }
    
     public function getDetails(){
        $id=$this->input->post('id');
        $data['ajax'] ="";
        $data['report'] = $this->project_model->get_report_by($id);
        echo json_encode($this->load->view('admin/projects/project_report_details', $data));
    }
    
    public function delete_project_report_post(){
       
         $id=$this->input->post('id');
        if($this->project_model->delete_project_report($id)) {
            $this->session->set_flashdata('success', trans('report_deleted'));
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans('report_delete_error'));
            redirect($this->agent->referrer());
        }

    }
    
    public function project_status_change(){
       $id = $this->input->post('project_id');
       $status = $this->input->post('status');
       $data=[
        'status'=>$status,
        ];
        if($status == 1){
            $value = 'we inform you that we started building project';
        }else if($status == 2){
            $value = 'we inform you that project work is Completed';
        }else{
            $value = 'planning';
        }
       if($this->project_model->changestatus($data)) {
          
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $subject = "this is testing email";
        $apartments = $this->apartment_model->index($id);
        foreach($apartments as $apartment)
        {
            $to = $apartment->client;
            $datas = array(
             'name'=> $apartment->name,
             'status' => $value,
                 );
            $message = $this->load->view('admin/email/status_change',$datas,true);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
        };
        $this->session->set_flashdata('success', trans('status_change_success'));
        redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans('status_change_error'));
            redirect($this->agent->referrer());
        }
        
    }
    
    public function getPayments(){
        $id=$this->input->post('id');
        $data['total_project_payment'] = $this->project_model->sum_payment_by_project($id);
        $data['total_paid'] = $this->project_model->get_paid_payment_sum_by_project($id);
        $data['total_debt'] = $data['total_project_payment'] - $data['total_paid'];
        echo json_encode($this->load->view('admin/projects/payment', $data));
    }
}