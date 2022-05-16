<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_model extends CI_Model{
    
 public function __construct() { 
        $this->table_name   = 'permission'; 
    } 

public function add($data){

    if($this->db->insert($this->table_name, $data)){

    return $this->db->insert_id();

    }else{

    return false;

    }
}

public function permission_by_meta_key($meta_key){
    $user=$this->auth_model->get_logged_user();
    $user_id=($user)?$user->id:'0';

    $mata=$this->get_data_by_mata($meta_key,$user_id);
    if($mata && $mata->meta_value == '1'){
        return true;
    }else{
        return false;
    }
}

public function get_data(){

    $this->db->join('users', 'permission.user_id = users.id');
    $this->db->select('permission.*,users.username, users.email,users.avatar,users.role');
    $this->db->group_by('permission.user_id');
    $result=$this->db->get('permission')->result();

    return $result;

}

public function get_data_row_by_where($where){
    $this->db->where($where);
    $result=$this->db->get('permission')->row();
    return $result;
}

public function get_data_by_mata($mata_key,$user_id){
   
    $this->db->where('user_id',$user_id);
    $this->db->where('mata_key',$mata_key);
    $result=$this->db->get('permission')->row();
    return $result;
}

public function get_data_by_mata_key_and_user_id($mata_key,$user_id){
   
    $this->db->where('user_id',$user_id);
    $this->db->where('mata_key',$mata_key);
    $result=$this->db->get('permission')->row();
    return $result;
}


public function get_data_by_id($id){
   
    $this->db->where('id',$id);
    $result=$this->db->get('permission')->row();
    return $result;
}

public function get_data_by_user_id($user_id){
   
    $this->db->where('user_id',$user_id);
    $result=$this->db->get('permission')->result();
    return $result;
}


public function get_all_users(){
    $this->db->where('role', 'contractor');
    $this->db->or_where('role', 'sub-admin');
    $this->db->order_by('id','DESC');
    return $this->db->get('users')->result();
}


public function delete_by_uid($uid){

    $this->db->where('user_id',$uid);
    return $this->db->delete('permission');
}

public function delete($id){

    $this->db->where('id',$id);
    return $this->db->delete('permission');
}


   public function get_table_data_by_where_array($table,$where=false,$order='DESC'){

        if($where){
             $this->db->where($where);
        }

        $this->db->order_by('id',$order);
        $query = $this->db->get($table);
        return $query->result();

    }


 public function update($id,$data){
        $this->db->where('id',$id);
        return $this->db->update($this->table_name, $data);
}



}