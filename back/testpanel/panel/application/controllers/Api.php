<?php
/**
* create all api details.....
**

*  www.tallypost.com/webapi/app/top-header
**
* www.hos/webapi/app/homepage
**
*  www.tallypost.com/webapi/app/add_post_comment/$post_id/$user_id
*****
**www.tallypost.com/webapi/app/voting/$userid/$poll_id/$option add voting
**
*****
**www.tallypost.com/webapi/app/voting/$userid/$poll_id/ total voting
***
*  www.tallypost.com/webapi/app/post_comment/$post_id
*****
*  www.tallypost.com/webapi/app/post/

*
*/ 

error_reporting(0);


class Api extends MY_Controller{

var $status="error";
var $msg="No found data.";
var $data="No found data.";


function __construct()
{
parent::__construct();

$this->load->helper('cookie');
$this->load->library('bcrypt');
$this->load->model('Api_model');
$this->load->model('Api_reading_list_model');
$this->load->model('Api_video_model');
$this->load->model('Api_categories_model');
$this->load->model('Api_gallery_model');
$this->load->model('Api_tags_model');
$this->load->model('Api_login_model');
$this->load->model('Api_voting_model');
$this->load->model('Api_author_model');
$this->load->model('Api_widget_model');
$this->load->model('Api_comment_model');
$this->load->model('Api_post_model');
$this->load->model('Api_share_model');
}

function index(){

$type = $this->uri->segment(3);

switch($type){

case 'register':

$this->data=$this->user_register();

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


case 'homepage' :

$this->data=$this->home_page();

break;

case 'top-header' : 

$this->data=$this->menu_header();

break;

case 'video' :

$this->data=$this->create_videos_api();

break;

case 'gallery':

$this->data=$this->page_gallery();

break;

case 'tags_slug':

$this->data=$this->order_by_tag_slug();

break;

case 'post':

$this->data=$this->posts_by_id_get_posts();

break;

case 'add_post_comment':

$this->data=$this->add_post_comment();

break;


case 'post_comment':

$this->data=$this->get_post_comment();

break;

case 'user-profile':

$this->data=$this->user_profile_update();

break;

case 'memebership':

$this->data=$this->get_memebership();

break;

case 'reading-list':

$this->data=$this->get_user_id_by_reading_post();

break;

case 'add-reading-list':

$this->data=$this->api_add_reading_post();

break;

case 'add_like_comment':
$this->data=$this->Api_add_like_comment();
break;
} 

$set['status']=$this->status;
$set['msg']=$this->msg;
$set['data']=$this->data;
echo json_encode($set,JSON_ERROR_CTRL_CHAR);

}

// create api top header menu

public function page_slug($type){

$data =  $this->Api_model->get_page($type);

if($data){

echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not found page details...','status'=>0]); }
}

// create api top header menu

public function menu_header(){
$get_url = $this->uri->segment(3);
$check_url = $this->uri->segment(4);

if($check_url){ 

echo json_encode(['error_json'=>'Not found your details...','status'=>0]);

}else{

if($get_url == 'top-header'){

$data =  $this->Api_model->get_top_hearder_menu();

if($data){

echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not found top header details...','status'=>0]); }

}else{ echo json_encode(['error_json'=>'Not found top header details...','status'=>0]); } 
}
}

/**
* page by id get data home
*/

public function home_page(){

$get_url = $this->uri->segment(3);
$check_url = $this->uri->segment(4);

if($check_url){ 

echo json_encode(['error_json'=>'Not found your details...','status'=>0]);

}else{

if($get_url == 'homepage'){



$data['slider_featur'] = $this->Api_post_model->get_featured_slider_posts();
$data['breaking_news'] = $this->Api_post_model->get_breking_news();
$data['latest_post'] = $this->Api_post_model->get_last_post();

$check_widget_popular = $this->Api_widget_model->get_widgets_type('popular-posts'); 
$check_widget_recommended = $this->Api_widget_model->get_widgets_type('recommended-posts'); 
$check_widget_random_slider = $this->Api_widget_model->get_widgets_type('random-slider-posts'); 
$check_widget_featured_video = $this->Api_widget_model->get_widgets_type('featured-video'); 
$check_widget_tags = $this->Api_widget_model->get_widgets_type('tags'); 
$check_widget_poll = $this->Api_widget_model->get_widgets_type('poll'); 
$check_widget_custom = $this->Api_widget_model->get_widgets_type('custom'); 

if($check_widget_popular){
$data['popular_posts'] = $this->Api_post_model->get_popular_posts();
}else{

$data['popular_posts'] = '0';
}

if($check_widget_recommended){
$data['recommended_post'] = $this->Api_post_model->get_recommended_posts();
}else{

$data['recommended_post'] = '0';
}

if($check_widget_random_slider){
$data['random_post'] = $this->Api_post_model->get_random_post();
}else{

$data['random_post'] = '0';
}

if($check_widget_featured_video){
$data['recent_videos'] = $this->Api_post_model->get_video_post();
}else{

$data['recent_videos'] = '0';
}

if($check_widget_tags){
$data['tags_slug'] = $this->Api_tags_model->all_get_tags();
}else{

$data['tags_slug'] = '0';
}

if($check_widget_poll){
$data['vote_recent_post'] = $this->Api_voting_model->get_recent_vote_posts();
}else{

$data['vote_recent_post'] = '0';
}

if($check_widget_custom){

$data['custom_data'] = $check_widget_custom;
}else{

$data['custom_data'] = '0';
}				



if($data){



echo json_encode(['get_json_data'=>$data,'homes_tag'=>'homes','status'=>1],JSON_ERROR_CTRL_CHAR);



}else{ echo json_encode(['error_json'=>'Not found home details...','status'=>0]); }

}else{ echo json_encode(['error_json'=>'Not found home details...','status'=>0]); }
}
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

		//set user data
		$data = array(
		'id' => '1',
		'name' => 'Price packages',
		'class' =>'fa fa-suitcase',
		'iconclass' =>'fa fa-suitcase',
		'content' =>'Monthly 1 agent- 40 ILS',
		);

		

	$this->msg="login is done.";
	$this->status="success";
	return $data;
}

//user user_change_password_api api 

function user_change_password_api(){

	$id = $this->security->xss_clean($this->input->get('id'));
	$old_pass = $this->security->xss_clean($this->input->get('old_pass'));
	$new_pass = $this->security->xss_clean($this->input->get('new_pass'));
	$email = $this->security->xss_clean($this->input->get('email'));
	$check_id = $this->uri->segment(4);

$email ="admin@admin.com";
$old_pass ="admin@123";
	$data = array('password' => $this->bcrypt->hash_password($old_pass));


	$this->db->where('id',$id);
	$users =$this->db->update('users', $data);

	$user = $this->Api_author_model->get_user_by_email($email);

	$check_user_pass= $this->bcrypt->check_password($old_pass, $user->password);

var_dump($users,$check_user_pass,$user);
die;
	if(empty($email)){
	echo json_encode(['error_json'=>'do not empty email.','status'=>0]); 
	exit;
	}


	if(!empty($check_id)){
	echo json_encode(['error_json'=>'Invalid your details...','status'=>0]); 
	exit;
	}

	if(empty($new_pass)){
	echo json_encode(['error_json'=>'do not empty new pass.','status'=>0]); 
	exit;
	}

	
	if(empty($old_pass)){
	echo json_encode(['error_json'=>'do not empty ol pass.','status'=>0]); 
	exit;
	}

	$user = $this->Api_author_model->get_user_by_email($email);

	if(empty($user)){
	echo json_encode(['error_json'=>'no found data user.','status'=>0]); 
	exit;
	}


	$check_user_pass= $this->bcrypt->check_password($old_pass, $user->password);
	
	if(empty($check_user_pass)){
	echo json_encode(['error_json'=>'no match pass.','status'=>0]); 
	exit;
	}


	$user_change_data = $this->Api_login_model->change_password_by_user($email,$old_pass,$new_pass);

	if(empty($user_change_data)){
		echo json_encode(['error_json'=>'Not match you details...','status'=>0]);
		exit;
	}

	echo json_encode(['get_json_data'=>$user_change_data,'status'=>1],JSON_ERROR_CTRL_CHAR);
		
}




/**
* Order by id get category  
*/

function sub_categoris($get_url){

$id = $this->uri->segment(4);
$check_id = $this->uri->segment(5);

if($check_id){  echo json_encode(['error_json'=>'Not found page ...','status'=>0]);  }else{
if($id){
if($get_url){

$subcatgories['cat_related_sub_cat'] = $this->Api_categories_model->get_sub_categories_by_id($get_url,$id);
$subcatgories['posts_data'] = $this->Api_post_model->get_posts_sub_categoris_related($get_url,$id);

if($subcatgories){
echo json_encode(['get_json_data'=>$subcatgories,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not found categories details...','status'=>0]); }

}else{ echo json_encode(['error_json'=>'Not found categories details...','status'=>0]); } 

}else{

if($get_url){
$subindia['cat_data'] = $this->Api_categories_model->get_category($get_url);
$subindia['posts_data'] = $this->Api_post_model->get_post_by_categor_slug_name($get_url);
if($subindia){
echo json_encode(['get_json_data'=>$subindia,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not found categories details...','status'=>0]); } 

}else{ echo json_encode(['error_json'=>'Not found categories details...','status'=>0]); } 
}
}
}


/**
* post by get videos
*/


function create_videos_api(){
$get_url = $this->uri->segment(3);
$video_id  = $this->uri->segment(4);
$user_id  = $this->uri->segment(5);
$check_url  = $this->uri->segment(6);

if($check_url){ 

echo json_encode(['error_json'=>'Not found page ...','status'=>0]); 

}else{

if($video_id){

if($user_id){

$check_user_id_reading['users'] = $this->Api_author_model->get_user($user_id);
$check_user_id_reading['video'] = $this->Api_video_model->get_video_post($video_id);

if($check_user_id_reading['users'] && $check_user_id_reading['video']){ 

$check_read	= $this->Api_reading_list_model->get_user_id_or_post_id_get_post($user_id,$video_id);

if($check_read){$read_details = 'true';}else{$read_details = 'false';}

$subvideos['user_reading_list'] = $read_details;

$subvideos['video_post_data'] = $this->Api_video_model->get_post_by_id_or_post_type($get_url,$video_id);

if($subvideos['video_post_data']&& $subvideos['user_reading_list']){

echo json_encode(['get_json_data'=>$subvideos,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not found video details...','status'=>0]); } 

}else{ echo json_encode(['error_json'=>'Not match details...','status'=>0]); } 

}else{ 

$subvideos['video_post_data'] = $this->Api_video_model->get_post_by_id_or_post_type($get_url,$video_id);

if($subvideos['video_post_data']){

echo json_encode(['get_json_data'=>$subvideos,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not found video details...','status'=>0]); }
} 

}else{

//video

$subvideos = $this->Api_video_model->get_video_comments($get_url);

if($subvideos){

echo json_encode(['get_json_data'=>$subvideos,'status'=>1],JSON_ERROR_CTRL_CHAR); 

}else{ echo json_encode(['error_json'=>'empty video details...','status'=>0]);	}   

} 
}                         

}

// Order by id get gallery images

function page_gallery(){
$id = $this->uri->segment(4);
$check_id = $this->uri->segment(5);

if($check_id){

echo json_encode(['error_json'=>'Not found page...','status'=>0]); 

}else{

if($id){

//gallery
$data_gallery = $this->Api_gallery_model->get_gallery_categories_images($id);

if($data_gallery){

echo json_encode(['get_json_data'=>$data_gallery,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'empty gallery details...','status'=>0]); }

}else{

//gallery

$data_gallery['gallery_categories'] = $this->Api_gallery_model->get_gallery_categories_desc();
$data_gallery['gallery_data'] = $this->Api_gallery_model->get_images();

if($data_gallery){

echo json_encode(['get_json_data'=>$data_gallery,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'empty gallery details...','status'=>0]); }
}
}
}

//get tags by tag_slug

function order_by_tag_slug(){

$get_id = $this->uri->segment(4);
$check_id = $this->uri->segment(5);
if($check_id){

echo json_encode(['error_json'=>'Not found page ...','error_status'=>0]);

}else{
if($get_id){

//tags_slug

$data_tags_slug = $this->Api_tags_model->order_tag_slug_by_get_posts($get_id);

sort($data_tags_slug);
if($data_tags_slug){
echo json_encode(['get_json_data'=>$data_tags_slug,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'empty tags details...','error_status'=>0]); } 

}else{

$data_tags_slug = $this->Api_tags_model->all_get_tags();
if($data_tags_slug){
echo json_encode(['get_json_data'=>$data_tags_slug,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'empty tags details...','error_status'=>0]); } 

}
}

}

/**
* Order by tag_slug get data 
*/

function posts_by_id_get_posts(){
$get_url = $this->uri->segment(3);
$post_id = $this->uri->segment(4);
$user_id = $this->uri->segment(5);
$check_id = $this->uri->segment(6);


if($check_id){

echo json_encode(['error_json'=>'Not found page...','status'=>0]);

}else{

if($user_id){ 

$check_user_id_reading['users'] = $this->Api_author_model->get_user($user_id);
$check_user_id_reading['posts'] = $this->Api_reading_list_model->get_post_data($post_id);
if($check_user_id_reading['users'] && $check_user_id_reading['posts']){ 
$check_read	= $this->Api_reading_list_model->get_user_id_or_post_id_get_post($user_id,$post_id);
if($check_read){$read_details = 'true';}else{$read_details = 'false';}
$data_posts['user_reading_list'] = $read_details;
$data_posts['posts_data'] = $this->Api_post_model->get_post_by_id_or_post_type($get_url,$post_id);

if($data_posts['user_reading_list']){

echo json_encode(['get_json_data'=>$data_posts,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'empty post details...','status'=>0]); } 

}else{ echo json_encode(['error_json'=>'Not match details...','status'=>0]); } 

}else{

if($post_id){

$check_post_id = $this->Api_reading_list_model->get_post_data($post_id);
if($check_post_id){

$data_posts['posts_data'] = $this->Api_post_model->get_post_by_id_or_post_type($get_url,$post_id);

if($data_posts['posts_data']){

echo json_encode(['get_json_data'=>$data_posts,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'empty post details...','status'=>0]); }


}else{ echo json_encode(['error_json'=>'Not match post details...','status'=>0]); }			
//post	id check end				


}else{

$data_posts = $this->Api_post_model->get_post_by_post_type($get_url);

if($data_posts){

echo json_encode(['get_json_data'=>$data_posts,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ 

echo json_encode(['error_json'=>'empty post details...','status'=>0]);
} 

}  
} 
} 

}

//voting add or total count
public function get_id_by_total_votes(){
$user_id = $this->uri->segment(4);
$poll_id = $this->uri->segment(5);
$voting = $this->uri->segment(6);
$check_id = $this->uri->segment(7);

if($check_id ){

echo json_encode(['error_json'=>'Not found page...','status'=>0]);

}else{

// add user votes
if($user_id && $poll_id  && $voting){

$check_post_id['users'] = $this->Api_author_model->get_user($user_id);
$check_post_id['poll_id'] = $this->Api_voting_model->get_vote_by_poll_id($poll_id);
$check_post_id['posts'] = $this->Api_voting_model->get_polls_data($voting);

if($check_post_id['users'] && $check_post_id['poll_id'] && $check_post_id['posts']){

$data = $this->Api_voting_model->add_votes($user_id,$poll_id,$voting);

if($data){

echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not add vote...','status'=>0]); }

}else{ echo json_encode(['error_json'=>'Not match details...','status'=>0]);	}

}else{

//count total_voting
if($user_id && $poll_id){

$check_post_id = $this->Api_voting_model->get_votes_by_id($user_id,$poll_id);
if($check_post_id){

$data = $this->Api_voting_model->get_total_voting($user_id,$poll_id);

if($data){

echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ echo json_encode(['error_json'=>'Not voting...','status'=>0]); }

}else{ echo json_encode(['error_json'=>'Not found details...','status'=>0]);	}


}else{
echo json_encode(['error_json'=>'empty voting details...','status'=>0]);
}
}
}
}

public function get_user_id_by_reading_post(){

$id = $this->uri->segment(4);
$check_id = $this->uri->segment(5);

if($check_id ){

echo json_encode(['error_json'=>'Not found page...','status'=>0]);

}else{

//reading-list

$reading_data = $this->Api_reading_list_model->get_id_by_reading_list($id);

if($reading_data){
echo json_encode(['get_json_data'=>$reading_data,'status'=>1],JSON_ERROR_CTRL_CHAR);
}
}
}

public function api_add_reading_post(){

$get_user_id = $this->uri->segment(4);
$get_post_id = $this->uri->segment(5);
$chek_id = $this->uri->segment(6);

if($chek_id){

echo json_encode(['error_json'=>'Not add reading list details...','status'=>0]);

}else{

//add_reading_post

$check_reading['users'] = $this->Api_author_model->get_user($get_user_id);
$check_reading['posts'] = $this->Api_reading_list_model->get_post_data($get_post_id);

if($check_reading['users'] && $check_reading['posts']){

$reading_add = $this->Api_reading_list_model->add_to_reading_list($get_user_id,$get_post_id);

if($reading_add){

echo json_encode(['get_json_data'=>$reading_add,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ 

echo json_encode(['error_json'=>'add reading list error...','status'=>0]); 

}

}else{ 

echo json_encode(['error_json'=>'Not match details...','title'=>'please try again...','status'=>0]); 

} 

}
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



//add post comment

public function add_post_comment(){

$post_id = $this->uri->segment(4);
$user_id = $this->uri->segment(5);
$comment = $this->uri->segment(6);
$chek_id = $this->uri->segment(7);

if($chek_id){

echo json_encode(['error_json'=>'Not found page...','status'=>0]);

}else{

//add_post_comment
if($post_id && $user_id && $comment){

$data['post_comment'] = $this->Api_comment_model->add_comment($post_id,$user_id,$comment);


if($data){

echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ 

echo json_encode(['error_json'=>'Not found commen...','status'=>0]); 

} 
}else{ 

echo json_encode(['error_json'=>'Not found commen details ...','status'=>0]); 

} 

}
}


//get post comment

public function get_post_comment(){

$get_url = $this->uri->segment(3);
$post_id = $this->uri->segment(4);
$chek_id = $this->uri->segment(5);

if($chek_id){

echo json_encode(['error_json'=>'Not found page...','status'=>0]);

}else{

if($get_url == 'post_comment'){

if($post_id){

$data['post_comment'] = $this->Api_comment_model->get_post_comments($post_id);

if($data){

echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ 

echo json_encode(['error_json'=>'Not found commen...','status'=>0]); 

} 
}else{ 

echo json_encode(['error_json'=>'Not found commen  ...','status'=>0]); 

} 

}else{ 
echo json_encode(['error_json'=>'Not found comment page...','status'=>0]);
} 

}
}


//add like comment function 
public function Api_add_like_comment(){

$comment_id =$this->input->post('comment_id');
$user_id = $this->input->post('user_id');
$check_url = $this->uri->segment(4);

if($check_url){

echo json_encode(['error_json'=>'Not found comment page...','status'=>0]);


}else{ 

//check user_id or comment_id details start
$check_user = $this->Api_author_model->get_user($user_id);

if($check_user){

$data = $this->Api_comment_model->add_like_comment($comment_id,$user_id);

if($data){

echo json_encode(['get_json_data'=>$data,'status'=>1],JSON_ERROR_CTRL_CHAR);

}else{ 
echo json_encode(['error_json'=>'Not add like comment...','status'=>0]);
}

}else{ echo json_encode(['error_json'=>'Not found like comment details...','status'=>0]); }
//check user_id or comment_id details end

} 
}

public function update_user_data_by_uid($id,$data){
	$this->db->where('id', $id);
return $this->db->update('users', $data);
}



} 



?>