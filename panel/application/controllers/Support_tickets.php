<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_tickets extends MY_Controller{


    public function __construct(){
        parent::__construct();

        if(!auth_check()){
            redirect('login');
        }
    }


    public function index(){
      
        $user =user();

        $data['title'] = "Support tickets";
        $data['sms_reports'] = $this->sms_reports_model->get_data();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/support-tickets/index', $data);
        $this->load->view('admin/includes/_footer');
    } 


public function details($id){

    if(empty($id)){
    redirect($this->agent->referrer());
    }

    $data['title'] = "Support tickets";
    $data['sms_reports']=$this->sms_reports_model->get_data_row_by_id($id);
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/support-tickets/details', $data);
    $this->load->view('admin/includes/_footer');

}

    public function delete_post(){
       
         $id=$this->input->post('id');

        if($this->sms_reports_model->delete($id)){

            $this->session->set_flashdata('success', "Support tickets successfully deleted!");
            redirect($this->agent->referrer());

        }else{
            $this->session->set_flashdata('error', "There was a problem deleting the Support tickets!");
            redirect($this->agent->referrer());
        }

    }


}

?>