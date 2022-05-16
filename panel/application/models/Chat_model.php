<?php
class Chat_model extends CI_Model
{

 function Fetch_notification_data($receiver_id)
 {
  $this->db->where('parent_id', $receiver_id);
  $this->db->where('chat_request_status', 'Pending');
  return $this->db->get('chat_request');
 }


 function Update_chat_request($chat_request_id, $data)
 {
  $this->db->where('chat_request_id', $chat_request_id);
  $this->db->update('chat_request', $data);
 }

 function Fetch_chat_user_data($user)
 {
    $this->db->where("id !=",$user->id);
    if($user->role == "contractor"){
        $this->db->where('contractor_id' ,$user->id);
        $this->db->or_where('id',1);
    }
    if($user->role == "worker"){
        $this->db->where('contractor_id',$user->contractor_id);
        $this->db->or_where('id',$user->contractor_id);
        $this->db->or_where('id',1);
    }
   
    if($user->role == "client"){
        $this->db->where('role' != 'client');
        $this->db->where('contractor_id' ,$user->contractor_id);
    }
    $query = $this->db->get('users');
    return $query->result();
 }

 function Insert_chat_message($data)
 {
  $this->db->insert('messages', $data);
 }

 function Update_chat_message_status($user_id)
 {
  $data = array(
   'status'  => 1,
   'noti_play'=> 1
  );
  $this->db->where('parent_id', $user_id);
  $this->db->where('status', 0);
  $this->db->update('messages', $data);
 }

 function Fetch_chat_data($sender_id, $receiver_id)
 {
  $this->db->where('(user_id = "'.$sender_id.'" OR user_id = "'.$receiver_id.'")');
  $this->db->where('(parent_id = "'.$receiver_id.'" OR parent_id = "'.$sender_id.'")');
  $this->db->order_by('id', 'ASC');
  return $this->db->get('messages');
 }

 function Count_chat_notification($sender_id, $receiver_id)
 {
  $this->db->where('user_id', $sender_id);
  $this->db->where('parent_id', $receiver_id);
  $this->db->where('status', 0);
  $query = $this->db->get('messages');
  return $query->num_rows();
 }

 function Update_login_data($user)
 {
  $data = array(
   'last_activity'  => date('Y-m-d H:i:s'),
   'is_type'   => $this->input->post('is_type'),
   'receiver_user_id' => $this->input->post('receiver_id')
  );
  $this->db->where('login_data_id', $this->session->userdata('login_id'));
  $this->db->update('login_data', $data);
 }

 function User_last_activity($user_id)
 {
  $this->db->where('user_id', $user_id);
  $this->db->order_by('login_data_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('login_data');
  foreach($query->result() as $row)
  {
   return $row->last_activity;
  }
 }

 function Check_type_notification($sender_id, $receiver_id, $current_timestamp)
 {
  $this->db->where('receiver_user_id', $receiver_id);
  $this->db->where('user_id', $sender_id);
  $this->db->where('last_activity >', $current_timestamp);
  $this->db->order_by('login_data_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('login_data');
  foreach($query->result() as $row)
  {
   return $row->is_type;
  }
 }
 
 function total_Count_chat_notification($receiver_id)
 {
  $this->db->where('parent_id', $receiver_id);
  $this->db->where('status', 0);
  $query = $this->db->get('messages');
  return $query->num_rows();
 }
 
  function total_Count_chat_notifications($receiver_id)
 {
  $this->db->where('parent_id', $receiver_id);
  $this->db->where('noti_play', 0);
  $query = $this->db->get('messages');
  return $query->num_rows();
 }
 
 function message_update($user, $data){
     $this->db->where('parent_id',$user);
     $this->db->where('noti_play',0);
     $this->db->update('messages', $data);
 }
}
?>
