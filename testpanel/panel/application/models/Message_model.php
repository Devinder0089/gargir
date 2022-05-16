<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model
{

    //input values
    public function input_values(){
        $data = array(
            'name' => $this->input->post('name', true),
            'user_id' => $this->input->post('user_id', true),
            'content' => $this->input->post('content', true),
            'parent_id' => $this->input->post('parent_id', true)
        );
        return $data;
    }

    //add  message
    public function add_message(){
        $data = $this->input_values();
        return $this->db->insert('messages', $data);
    }

    /*add_message_data*/
    public function add_message_data($data){

        return $this->db->insert('messages',$data);
    }

    //get contact messages
    public function get_messages_data(){

        $query = $this->db->get('messages');
        return $query->result();
    }

    //get contact message
    public function get_message_by_where($where){

        $this->db->where($where);
        $query = $this->db->get('messages');
        return $query->result();

    } 

    public function get_message_count_where($where=false){
        
        if($where){
        $this->db->where($where);
        }
        
        $query = $this->db->get('messages');
        return $query->num_rows();
    }


     //get contact message
    public function get_message_join_by_where($where,$or_where=false){
        $this->db->select('messages.*,users.email');
        $this->db->from('messages');
        $this->db->where($where);
        if($or_where){
            $this->db->or_where($or_where);
        }

        $this->db->join('users','messages.user_id = users.id');

        $query = $this->db->get();
        return $query->result();

    
   
    
    }

    //get last contact messages
    public function get_last_messages()
    {
        $this->db->limit(5);
        $query = $this->db->get('messages');
        return $query->result();
    }

 //get last contact messages
    public function update_messages($where,$data){
        $this->db->where($where);
        return $this->db->update('messages', $data);
    }

    //delete contact message
    public function delete_message_by_id($id)
    {
        $contact = $this->get_contact_message($id);

        if (!empty($contact)) {
            $this->db->where('id', $id);
            return $this->db->delete('messages');
        }
        return false;
    }
}