<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model
{
	
	
		 
	 public  function __construct() { 
        $this->transTable = 'payments'; 
    } 


    /* 
     * Fetch payment data from the database 
     * @param id returns 
     */ 
    public function get_payment_by_id($id){ 
       
        $result=$this->db->where('id', $id)->get($this->transTable)->row(); 
        return  $result;
    } 

    /* 
     * Fetch payment data from the database 
     * @param where returns 
     */ 
    public function get_payment_by_where($where){ 
       
        $result=$this->db->where($where)->get($this->transTable)->row(); 
        return  $result;

    } 



      /* 
     * Fetch payment data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 
    public function getPayment($where=false){ 

        $this->db->select('*'); 

        if($where){ 
        $this->db->where($where); 
        } 
         
        $result=$this->db->get($this->transTable)->row_array(); 

        return $result; 
    } 


    public function count($where=false){
         if($where){
        $this->db->where($where);
    }

        $this->db->order_by('id', 'DESC');
        $result = $this->db->count_all_results($this->transTable);
        return $result;
    }

    /* 
     * Insert payment data in the database 
     * @param data array 
     */ 
    public function insertTransaction($data){ 

        $insert=$this->db->insert($this->transTable,$data);

        return $this->db->insert_id();; 
    } 
     
    public function get_table_data_by_where_array($table,$where=false,$order='DESC'){

        if($where){
             $this->db->where($where);
        }

        $this->db->order_by('id',$order);
        $query = $this->db->get($table);
        return $query->result();

    }


     public function getRows($id = ''){ 
        $this->db->select('*'); 
        $this->db->from($this->transTable); 
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

		
    /* 
     * Insert payment data in the database 
     * @param data array 
     */ 
    public function Insert($data){ 

        $insert=$this->db->insert($this->transTable,$data);

        return $this->db->insert_id();; 
    } 


     public function update($id,$data){

        $this->db->where('id',$id);
        return $this->db->update($this->transTable, $data);
    }


}