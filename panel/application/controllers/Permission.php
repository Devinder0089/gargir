<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends MY_Controller{


    public function __construct(){
        parent::__construct();

        if(!auth_check()){
            redirect('login');
        }

    }
public function index(){

    $user =user();
    if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_add')){

        $data['title'] = "permission";
        $data['permission'] = $this->permission_model->get_data();
        $data['user'] = $user;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/permission/index', $data);
        $this->load->view('admin/includes/_footer');
     }else{
    $this->session->set_flashdata('error','No Allowed Permission.');
    redirect($this->agent->referrer());
    }
}

public function details($uid){

    $user =user();

    $permission=$this->permission_model->get_data_by_user_id($uid);
    if(empty($permission)){
    $this->session->set_flashdata('error','No found data.');
    redirect($this->agent->referrer());
    }

    if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_view')){

        $data['title'] = "permission";
        $data['permission'] = $permission; 
        $data['user'] = $user;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/permission/details', $data);
        $this->load->view('admin/includes/_footer');
     }else{
    $this->session->set_flashdata('error','No Allowed Permission.');
    redirect($this->agent->referrer());
    }
} 

public function add(){
     $user =user();

if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_edit')){
     
        $data['title'] = "permission";
        $data['user_id'] = "0";
        $data['all_users'] = $this->permission_model->get_all_users();
        $data['user'] = $user;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/permission/add', $data);
        $this->load->view('admin/includes/_footer');

    }else{
    $this->session->set_flashdata('error','No Allowed Permission add.');
    redirect($this->agent->referrer());
    }

       
} 

public function edit($user_id){
 
        $user =user();
        if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_edit')){

        $data['title'] = "edit permission";
        $data['user_id'] = $user_id;
        $data['all_users'] = $this->permission_model->get_all_users();
        $data['user'] = $user;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/permission/add', $data);
        $this->load->view('admin/includes/_footer');

        }else{
        $this->session->set_flashdata('error','No Allowed Permission Edit.');
        redirect($this->agent->referrer());
        }
        
} 

