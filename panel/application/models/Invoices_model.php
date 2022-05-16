<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_model extends CI_Model{
    
 public function __construct() { 
        $this->table_name   = 'invoices'; 
    } 

public function add($data){

    if($this->db->insert($this->table_name, $data)){

    return $this->db->insert_id();

    }else{

    return false;

    }
}

public function get_data($where=false){
    $user = $this->auth_model->get_logged_user();
    if($where){
         $this->db->where($where);
    }
    if($user->role == 'worker'){
        $this->db->where(['apartment_payments.user_id' => $user->contractor_id]);
    }elseif($user->role == 'client'){
        $this->db->where(['apartment_payments.client_id' => $user->id]);
    }
    else{
        $this->db->where(['apartment_payments.user_id' => $user->id]);   
    }
    $this->db->join('users', 'apartment_payments.client_id = users.id');
    $this->db->join('apartments', 'apartment_payments.apartment_id = apartments.id');
    $this->db->select('apartment_payments.*,users.email,users.avatar,users.role, apartments.title');
    $this->db->order_by('apartment_payments.id', 'DESC');
    $result=$this->db->get('apartment_payments')->result();
     if($user->role == 'worker'){
        $id = array();
        $results = array();
        $apartments = $this->apartment_model->allApartments();
        foreach($apartments as $apartment){
            $ids[] = $apartment->id;
        }
        
        $id = $ids;
        foreach($result as $res){
            if(in_array($res->apartment_id, $id)){
                $results[] = $res;
            }
        }
         return $results;
    }else{
         return $result;
    }
   

}

public function get_invoices_data_by_id($id){

$this->db->join('users', 'invoices.user_id = users.id');
$this->db->select('invoices.*,users.username, users.email,users.avatar,users.role');
$this->db->where('invoices.id',$id);
$result=$this->db->get('invoices')->row();

return $result;

}



public function count($where=false){
   
    if($where){
        $this->db->where($where);
    }

    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results($this->table_name);
    return $result;
}



    public function get_data_row_by_id($id){

    $this->db->join('users', 'invoices.user_id = users.id');
    $this->db->join('membership', 'invoices.pid = membership.id');
    $this->db->select('invoices.*,membership.name as memb_name,users.username, users.email,users.avatar,users.role');    
    $this->db->where('invoices.id',$id);
    $query=$this->db->get($this->table_name)->row();
      
        return $query;
    }

    public function delete($id){

    $this->db->where('id',$id);
   
    return $this->db->delete($this->table_name);
   
    }

    public function get_data_membership(){

        $this->db->order_by('id','DESC');
        $query = $this->db->get('membership');
        return $query->result();

    }

   public function get_table_data_by_where_array($table,$where=false,$order='DESC'){

        if($where){
             $this->db->where($where);
        }

        $this->db->order_by('id',$order);
        $query = $this->db->get($table);
        return $query->result();

    }


 public function get_data_obj($order='asc'){
        $this->db->where('status','1');
        $this->db->order_by('id',$order);
        $query = $this->db->get($this->table_name);
        return $query->result();

}

    public function getRows($id = ''){ 
        $this->db->select('*'); 
        $this->db->from($this->table_name); 
        $this->db->where('status', '1'); 
        if($id){ 
            $this->db->where('id', $id); 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        }else{ 
            $this->db->order_by('id', 'asc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    } 

 public function update($id,$data){
        $this->db->where('id',$id);
        return $this->db->update($this->table_name, $data);
}



}