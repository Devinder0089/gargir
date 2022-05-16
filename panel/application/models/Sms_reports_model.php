<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_reports_model extends CI_Model {
	
   public function __construct() { 
        $this->table   = 'sms_reports'; 
    } 
	
public function input_values(){

	$user_id=($this->input->post('user_id'))?$this->input->post('user_id'):'0';
	$parent=($this->input->post('parent'))?$this->input->post('parent'):'0';
	$type=($this->input->post('type'))?$this->input->post('type'):'sms-default';

	$data = array(
	'user_id' =>$user_id,
	'name' => $this->input->post('name'),
	'type' => $this->input->post('type'),
	'content' => $this->input->post('content'), 
	'parent' => $this->input->post('parent'), 
	);
	return $data;
}
	 	
public function add($data=false){
	if(empty($data)){
	$data=$this->input_values();
	}
	
	if($this->db->insert($this->table, $data)){
	return $this->db->insert_id();
	}else{
	return false;
	}
}
	
public function count($where=false){
   
    if($where){
     $this->db->where($where);
    }

    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results($this->table);
    return $result;
}


	public function get_recent_dat(){
	$this->db->order_by('id', 'DESC');
	$query = $this->db->get($this->table);
	return $query->result();
	}
	
	
public function get_data_by_id($id){

	$this->db->where('id',$id);
	$this->db->where('status','1');
	$query = $this->db->get($this->table);
	$result = $query->row();
	return $result;
}

public function get_data_row_by_id($id){

	$this->db->where('id',$id);
	$this->db->where('status','1');
	$query = $this->db->get($this->table);
	$result = $query->row();
	return $result;
}

public function get_data($order='DESC'){
			
	$this->db->order_by('id',$order);
	$query = $this->db->get($this->table);
	$result = $query->result();
	return $result;
}

public function update($id,$data){

    $this->db->where('id',$id);
    return $this->db->update($this->table, $data);
 }

 public function delete($id){

    $this->db->where('id',$id);
    return $this->db->delete($this->table);
   
}
 public function get_table_data_by_where_array($table,$where=false,$order='DESC'){

	if($where){
	$this->db->where($where);
	}

	$this->db->order_by('id',$order);
	$query = $this->db->get($table);
	return $query->result();

}

public function getRows($id=''){ 

	if($id){ 
	$this->db->where('id', $id); 
	}else{ 
	$this->db->order_by('id', 'asc'); 
	} 

	$query=$this->db->get($this->table); 
	$result=$query->result_array(); 

	return $result; 
} 


}