public function add_post(){


    $uid=$this->input->post('uid');
    $userselect=$this->input->post('userselect');


    if(empty($uid)){
    $this->session->set_flashdata('error','Please enter user id.');
    redirect($this->agent->referrer());
    } 

    if(empty($userselect[0])){
    $this->session->set_flashdata('error','Please user select.');
    redirect($this->agent->referrer());
    } 

    
     $data['recent_agreements_show']=($this->input->post('recent_agreements_show'))?$this->input->post('recent_agreements_show'):'0';
     
     $data['sub_admin_show']=($this->input->post('sub_admin_show'))?$this->input->post('sub_admin_show'):'0';
     $data['sub_admin_create']=($this->input->post('sub_admin_create'))?$this->input->post('sub_admin_create'):'0';
     $data['sub_admin_delete']=($this->input->post('sub_admin_delete'))?$this->input->post('sub_admin_delete'):'0';
     $data['sub_admin_password']=($this->input->post('sub_admin_password'))?$this->input->post('sub_admin_password'):'0';
     $data['sub_admin_view']=($this->input->post('sub_admin_view'))?$this->input->post('sub_admin_view'):'0';
     $data['sub_admin_edit']=($this->input->post('sub_admin_edit'))?$this->input->post('sub_admin_edit'):'0';
     $data['sub_admin_role']=($this->input->post('sub_admin_role'))?$this->input->post('sub_admin_role'):'0';
     $data['sub_admin_ban']=($this->input->post('sub_admin_ban'))?$this->input->post('sub_admin_ban'):'0';
     
      $data['client_show']=($this->input->post('client_show'))?$this->input->post('client_show'):'0';
     $data['client_create']=($this->input->post('client_create'))?$this->input->post('client_create'):'0';
     $data['client_delete']=($this->input->post('client_delete'))?$this->input->post('client_delete'):'0';
     $data['client_password']=($this->input->post('client_password'))?$this->input->post('client_password'):'0';
     $data['client_view']=($this->input->post('client_view'))?$this->input->post('client_view'):'0';
     $data['client_edit']=($this->input->post('client_edit'))?$this->input->post('client_edit'):'0';
     $data['client_role']=($this->input->post('client_role'))?$this->input->post('client_role'):'0';
     $data['client_ban']=($this->input->post('client_ban'))?$this->input->post('client_ban'):'0';
     
     $data['revenue_overview_show']=($this->input->post('revenue_overview_show'))?$this->input->post('revenue_overview_show'):'0';
     
     $data['project_show']=($this->input->post('project_show'))?$this->input->post('project_show'):'0';
     $data['project_create']=($this->input->post('project_create'))?$this->input->post('project_create'):'0';
     $data['project_delete']=($this->input->post('project_delete'))?$this->input->post('project_delete'):'0';
     $data['project_view']=($this->input->post('project_view'))?$this->input->post('project_view'):'0';
     $data['project_edit']=($this->input->post('project_edit'))?$this->input->post('project_edit'):'0';
    
     $data['calendar_management_show']=($this->input->post('calendar_management_show'))?$this->input->post('calendar_management_show'):'0';
    
     $data['permission_show']=($this->input->post('permission_show'))?$this->input->post('permission_show'):'0';
  
   $data['permission_add']=($this->input->post('permission_add'))?$this->input->post('permission_add'):'0';

   $data['permission_delete']=($this->input->post('permission_delete'))?$this->input->post('permission_delete'):'0';
   $data['permission_view']=($this->input->post('permission_view'))?$this->input->post('permission_view'):'0';
   $data['permission_edit']=($this->input->post('permission_edit'))?$this->input->post('permission_edit'):'0';
   
   //show stamping_show
   $data['stamping_property_owner_show']=($this->input->post('stamping_property_owner_show'))?$this->input->post('stamping_show'):'0';
  
   $data['stamping_show']=($this->input->post('stamping_show'))?$this->input->post('stamping_show'):'0';
  
   $data['collaborators_show']=($this->input->post('collaborators_show'))?$this->input->post('collaborators_show'):'0';

   $data['membership_show']=($this->input->post('membership_show'))?$this->input->post('membership_show'):'0';
   
   $data['support_tickets_show']=($this->input->post('support_tickets_show'))?$this->input->post('support_tickets_show'):'0';
    $data['book_deals_show']=($this->input->post('book_deals_show'))?$this->input->post('book_deals_show'):'0';
   
 

/********** start sms_report ************/
     $data['sms_report_show']=($this->input->post('sms_report_show'))?$this->input->post('sms_report_show'):'0';
/********** end sms_report ************/

   $data['finance_show']=($this->input->post('finance_show'))?$this->input->post('finance_show'):'0';
   
   $data['file_history_show']=($this->input->post('file_history_show'))?$this->input->post('file_history_show'):'0';
   
   //customer
    $data['customer_active']=($this->input->post('customer_active'))?$this->input->post('customer_active'):'0';
     $data['customer_pending']=($this->input->post('customer_pending'))?$this->input->post('customer_pending'):'0';

    $data['customer_show']=($this->input->post('customer_show'))?$this->input->post('customer_show'):'0';
    $data['customer_create']=($this->input->post('customer_create'))?$this->input->post('customer_create'):'0';
   $data['customer_password']=($this->input->post('customer_password'))?$this->input->post('customer_password'):'0';
    $data['customer_view']=($this->input->post('customer_view'))?$this->input->post('customer_view'):'0';
    $data['customer_edit']=($this->input->post('customer_edit'))?$this->input->post('customer_edit'):'0';
    $data['customer_delete']=($this->input->post('customer_delete'))?$this->input->post('customer_delete'):'0';
    $data['customer_role']=($this->input->post('customer_role'))?$this->input->post('customer_role'):'0';
    $data['customer_ban']=($this->input->post('customer_ban'))?$this->input->post('customer_ban'):'0';

//worker
$data['worker_show']=($this->input->post('worker_show'))?$this->input->post('worker_show'):'0';
$data['worker_create']=($this->input->post('worker_create'))?$this->input->post('worker_create'):'0';
$data['worker_delete']=($this->input->post('worker_delete'))?$this->input->post('worker_delete'):'0';
$data['worker_password']=($this->input->post('worker_password'))?$this->input->post('worker_password'):'0';
$data['worker_view']=($this->input->post('worker_view'))?$this->input->post('worker_view'):'0';
$data['worker_edit']=($this->input->post('worker_edit'))?$this->input->post('worker_edit'):'0';
$data['worker_role']=($this->input->post('worker_role'))?$this->input->post('worker_role'):'0';
$data['worker_ban']=($this->input->post('worker_ban'))?$this->input->post('worker_ban'):'0';

//contractor
$data['contractor_show']=($this->input->post('contractor_show'))?$this->input->post('contractor_show'):'0';
$data['contractor_create']=($this->input->post('contractor_create'))?$this->input->post('contractor_create'):'0';
$data['contractor_password']=($this->input->post('contractor_password'))?$this->input->post('contractor_password'):'0';
$data['contractor_delete']=($this->input->post('contractor_delete'))?$this->input->post('contractor_delete'):'0';
$data['contractor_role']=($this->input->post('contractor_role'))?$this->input->post('contractor_role'):'0';
$data['contractor_view']=($this->input->post('contractor_view'))?$this->input->post('contractor_view'):'0';
$data['contractor_edit']=($this->input->post('contractor_edit'))?$this->input->post('contractor_edit'):'0';
$data['contractor_ban']=($this->input->post('contractor_ban'))?$this->input->post('contractor_ban'):'0';

//invoice
$data['invoice_show']=($this->input->post('invoice_show'))?$this->input->post('invoice_show'):'0';
$data['invoice_create']=($this->input->post('invoice_create'))?$this->input->post('invoice_create'):'0';
$data['invoice_delete']=($this->input->post('invoice_delete'))?$this->input->post('invoice_delete'):'0';
$data['invoice_send_mail']=($this->input->post('invoice_send_mail'))?$this->input->post('invoice_send_mail'):'0';
$data['invoice_view']=($this->input->post('invoice_view'))?$this->input->post('invoice_view'):'0';

//property
$data['property_show']=($this->input->post('property_show'))?$this->input->post('property_show'):'0';
$data['property_create']=($this->input->post('property_create'))?$this->input->post('property_create'):'0';
$data['property_delete']=($this->input->post('property_delete'))?$this->input->post('property_delete'):'0';
$data['property_view']=($this->input->post('property_view'))?$this->input->post('property_view'):'0';
$data['property_edit']=($this->input->post('property_edit'))?$this->input->post('property_edit'):'0';

//property
   $data['agreements_show']=($this->input->post('agreements_show'))?$this->input->post('agreements_show'):'0';
$data['agreement_create']=($this->input->post('agreement_create'))?$this->input->post('agreement_create'):'0';
$data['agreement_delete']=($this->input->post('agreement_delete'))?$this->input->post('agreement_delete'):'0';
$data['agreement_view']=($this->input->post('agreement_view'))?$this->input->post('agreement_view'):'0';
$data['agreement_edit']=($this->input->post('agreement_edit'))?$this->input->post('agreement_edit'):'0';


foreach($data as $key=> $vl){
    foreach($userselect as $user_id){
        $insert_datata=[
        'user_id'=>$user_id,
        'parent'=>$uid,
        'mata_key'=>$key,
        'meta_value'=>$vl,
        ];

        $permission=$this->permission_model->get_data_by_mata($key,$user_id);
        if(!empty($permission)){

        $permission_add=$this->permission_model->update($permission->id,$insert_datata);
        }else{
           $permission_add=$this->permission_model->add($insert_datata);
        }

    }
}


    if($permission_add){
        $this->session->set_flashdata('success','add success.');
        redirect($this->agent->referrer());
    }else{

        $this->session->set_flashdata('error','add failed.');
        redirect($this->agent->referrer());
    }

}

 public function delete_post_user_id(){
       
       if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_edit')){

            $uid=$this->input->post('uid');

            if($this->permission_model->delete_by_uid($uid)){

            $this->session->set_flashdata('success', "delete successfully permission!");
            redirect($this->agent->referrer());

            }else{
            $this->session->set_flashdata('error', "There was a problem deleting the permission!");
            redirect($this->agent->referrer());
            }

    }else{

         $this->session->set_flashdata('error', "No Allowed Permission");
        redirect($this->agent->referrer());
    }


}

    public function delete_post(){
       
       if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_edit')){

            $id=$this->input->post('id');

            if($this->permission_model->delete($id)){

            $this->session->set_flashdata('success', "delete successfully permission!");
            redirect($this->agent->referrer());

            }else{
            $this->session->set_flashdata('error', "There was a problem deleting the permission!");
            redirect($this->agent->referrer());
            }

    }else{
         $this->session->set_flashdata('error', "No Allowed Permission");
        redirect($this->agent->referrer());
    }
}


}

?>