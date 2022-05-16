<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_service_model extends CI_Model{

    //input values
    public function input_values(){
        $data = array(
            'name' => $this->input->post('name'),
            );
        return $data;
    }


  
public function add($data=[]){

    $data=$this->input_values();
    $data["slug"]=str_slug($data["name"]);
  
    return $this->db->insert('membership_service', $data);
}

 public function update($data,$id){

        $this->db->where('id',$id);

        $data=$this->input_values();

        $data["slug"] = str_slug($data["name"]);
        return $this->db->update('membership_service', $data);
    }


    public function get_membership_service_data(){

        $data=$this->get_table_data_by_where_array('membership_service');
        return $data;
    }

    public function get_membership_service_data_by_all($allid){
        $explod=explode(',',$allid);

        if(empty($explod[0])){
            unset($explod[0]);
        }

        $query =$this->db->where_in('id',$explod)->get('membership_service')->result();
        return $query;
    }


    public function membership_count(){
    $this->db->where('status','1');
    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results('membership_service');
    return $result;
    }

    public function get_data_row_by_id($id){

        $query =$this->db->where('id',$id)->get('membership_service')->row();
      
        return $query;
    }

    public function get_table_data_row_by_where($table_name,$where){

        $query =$this->db->where($where)->get($table_name)->row();
      
        return $query;
    }


    public function get_data_by_where_in($array){
        $query =$this->db->where_in('id',$array)->get('membership_service')->result();
        return $query;
    }

    public function delete($id){

    $this->db->where('id',$id);
    return $this->db->delete('membership_service');
   
    }

    public function get_table_data_by_where_array($table,$where=false,$order='DESC'){

        if($where){
             $this->db->where($where);
        }

        $this->db->order_by('id',$order);
        $query = $this->db->get($table);
        return $query->result();

    }

}