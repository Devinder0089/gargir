<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_model extends CI_Model{

   public function __construct() { 
        $this->proTable   = 'membership'; 
    } 

    //input values
    public function input_values(){
        $data = array(
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'content' => $this->input->post('content'), 
            'validity_option' => $this->input->post('validity_option'), 
            'plan_validity' => $this->input->post('plan_validity'), 
            'price' => $this->input->post('price'), 
            'discount' => $this->input->post('discount'), 
            );
        return $data;
    }


public function add($data=[]){

    $data=$this->input_values();
    $data["slug"] = str_slug($data["name"]);

    $membership_service=$this->input->post('membership_service');

    if(is_array($membership_service) && !empty($membership_service[0])){
       $data['membership_service']=implode(',',$membership_service);
    }

        if($this->db->insert($this->proTable, $data)){

        return $this->db->insert_id();
        
        }else{
            
        return false;
        
        }


}

 public function update($id,$datas=false){

        $this->db->where('id',$id);

        $data=$this->input_values();

        $data["slug"] = str_slug($data["name"]);
            $membership_service=$this->input->post('membership_service');
        if(is_array($membership_service) && !empty($membership_service[0])){
       $data['membership_service']=implode(',',$membership_service);
    }

        return $this->db->update($this->proTable, $data);
    }


    public function get_membership_data(){

        $data=$this->get_table_data_by_where_array($this->proTable);
        return $data;
    }


    public function user_memebership($id='0'){

       $data=$this->get_table_data_by_where_array($this->proTable);
        return  $data;
    }


    
  public function get_membership_data_by_id(){

        $data=$this->get_table_data_by_where_array($this->proTable);
        return $data;
    }


public function membership_count(){
    $this->db->where('status','1');
    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results($this->proTable);
    return $result;
}


public function count($where=false){
   
    if($where){
        $this->db->where($where);
    }

    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results($this->proTable);
    return $result;
}

public function user_membership_count(){
    
    $this->db->where('status','1');
    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results('finance');
    return $result;
}

    public function get_data_row_by_id($id){

        $query =$this->db->where('id',$id)->get($this->proTable)->row();
      
        return $query;
    }

    public function delete($id){

    $this->db->where('id',$id);
    return $this->db->delete($this->proTable);
   
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
        $query = $this->db->get('membership_service');
        return $query->result();

}

    public function getRows($id = ''){ 
        $this->db->select('*'); 
        $this->db->from($this->proTable); 
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


}