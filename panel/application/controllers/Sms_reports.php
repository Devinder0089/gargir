<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_reports extends MY_Controller{


    public function __construct(){
        parent::__construct();

        if(!auth_check()){
            redirect('login');
        }
    }


    public function index(){
      
        $user =user();

        $data['title'] = "Sms Reports";
        $data['sms_reports'] = $this->sms_reports_model->get_data();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/sms-reports/index', $data);
        $this->load->view('admin/includes/_footer');
    } 


public function details($id){

    if(empty($id)){
    redirect($this->agent->referrer());
    }

    $data['title'] = "Sms Reports";
    $data['sms_reports']=$this->sms_reports_model->get_data_row_by_id($id);
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/sms-reports/details', $data);
    $this->load->view('admin/includes/_footer');

}

public function sms_send($id){

    if(empty($id)){
    redirect($this->agent->referrer());
    }

    var_dump($id,'working procces...');

}
    
    public function add(){
      
        $user =user();

        $data['title'] = "Sms Reports";
        $data['sms_reports'] = $this->sms_reports_model->get_data();
        $data['user'] = $user;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/sms-reports/add', $data);
        $this->load->view('admin/includes/_footer');
    } 

public function add_post(){
    $adduser=false;
    $parent=$this->input->post('parent');
    $name=$this->input->post('name');
    $userselect=$this->input->post('userselect');
    $content=$this->input->post('content');
   

    if(empty($content)){
    $this->session->set_flashdata('error','Please enter Message.');
    redirect($this->agent->referrer());
    } 
 
    if(empty($name)){
    $this->session->set_flashdata('error','Please enter name.');
    redirect($this->agent->referrer());
    } 
    
    if(isset($userselect[0]) && empty($userselect[0])){
    $this->session->set_flashdata('error','Please enter user.');
    redirect($this->agent->referrer());
    } 

foreach($userselect as $vl){
    $user=$this->auth_model->get_user($vl);
    $phone=($user)?$user->phone:'0000000000';
    $data=[
    'user_id'=>$vl,
    'name'=>$name,
    'parent'=>$parent,
    'content'=>$content,
    'phone'=>$phone,
    ];
    $adduser=$this->sms_reports_model->add($data);
}


    if($adduser){
        $this->session->set_flashdata('success','add success.');
        redirect($this->agent->referrer());
    }else{

           $this->session->set_flashdata('error','add failed.');
        redirect($this->agent->referrer());
    }

}


    public function delete_post(){
       
         $id=$this->input->post('id');

        if($this->sms_reports_model->delete($id)){

            $this->session->set_flashdata('success', "Sms Reports successfully deleted!");
            redirect($this->agent->referrer());

        }else{
            $this->session->set_flashdata('error', "There was a problem deleting the Sms Reports!");
            redirect($this->agent->referrer());
        }

    }


}

?>