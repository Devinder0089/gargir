<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model{

     var $dir_path="";

    public function __construct(){
        parent::__construct();

    $this->dir_path=dirname(dirname(__dir__));

    }

public function get_data_by_id($id){

    $this->db->where('id',$id);
    return $this->db->get('users')->row();

}

    public function index(){
        $result=$this->get_data_table_by_where('users',['role'=>'customer']);
       
        return $result;
    }  

    public function get_pending_customer(){
        $result=$this->get_data_table_by_where('users',['role'=>'customer','membership_status'=>'0']);
       
        return $result;
    }

   public function get_active_customer(){
        $result=$this->get_data_table_by_where('users',['role'=>'customer','membership_status'=>'1']);
       
        return $result;
    }

  public function get_unban_customer(){
        $result=$this->get_data_table_by_where('users',['role'=>'customer','status'=>'1']);
       
        return $result;
    }

  public function get_ban_customer(){
        $result=$this->get_data_table_by_where('users',['role'=>'customer','status'=>'0']);
       
        return $result;
    }

    public function get_data_table_by_where($table,$where=false,$order_by='DESC'){

        if($where){
           $this->db->where($where);
        } 

        $this->db->order_by('id',$order_by);
        $query = $this->db->get($table);
        return $query->result();
    }


 public function get_pending_customers_count(){

        $this->db->where('membership_status','0');
        $this->db->where('role', "customer");
        $this->db->order_by('id', 'DESC');
        $result = $this->db->count_all_results('users');
        return $result;

}
 public function get_active_customers_count(){

        $this->db->where('membership_status','1');
        $this->db->where('role', "customer");
        $this->db->order_by('id', 'DESC');
        $result = $this->db->count_all_results('users');
        return $result;

}

 public function get_ban_customers_count(){

        $this->db->where('status','0');
        $this->db->where('role', "customer");
        $this->db->order_by('id', 'DESC');
        $result = $this->db->count_all_results('users');
        return $result;

}


public function get_unban_customers_count(){

        $this->db->where('status','1');
        $this->db->where('role', "customer");
        $this->db->order_by('id', 'DESC');
        $result = $this->db->count_all_results('users');
        return $result;

}

public function get_last_users(){
    $this->db->limit(7);
    $this->db->order_by('users.id', 'DESC');
    $query = $this->db->get('users');
    return $query->result();
}

public function delete($id){
    $this->db->where('id',$id);
    $result=$this->db->delete('users');
    return $result;
}

   
}