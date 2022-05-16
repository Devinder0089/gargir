<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller{
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
        $data['total_finance_this_month']= $this->finance_model->total_income_this_month();
        $data['total_finance_this_year']= $this->finance_model->total_income_this_year();
        $data['total_finance']= $this->finance_model->total_income();
        $data['total_contractor_count']= $this->auth_model->user_count(['role' => 'contractor']);
        $data['total_projects_count']= $this->project_model->project_count();
        $data['total_worker_count']= $this->auth_model->user_count(['role' => 'worker']);
        $data['total_client_count']= $this->auth_model->user_count(['role' => 'client']);
        $data['total_finance_in_debt']= $this->finance_model->total_finance_in_debt();
        $data['total_apartment_count']= $this->apartment_model->apartment_count();
        $data['total_money_raised_from_projects']= $this->project_model->total_money_raised_projects();
        
        $invoices_count= $this->invoices_model->count();
        $data['title'] = "Index";
        $data['user_count'] = $this->auth_model->get_user_count();
        $data['last_comments'] =[];
        $data['last_contacts'] =[];
        $data['last_users'] = $this->auth_model->get_last_users();
        $data['post_count'] = 0;
        $data['pending_customers_count'] = $this->customer_model->get_pending_customers_count();
        $data['active_customers_count'] = $this->customer_model->get_active_customers_count();
        $data['project_money_count'] = 0;
        $data['calendar_management_count'] = 0;
        $data['pending_post_count'] =0;
        $data['video_count'] =0;
        $data['pending_video_count'] = 0;
        $data['invoices_count']=$invoices_count;
        $data['sms_reports_count'] =$this->sms_reports_model->count();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/includes/_footer');
    }

}