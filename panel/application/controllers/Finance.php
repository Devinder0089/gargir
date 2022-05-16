<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends MY_Controller{


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
        $data['title'] = trans('finance');
        $data['now'] = date('Y-m-d');
        $data['finance'] = $this->finance_model->index();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/finance/index', $data);
        $this->load->view('admin/includes/_footer');
    } 
    
    public function add(){
      
        $data['title'] = trans('add_payment');
        $data['users'] = $this->auth_model->get_users(['role' => 'contractor']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/finance/add', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function add_post(){
        $user = $this->input->post('user_id');
        $payment = $this->input->post('payment');
        $payment_method =$this->input->post('payment_method');
        $receive_date =$this->input->post('receive_date');
        $date = new DateTime($receive_date); // Y-m-d
        $date->add(new DateInterval('P30D'));
        $end_date = $date->format('Y-m-d');  
    
            if(empty($user)){
            $this->session->set_flashdata('error',trans('please_select').' '. trans('contractor'));
            redirect($this->agent->referrer());
            }
            
            if(empty($payment)){
            $this->session->set_flashdata('error',trans('please_enter').' '. trans('payment'));
            redirect($this->agent->referrer());
            }
            if(empty($payment_method)){
            $this->session->set_flashdata('error',trans('please_select').' '. trans('payment_method'));
            redirect($this->agent->referrer());
            }
            if(empty($receive_date)){
            $this->session->set_flashdata('error',trans('please_enter').' '. trans('receive_date'));
            redirect($this->agent->referrer());
            }
    
            $set['user_id']=$user;
            $set['payment']=$payment;
            $set['payment_method']=$payment_method;
            $set['receive_date']=$receive_date;
            $set['end_date']=$end_date;
            
            if($this->finance_model->add_data($set)){
    
             $this->session->set_flashdata('success',trans('payment_created'));
            redirect($this->agent->referrer());
    
           }else{
            $this->session->set_flashdata('error',trans('payment_create_error'));
            redirect($this->agent->referrer());
           }

    }
    
     public function edit($id){
      
        $data['title'] = trans('edit_payment');
        $data['payment'] = $this->finance_model->get_payment_by_id($id);
        if(empty($data['payment'])){
            redirect($this->agent->referrer());
        }
        $data['users'] = $this->auth_model->get_users(['role' => 'contractor']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/finance/update', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function edit_post(){
        $user = $this->input->post('user_id');
        $payment = $this->input->post('payment');
        $payment_method =$this->input->post('payment_method');
        $receive_date =$this->input->post('receive_date');
        $date = new DateTime($receive_date); // Y-m-d
        $date->add(new DateInterval('P30D'));
        $end_date = $date->format('Y-m-d');  
        
        if(empty($user)){
        $this->session->set_flashdata('error',trans('please_select').' '. trans('contractor'));
        redirect($this->agent->referrer());
        }
        
        if(empty($payment)){
        $this->session->set_flashdata('error',trans('please_enter').' '. trans('payment'));
        redirect($this->agent->referrer());
        }
        if(empty($payment_method)){
        $this->session->set_flashdata('error',trans('please_select').' '. trans('payment_method'));
        redirect($this->agent->referrer());
        }
        if(empty($receive_date)){
        $this->session->set_flashdata('error',trans('please_enter').' '. trans('receive_date'));
        redirect($this->agent->referrer());
        }

        $set['user_id']=$user;
        $set['payment']=$payment;
        $set['payment_method']=$payment_method;
        $set['receive_date']=$receive_date;
        $set['end_date']=$end_date;
        
        if($this->finance_model->edit_data($set)){

         $this->session->set_flashdata('success',trans('payment_updated'));
        redirect($this->agent->referrer());

       }else{
        $this->session->set_flashdata('error',trans('payment_update_error'));
        redirect($this->agent->referrer());
       }

    }
    
    // public function details($id){
    
    //     if(empty($id)){
    //     redirect($this->agent->referrer());
    //     }

    //     $data['title'] = "Finance";
    //     $data['finance']=$this->finance_model->get_finance_data_by_id($id);
    //     $this->load->view('admin/includes/_header', $data);
    //     $this->load->view('admin/finance/details', $data);
    //     $this->load->view('admin/includes/_footer');

    // }

    public function delete_post(){
       
         $id=$this->input->post('id');

        if($this->finance_model->delete($id)){

            $this->session->set_flashdata('success', trans('payment_deleted'));
            redirect($this->agent->referrer());

        }else{
            $this->session->set_flashdata('error', trans('payment_delete_error'));
            redirect($this->agent->referrer());
        }

    }
    
    public function contratorPaymentHistory($slug){
        $user = $this->auth_model->get_user_by_slug($slug);
        if(empty($user)){
            redirect($this->agent->referrer());
        }
        $data['title'] = "Finance";
        $data['now'] = date('Y-m-d');
        $data['finance'] = $this->finance_model->con_pay_history($user->id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/finance/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function get_finance_by_month(){
        $data['title'] = trans('finance');
        $data['now'] = date('Y-m-d');
        $data['finance'] = $this->finance_model->get_finance_by_month();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/finance/index', $data);
        $this->load->view('admin/includes/_footer');
    }

     public function get_finance_by_year(){
        $data['title'] = trans('finance');
        $data['now'] = date('Y-m-d');
        $data['finance'] = $this->finance_model->get_finance_by_year();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/finance/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function get_user_payment_record(){
       $data['title'] = trans('contractor_finance_his');
       $data['now'] = date('Y-m-d');
       $email = $this->input->post('email');
       $data['user'] = $this->auth_model->get_user_by_email($email);
       if($data['user']){
           $data['finance'] = $this->finance_model->con_pay_history($data['user']->id);
           $data['pay_year_sum'] = $this->finance_model->get_finance_sum(['user_id' => $data['user']->id, 'year(created_at)' => date('Y')]);
           $data['pay_life_sum'] = $this->finance_model->get_finance_sum(['user_id' => $data['user']->id]);
           echo json_encode($this->load->view('admin/finance/user_payment_history', $data));
       }
    }
}

?>