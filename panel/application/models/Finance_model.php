<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_model extends CI_Model
{
	
	
		 
	 public  function __construct() { 
        $this->transTable = 'payments'; 
    } 


    /* 
     * Fetch payment data from the database 
     * @param id returns 
     */ 
     
    public function index(){
       $data = $this->get_finance();
       return $data;
    }
    
    public function add_data($data){
       if($this->db->insert('finance', $data)){
           return true;
       }else{
           return false;
       }
    }
    
    public function edit_data($data){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
       if($this->db->update('finance', $data)){
           return true;
       }else{
           return false;
       }
    }
    
    public function get_payment_by_id($id){ 
       
        $this->db->where('id', $id);
        $result = $this->db->get('finance')->row(); 
        return  $result;
    } 
    
    public function delete($id){
        $this->db->where('id', $id);
       if($this->db->delete('finance')){
           return true;
       }else{
           return false;
       }
    }
    
    public function get_finance_by_month(){
        $query = $this->get_finance(['month(finance.created_at)' => date('m'), 'year(finance.created_at)' => date('Y')]);
        return $query;
    }
    
    public function get_finance_by_year(){
        $query = $this->get_finance(['year(finance.created_at)' => date('Y')]);
        return $query;
    }
    
    //sum
    
    public function total_income_this_month(){
        
        $result = $this->get_finance_sum(['month(created_at)' => date('m'),'year(created_at)' => date('Y')]);
        return $result;

    }

    public function total_income_this_year(){
        $result = $this->get_finance_sum(['year(created_at)' => date('Y')]);
        return $result;
    }
    
     public function total_income(){
       $result = $this->get_finance_sum();
        return $result;

    }
    
    public function get_finance_sum($where=false){
        $user = $this->auth_model->get_logged_user();
        $total = 0;
        if($user->role == 'admin'){
            if($where){
                $this->db->where($where);
            }
            $this->db->select_sum('payment');
            $query=$this->db->get('finance');
            $total=$query->row()->payment;
        }else if($user->role == 'contractor'){
            if($where){
                $this->db->where($where);
            }
            $this->db->select_sum('payment');
            $this->db->where(['user_id' => $user->id, 'status' => 1]);
            $query=$this->db->get('apartment_payments');
            $total=$query->row()->payment;
        }else if($user->role == 'worker'){
            $apartments = $this->apartment_model->get_data_apartments_assign_by_join();
            foreach($apartments as $apartment){
               $this->db->where('project_id', $apartment->project_id);
               $pro = $this->db->get('projects_assign')->row();
               $worker = explode(',', $pro->assign_user_id);
               if(in_array($user->id, $worker)){
                   if($where){
                        $this->db->where($where);
                    }
                    $this->db->select_sum('payment');
                    $this->db->where(['apartment_id' => $apartment->id, 'status' => 1]);
                    $query=$this->db->get('apartment_payments');
                    $total+=$query->row()->payment;
               }
            }
        }else{
             if($where){
                $this->db->where($where);
            }
            $this->db->select_sum('payment');
            $this->db->where(['client_id' => $user->id, 'status' => 1]);
            $query=$this->db->get('apartment_payments');
            $total=$query->row()->payment;
        }
       
        return $total;
    }
    
     public function con_pay_history($id){
       $this->db->where('finance.user_id',$id);
       $this->db->order_by('finance.id', 'DESC');
       $this->db->join('users', 'finance.user_id = users.id');
       $this->db->select('finance.*, users.email as user');
       $query = $this->db->get('finance');
       return $query->result();
    }
    
    
    public function get_finance($where=false){
        if($where){
            $this->db->where($where);
        }
       
       $this->db->join('users', 'finance.user_id = users.id');
       $this->db->select('finance.*, users.email as user');
       $query = $this->db->get('finance');
       return $query->result();

     }
     
      public function total_finance_in_debt($where=false){
        $user = $this->auth_model->get_logged_user();
        $result = $this->get_finance_sum();
        $total = 0;
        if($user->role == 'contractor'){
            $this->db->select_sum('saled_in');
            $this->db->where('user_id', $user->id);
            $query=$this->db->get('apartments');
            $total=$query->row()->saled_in;
            if($total && $result){
                return $total - $result;
            }else{
                return false;
            }
        }else if($user->role == 'worker'){
            $apartments = $this->apartment_model->get_data_apartments_assign_by_join();
            foreach($apartments as $apartment){
              $this->db->where('project_id', $apartment->project_id);
              $pro = $this->db->get('projects_assign')->row();
              $worker = explode(',', $pro->assign_user_id);
              if(in_array($user->id, $worker)){
                  $total+= $apartment->saled_in;
              }
            }
            if($total && $result){
                return $total - $result;
            }
        }else{
            $this->db->select_sum('saled_in');
            $this->db->where('client_id', $user->id);
            $query=$this->db->get('apartments');
            $total=$query->row()->saled_in;
            if($total && $result){
                return $total - $result;
            }else{
                return false;
            }
        }
       
       
    }
    
    /* 
     * Fetch payment data from the database 
     * @param where returns 
     */ 


}