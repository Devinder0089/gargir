<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller {
    var $dir_path="";
    public function __construct(){
        parent::__construct();

        if(!auth_check()){
            redirect('login');
        }
         $this->dir_path=dirname(dirname(__dir__));
    }

public function index()
 {
   $data['user']=$this->auth_model->get_logged_user();
   $data['title'] = 'Chat';
   $this->load->view('admin/includes/_header',$data);
   $this->load->view('admin/chat_view',$data);
   $this->load->view('admin/includes/_footer');
 }

 function load_notification()
 {
  sleep(2);
  if($this->input->post('action'))
  {
   $user = $this->auth_model->get_logged_user();
   $data = $this->chat_model->Fetch_notification_data($user->id);
   $output = array();
   if($data->num_rows() > 0)
   {
    foreach($data->result() as $row)
    {
     $userdata = $this->chat_model->Get_user_data($row->sender_id);

     $output[] = array(
      'user_id'  => $row->sender_id,
      'first_name' => $userdata['first_name'],
      'last_name'  => $userdata['last_name'],
      'profile_picture' => $userdata['profile_picture'],
      'chat_request_id' => $row->chat_request_id
     );
    }
   }
   echo json_encode($output);
  }
 }

 function load_chat_user()
 {
  sleep(2);
  if($this->input->post('action'))
  {
   $user=$this->auth_model->get_logged_user();
   $sender_id = $user->id;
   $receiver_id = '';
   $data = $this->chat_model->Fetch_chat_user_data($user);
//   if($data->num_rows() > 0)
//   {
//     foreach($data->result() as $row)
//     {
//      if($row->sender_id == $sender_id)
//      {
//       $receiver_id = $row->receiver_id;
//      }
//      else
//      {
//       $receiver_id = $row->sender_id;
//      }
//      $userdata = $this->chat_model->Get_user_data($receiver_id);
//      $output[] = array(
//       'receiver_id'  => $receiver_id,
//       'first_name'  => $userdata['first_name'],
//       'last_name'   => $userdata['last_name'],
//       'profile_picture' => $userdata['profile_picture']
//      );
//     }
//   }
   echo json_encode($data);
  }
 }

 function send_chat()
 {
  $user=$this->auth_model->get_logged_user();
  if($this->input->post('receiver_id'))
  {
   $time = time();
    if(!empty($_FILES['file']['name'])){
    $image_url = $_FILES['file']['tmp_name'];
    $image_explode =explode(".",$_FILES['file']['name']);
    $image_type= end($image_explode);
    $image_name=$time.".".$image_type;
    $img_upload =$this->dir_path.'/uploads/chat/'.$image_name;
    $img_upload_update ='uploads/chat/'.$image_name;
    $check=move_uploaded_file($image_url, $img_upload);
    $file=$img_upload_update;
    
    $data = array(
    'user_id'  => $user->id,
    'parent_id' => $this->input->post('receiver_id'),
    'file' => $file,
    'file_type' => $image_type,
    'status' => 0,
  );
    }else{
        $data = array(
        'user_id'  => $user->id,
        'parent_id' => $this->input->post('receiver_id'),
        'content' => $this->input->post('chat_message'),
        'status' => 0,
        );
    }
   $this->chat_model->Insert_chat_message($data);
   }
 }

 function load_chat_data()
 {
  if($this->input->post('receiver_id'))
  {
   $receiver_id = $this->input->post('receiver_id');
   $user=$this->auth_model->get_logged_user();
   $sender_id = $user->id;
  if($this->input->post('update_data') == 'yes')
  {
    $this->chat_model->Update_chat_message_status($sender_id);
  }
   $chat_data = $this->chat_model->Fetch_chat_data($sender_id, $receiver_id);
   $output = array();
   if($chat_data->num_rows() > 0)
   {
    foreach($chat_data->result() as $row)
    {
     $message_direction = '';
     if($row->user_id == $sender_id)
     {
      $message_direction = 'right';
     }
     else
     {
      $message_direction = 'left';
     }
     $date = date('D M Y H:i', strtotime($row->created));
     $output[] = array(
      'chat_messages_text' => $row->content,
      'chat_messages_datetime'=> $date,
      'message_direction'  => $message_direction,
      'file'               => $row->file,
      'file_type'          => $row->file_type
     );
    }
   }
   echo json_encode($output);
  }
 }

 function check_chat_notification()
 {
  if($this->input->post('user_id_array'))
  {
   $user=$this->auth_model->get_logged_user();
   $receiver_id = $user->id;

   $this->chat_model->Update_login_data($receiver_id);

   $user_id_array = explode(",", $this->input->post('user_id_array'));

   $output = array();

   foreach($user_id_array as $sender_id)
   {
    if($sender_id != '')
    {
     $status = "offline";
     $last_activity = $this->chat_model->User_last_activity($sender_id);

     $is_type = '';

     if($last_activity != '')
     {
      $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');

      $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

      if($last_activity > $current_timestamp)
      {
       $status = 'online';
       $is_type = $this->chat_model->Check_type_notification($sender_id, $receiver_id, $current_timestamp);
      }
     }

     $output[] = array(
      'user_id'  => $sender_id,
      'total_notification' => $this->chat_model->Count_chat_notification($sender_id, $receiver_id),
      'status'  => $status,
      'is_type'  => $is_type
     );
    }
   }
   echo json_encode($output);
  }
 }
 
  function total_check_chat_notification()
 {
 
   $user=$this->auth_model->get_logged_user();
   $data['total_notification'] = $this->chat_model->total_Count_chat_notification($user->id);
   $data['sound'] = $this->chat_model->total_Count_chat_notifications($user->id);
   echo json_encode($data);
 }
 
  function message_update()
 {
   $user=$this->auth_model->get_logged_user();
   $data = array(
       'noti_play' => 1,
       );
   $update = $this->chat_model->message_update($user->id, $data);
   echo 'oK';
 }
 
}
?>