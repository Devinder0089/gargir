<?php
/**
* create all api details.....
**

*  www.domain.com/webapi/app/top-header
**


*
*/ 

error_reporting(0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class Api extends MY_Controller{

var $status="error";
var $msg="No found data.";
var $data="No found data.";


public function index(){

	$type = $this->uri->segment(3);

	switch($type){

	case 'register':
	$this->data=$this->user_register();
	break;

	case 'contact_us':
	$this->data=$this->send_contact_us();
	break;	

	case 'testingdata':
	$this->data=$this->testingdata();
	break;

	case 'add_testingdata':
	$this->data=$this->add_testingdata();
	break;

	case 'is_login_update':
	$this->data=$this->is_login_update();
	break;

	case 'login':
	$this->data=$this->user_login_api();
	break;

	case 'logout':
	$this->data=$this->user_logout_api();
	break;


	case 'change-pass':
	$this->data=$this->user_change_password_api();
	break;

	case 'user-profile':
	$this->data=$this->user_profile_update();
	break;

	case 'memebership':
	$this->data=$this->get_memebership();
	break;

	case 'user_memebership_plan_activate':
	$this->data=$this->get_user_memebership_plan_activate();
	break;

	case 'social_media':
	$this->data=$this->Social_media();
	break;

	case 'footer_about':
	$this->data=$this->Fotter_about_us();
	break;

	case 'footer_contact':
	$this->data=$this->Fotter_contact();
	break;
	case 'whtsapp':
	$this->data=$this->Whtsapp();
	break;

	case 'header_menu':
	$this->data=$this->Get_header();
	break;	
	
	case 'footer_menu':
	$this->data=$this->Get_footer();
	break;

	case 'get_pages':
	$this->data=$this->Get_pages();
	break;
	case 'get_logo':
	$this->data=$this->get_logo();
	break;
} 


$set['status']=$this->status;
$set['msg']=$this->msg;
$set['data']=$this->data;
echo json_encode($set,JSON_ERROR_CTRL_CHAR);

}

public function get_logo(){
	
	$token_key=$this->input->get('token_key');
	
	if(empty($token_key)){
		$this->msg="token key can not empty.";
		return "token key can not empty.";
	}

	if($token_key !== 'ASXDMKXSKFS56SSAXKUEROS'){
		$this->msg="No match key.";
		return "No match key.";
	}

 $visual_settings=$this->db->get('visual_settings')->row();
 
 	if(empty($visual_settings)){
		$this->msg="no found data.";
		return "no found data.";
	}
		$setting_data_media=[
		'logo'=>$visual_settings->logo,
		'logo_footer'=>$visual_settings->logo_footer,
		'favicon'=>$visual_settings->favicon,
		];

	$this->msg="Fetch data done.";
	$this->status="success";
    return $setting_data_media;
}


public function Get_pages(){
	
$slug=$this->input->get('slug');

if(empty($slug)){
	$this->msg="slug name can not empty";
	return "slug name can not empty.";
}
	
 $pages=$this->db->where('slug',$slug)
 ->get('pages')->result();

 	if(empty($pages)){
		$this->msg="no found data.";
		return "no found data.";
	}
	
	$this->msg="Fetch data done.";
	$this->status="success";
    return $pages;
	
}

public function Get_header(){	

 $pages_data=$this->db->select('id,title,slug')
 ->where('visibility','1')
 ->where('location','main')
 ->get('pages')->result();


 	if(empty($pages_data)){
		$this->msg="no found data.";
		return "no found data.";
	}
	
	$this->msg="Fetch data done.";
	$this->status="success";
    return $pages_data;
	
}


public function Get_footer(){	

 $pages=$this->db->where('visibility','1')->where('location','footer')
 ->get('pages')->result();

 	if(empty($pages)){
		$this->msg="no found data.";
		return "no found data.";
	}
	
	$this->msg="Fetch data done.";
	$this->status="success";
    return $pages;
	
}

public function Whtsapp(){
	
	$token_key=$this->input->get('token_key');

	if(empty($token_key)){
		$this->msg="token key can not empty.";
		return "token key can not empty.";
	}

	if($token_key !== 'ASXDMKXSKFS56SSAXKUEROS'){
		$this->msg="No match key.";
		return "No match key.";
	}

 $setting=$this->db->get('settings')->row();
 
 	if(empty($setting)){
		$this->msg="no found data.";
		return "no found data.";
	}

	$setting_data_media=[
	'Whtsapp'=>"https://wa.me/".$setting->whatsapp_number."?text=".$setting->whatsapp_text.".",
	];

	$this->msg="Fetch data done.";
	$this->status="success";
    return $setting_data_media;
	
}
public function Fotter_contact(){
	
	$token_key=$this->input->get('token_key');

	if(empty($token_key)){
		$this->msg="token key can not empty.";
		return "token key can not empty.";
	}

	if($token_key !== '6SSAXKUEROS'){
		$this->msg="No match key.";
		return "No match key.";
	}

 $setting=$this->db->get('settings')->row();
 
 	if(empty($setting)){
		$this->msg="no found data.";
		return "no found data.";
	}
		$setting_data_media=[
		'contact_address'=>$setting->contact_address,
		'contact_email'=>$setting->contact_email,
		'contact_phone'=>$setting->contact_phone,
		];

	$this->msg="Fetch data done.";
	$this->status="success";
    return $setting_data_media;
	
}

public function Fotter_about_us(){
	
	$token_key=$this->input->get('token_key');

	if(empty($token_key)){
		$this->msg="token key can not empty.";
		return "token key can not empty.";
	}

	if($token_key !== 'ASXDMKXSKFS56SSAXKUEROS'){
		$this->msg="No match key.";
		return "No match key.";
	}

 $setting=$this->db->get('settings')->row();
 
 	if(empty($setting)){
		$this->msg="no found data.";
		return "no found data.";
	}
		$setting_data_media=[
		'about_footer'=>$setting->about_footer,
		];

	$this->msg="Fetch data done.";
	$this->status="success";
    return $setting_data_media;
	
}

public function Social_media(){
	
	$token_key=$this->input->get('token_key');

	if(empty($token_key)){
		$this->msg="token key can not empty.";
		return "token key can not empty.";
	}

	if($token_key !== 'ASXDMKXSKFS56SSAXKUEROS'){
		$this->msg="No match key.";
		return "No match key.";
	}

 $settg=$this->db->get('settings')->row();
 
 	if(empty($settg)){
		$this->msg="no found data.";
		return "no found data.";
	}
		$setting_data_midia=[
		'facebook_url'=>$settg->facebook_url,
		'twitter_url'=>$settg->twitter_url,
		'google_url'=>$settg->google_url,
		'instagram_url'=>$settg->instagram_url,
		'pinterest_url'=>$settg->pinterest_url,
		'linkedin_url'=>$settg->linkedin_url,
		'youtube_url'=>$settg->youtube_url,
		'vk_url'=>$settg->vk_url,
		];

	$this->msg="Fetch data done.";
	$this->status="success";
    return $setting_data_midia;
	
}


public function send_contact_us(){
	$email=$this->input->post('email');
	$subject=$this->input->post('subject');
	$content=$this->input->post('content');

	if(empty($email)){
	$this->msg="can not empty email";
	return "can not empty email";
	}

	if(!$this->email_validation($email)){
	$this->msg="Please enter valid Email.";
	return "Please enter valid Email.";
	}
	

	if(empty($subject)){
	$this->msg="can not empty subject";
	return "can not empty subject";
	}	
	if(empty($content)){
	$this->msg="can not empty content";
	return "can not empty content";
	}
	
	
  /*********** start sent mail and update message table *******************/
    $html='<div class="nadlanpromsg">';
    $html.="<h1>Hi Dear</h1></br>";
    $html.='<p>'.$content.'</p>';
    $html.='</div>';

 


    if($this->email_model->send_email($email,$subject,$html)){
      
   	$this->status=1;
	$this->msg="Send message success";
	return "Send message success";

    }else{

       	$this->msg="Send message failed";
		return "Send message failed";
    }
  
    /*********** end sent mail and update message table *******************/

	
}

public function email_validation($str) {
    return (!preg_match(
"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str))
        ? FALSE : TRUE;
}

public function testingdata(){
	$action=$this->input->get('action');
	if(empty($action)){
		$this->msg="action can not empty.";
		return "action can not empty.";
	}


	if($action !== 'ASXDMKXSKFS56SSAXKUEROS'){
		$this->msg="No match key.";
		return "No match key.";
	}

 $datsdfs=$this->db->get('testdata')->result();
 	if(empty($datsdfs)){
		$this->msg="no found data.";
		return "no found data.";
	}




	$this->msg="Fetch data done.";
	$this->status="success";
    return $datsdfs;
   
}

public function add_testingdata(){
	$action=$this->input->get('action');
	$name=$this->input->get('name');
	$content=$this->input->get('content');
	if(empty($action)){
		$this->msg="action can not empty.";
		return "action can not empty.";
	}

	if($action !== 'ASXDMKXSKFS56SSAXKUEROS'){
		$this->msg="No match key.";
		return "No match key.";
	}

	if(empty($name)){
		$this->msg="name can not empty.";
		return "name can not empty.";
	}
	
if(empty($content)){
		$this->msg="content can not empty.";
		return "content can not empty.";
	}


$dateget=[
	'name'=>$name .' heals',
	'content'=>$content ." Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a",
];

 $datsdfs= $this->db->insert('testdata', $dateget);  
 	if(empty($datsdfs)){
		$this->msg="add data faild.";
		return "add data faild.";
	}

	$this->msg="add data done.";
	$this->status="success";
    return $datsdfs;
   
}

public function is_login_update(){
	$user=$this->auth_model->get_logged_user();
	
	if(empty($user)){
		$this->msg="No found data.";
		return "No found data.";
	}

	unset($user->password);

	$this->msg="Fetch data done.";
	$this->status="Success";
    return $user;
   
}


// user register api 

public function user_register(){
$time=time();

$username=$this->input->post('username');
$phone =($this->input->post('phone'))?$this->input->post('phone'):"0000000000";
$password =($this->input->post('password'))?$this->input->post('password'):"";
$email =($this->input->post('email'))?$this->input->post('email'):"";
$gender = ($this->input->post('gender'))?$this->input->post('gender'):"male";
$birthday =($this->input->post('birthday'))?$this->input->post('birthday'):"";
$first_name =($this->input->post('first_name'))?$this->input->post('first_name'):"";
$last_name =($this->input->post('last_name'))?$this->input->post('last_name'):"";
$address =($this->input->post('address'))?$this->input->post('address'):"";
$agree_policy =($this->input->post('agree_policy'))?$this->input->post('agree_policy'):"0";


if(empty($username)){
	$this->msg="username can not empty.";
	return "username can not empty."; 
}

if(empty($email)){
	$this->msg="email can not empty.";
	return "email can not empty."; 
}

if(empty($password)){
	$this->msg="password can not empty.";
	return "password can not empty."; 
}

if(empty($first_name)){
	$this->msg="first name can not empty.";
	return "first name can not empty."; 
}

if(empty($last_name)){
	$this->msg="last name  can not empty.";
	return "last name can not empty."; 
}

if(empty($agree_policy)){
	$this->msg="terms and conditions can not empty.";
	return " terms and conditions  can not empty."; 
}

	$user=$this->Api_author_model->get_user_by_email($email);
	if(!empty($user)){
		$this->msg="User is already exits.";
		return "User is already exits.";
	}

	$newpassword=$this->bcrypt->hash_password($password);

	$data['email']=$email;
	$data['username']=$username;
	$data['password']=$newpassword;
	$data['last_name']=$last_name;
	$data['first_name']=$first_name;
	$data['gender']=$gender;
	$data['birthday']=$birthday;
	$data['address']=$address;
	$data['phone']=$phone;
	
	if(isset($_FILES['file']) && $_FILES['file']){
		$data['avatar'] = "";
	}




	$data['agree_policy']=$agree_policy;
	$data['user_type'] = "registered";
	$data["slug"] = str_slug($data["username"] . "-" . uniqid());

	$users_register=$this->Api_login_model->register('users',$data);

	if(empty($users_register)){
	$this->msg="Registration failed.";
	return "Registration failed.";
	}

	$this->status="success";
	$this->msg="Registration successfully.";

	return $users_register;


}

//user login api 
public function user_logout_api(){
	$time=time();

	if(isset($_SESSION['id'])){
	$update_data = array(
	'login_is' =>'0',
	'time_temp' => $time,
	'time_tempdura' =>$time);

	$data =$this->update_user_data_by_uid($user_id,$update_data);

	}
	

	$this->session->unset_userdata('id');
	$this->session->unset_userdata('email');
	$this->session->unset_userdata('role');
	$this->session->unset_userdata('logged_in');
	$this->session->unset_userdata('app_key');

	
	/* destroy the session*/
	session_destroy();

	$this->msg="login is logout.";
	$this->status="Success";
	return "login is logout.";

}

//user login api 
public function user_login_api(){

	$time=time();
	$email=$this->input->post('email');
	$password = $this->input->post('password');

	if(empty($email)){
	$this->msg="email can not empty.";
	return "email can not empty.";
	}

	if(empty($password)){
	$this->msg="password can not empty.";
	return "password can not empty.";
	}

	$user=$this->Api_author_model->get_user_by_email($email);
	if(empty($user)){
	$this->msg="no found data.";
	return $user_login_data;
	}

	$check_result=$this->bcrypt->check_password($password, $user->password);
	if(empty($check_result)){
		$this->msg="Invalid password.";
		return $user_login_data;
	}

	unset($user->password);

		//set user data
		$user_data = array(
		'id' => $user->id,
		'username' => $user->username,
		'email' => $user->email,
		'role' => $user->role,
		'logged_in' => true,
		'app_key' => $this->config->item('app_key'),
		);

		$this->session->set_userdata($user_data);

		$update_data = array(
		'login_is' =>'1',
		'time_temp' => $time,
		'time_tempdura' =>$time);

		$this->update_user_data_by_uid($user->id,$update_data);

	$this->msg="login is done.";
	$this->status="success";
	return $user;
}

public function get_memebership(){
	$user_id=($this->input->get('user_id'))?$this->input->get('user_id'):'0';
	$membership_data =$this->membership_model->get_membership_data();
	if(empty($membership_data)){
		$this->msg="no found data.";
		return '"no found data.';
	}


	foreach($membership_data as $vl) {

	$vl->package_service_data=$membership_service=get_membership_service_by_allid($vl->membership_service);
	$membershipdata[]=$vl;
	}

	$this->msg="fatch data membership.";
	$this->status="success";
	return $membershipdata;
}


public function get_user_memebership_plan_activate(){

	$user_id=($this->input->get('user_id'))?$this->input->get('user_id'):'0';
	$membership_data =$this->membership_model->get_membership_data();
	if(empty($membership_data)){
		$this->msg="no found data.";
		return '"no found data.';
	}

	$this->msg="fatch data membership.";
	$this->status="success";
	return $membership_data;
}

//user user_change_password_api api 

function user_change_password_api(){

	$id = $this->security->xss_clean($this->input->get('id'));
	$old_pass = $this->security->xss_clean($this->input->post('old_pass'));
	$new_pass = $this->security->xss_clean($this->input->post('new_pass'));
	$email = $this->security->xss_clean($this->input->post('email'));
	$check_id = $this->uri->segment(4);

	if(empty($email)){
		$this->msg="do not empty email.";
		return "do not empty email.";
	}


	if(empty($new_pass)){
		$this->msg="do not empty new pass.";
		return "do not empty new pass.";
	}


	if(empty($old_pass)){
		$this->msg="do not empty ol pass";
		return "do not empty ol pass.";
	}



	$user = $this->Api_author_model->get_user_by_email($email);
	if(empty($user)){
		$this->msg="no found data user";
		return "no found data user";
	}


	$check_user_pass= $this->bcrypt->check_password($old_pass, $user->password);
	
	if(empty($check_user_pass)){
	$this->msg="no match pass";
	return "no match pass";
	}

	

	$user_change_data = $this->Api_login_model->change_password_by_user($email,$old_pass,$new_pass);

	if(empty($user_change_data)){
		$this->msg="Not match you details...";
		return "Not match you details...";
	}


	$this->msg="done.";
	$this->status=1;
	return $user_change_data;

	
}




//user profile update 

public function user_profile_update(){

$mimeExt = array();
$mimeExt['image/jpeg'] ='.jpg';
$mimeExt['image/pjpeg'] ='.jpg';
$mimeExt['image/bmp'] ='.bmp';
$mimeExt['image/gif'] ='.gif';
$mimeExt['image/x-icon'] ='.ico';
$mimeExt['image/png'] ='.png'; 

$get_id = $this->input->post('email_name');
$get_name = $this->input->post('user_name');
$image_url = $_FILES['image_name']['tmp_name'];
$image_type = $mimeExt[$_FILES["image_name"]["type"]];
$chek_id = $this->uri->segment(4);




if($chek_id){

echo json_encode(['error_json'=>'Not found page...','status'=>0]);

}else{

// user_details check start

$user_details = $this->Api_author_model->get_user_by_email($get_id);

if($user_details){

if($get_id && $get_name && $image_url){

$data = $this->Api_login_model->user_update_name_image($get_id,$get_name,$image_url,$image_type);

if($data){
	
echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);
	
}else{ echo json_encode(['error_json'=>'Invalid user update...','status'=>0]); }
	
}else{

if($get_id && $get_name){

$data = $this->Api_login_model->user_update_profile($get_id,$get_name);

if($data){
	
	echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);
	
}else{ echo json_encode(['error_json'=>'Invalid user update...','status'=>0]); }

}else{ echo json_encode(['error_json'=>'Invalid update ...','status'=>0]); 	} 

}

}else{ 	echo json_encode(['error_json'=>'Not match user details...','status'=>0]); } 

// user_details check end 
}  

}


public function update_user_data_by_uid($id,$data){
	$this->db->where('id', $id);
return $this->db->update('users', $data);
}



} 



?>