<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends MY_Controller{


    public function __construct(){
        parent::__construct();

        if(!auth_check()){
            redirect('login');
        }

    $this->system_dir =dirname(dirname(__dir__)).'/';

    }


    public function add(){
      
        $user =user();

        $data['title'] = "Invoices";
        $data['invoices'] = $this->invoices_model->get_data();
        $data['membership'] = $this->invoices_model->get_data_membership();
        $data['user'] = $user;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/invoices/add', $data);
        $this->load->view('admin/includes/_footer');
    } 

public function add_post(){

    $uid=$this->input->post('uid');
    $name=$this->input->post('name');
    $phone=$this->input->post('phone');
    $company_name=$this->input->post('company_name');
    $date_issue=(!empty($this->input->post('date_issue')))?$this->input->post('date_issue'):date('d/m/Y');
    $pid=(!empty($this->input->post('pid')))?$this->input->post('pid'):'0';
    $number=$this->input->post('number');
    $price=($this->input->post('invoice_total')?$this->input->post('invoice_total'):'0.00');
    $gst_number=($this->input->post('gst_number')?$this->input->post('gst_number'):'0.00');
    $email=$this->input->post('email');
    $gst_charges=($this->input->post('gst_charges')?$this->input->post('gst_charges'):'0.00');
    $subtotal=($this->input->post('subtotal')?$this->input->post('subtotal'):'0.00');
    $address=$this->input->post('address');
    $tax_rate=($this->input->post('tax_rate')?$this->input->post('tax_rate'):'0.00');
    $total_tax=($this->input->post('total_tax')?$this->input->post('total_tax'):'0.00');
    $discount=($this->input->post('discount')?$this->input->post('discount'):'0.00');
    $currency=($this->input->post('currency')?$this->input->post('currency'):'USD');
    $zipcode=($this->input->post('zipcode')?$this->input->post('zipcode'):'140055');
    $country=($this->input->post('country')?$this->input->post('country'):'india');

    $bill_name=($this->input->post('bill_name')?$this->input->post('bill_name'):'');
    $bill_email=($this->input->post('bill_email')?$this->input->post('bill_email'):'');
    $bill_zipcode=($this->input->post('bill_zipcode')?$this->input->post('bill_zipcode'):'140055');
    $bill_country=($this->input->post('bill_country')?$this->input->post('bill_country'):'india');
    $bill_phone=($this->input->post('bill_phone')?$this->input->post('bill_phone'):'0000000000');
    $bill_address=($this->input->post('bill_address')?$this->input->post('bill_address'):'');
    $option=($this->input->post('option')?$this->input->post('option'):'');


    if(empty($uid)){
    $this->session->set_flashdata('error','Please enter user id.');
    redirect($this->agent->referrer());
    } 

    if(empty($phone)){
    $this->session->set_flashdata('error','Please enter phone.');
    redirect($this->agent->referrer());
    } 

 if(empty($company_name)){
    $this->session->set_flashdata('error','Please enter company name.');
    redirect($this->agent->referrer());
    } 
 

    if(empty($email)){
    $this->session->set_flashdata('error','Please enter email.');
    redirect($this->agent->referrer());
    } 

    if(empty($name)){
    $this->session->set_flashdata('error','Please enter name.');
    redirect($this->agent->referrer());
    } 

  if(isset($_FILES["signature"]["name"]) && empty($_FILES["signature"]["name"])){
    $this->session->set_flashdata('error','Please upload signature file .');
    redirect($this->agent->referrer());
    } 
    

  if(isset($_FILES["logo"]["name"]) && empty($_FILES["logo"]["name"])){
    $this->session->set_flashdata('error','Please upload logo file .');
    redirect($this->agent->referrer());
    } 
    
    //define upload folder name
        $signature_file_uplad_dir ="uploads/signature/";        
        //get upload file name
        $signature_file_name =time().basename($_FILES["signature"]["name"]);
        //file upload path
        $signature_target_file_upload =$this->system_dir.$signature_file_uplad_dir.$signature_file_name;
        //get file upload path
        $signature_file_upload_url =$signature_file_uplad_dir.$signature_file_name;
        $signature_filetmp_name = $_FILES["signatcherimg"]["tmp_name"];
        if(move_uploaded_file($signature_filetmp_name, $signature_target_file_upload)) {
             $signatcherimg_url=$signature_file_upload_url;
        }else{
           $signatcherimg_url='';
        }
    
        //system Dir
        $logo_system_dir =dirname(dirname(__dir__)).'/';
        
        //define upload folder name
        $logo_file_uplad_dir ="uploads/logo/";
        
        //get upload file name
        $logo_file_name =time().basename($_FILES["logo"]["name"]);
        
        //file upload path
        $logo_target_file_upload =$logo_system_dir.$logo_file_uplad_dir.$logo_file_name;
        
        //get file upload path
        $logo_file_upload_url =$logo_file_uplad_dir.$logo_file_name;
        
        $logo_filetmp_name = $_FILES["logo"]["tmp_name"];
        if(move_uploaded_file($logo_filetmp_name, $logo_target_file_upload)) {
             $logo_url=$logo_file_upload_url;
        }else{
           $logo_url='';
        }   

    $data=[
        'user_id'=>$uid,
        'name'=>$name,
        'company_name'=>$company_name,
        'date_issue'=>$date_issue,
        'pid'=>$pid,
        'number'=>$number,
        'phone'=>$phone,
        'gst_number'=>$gst_number,
        'signatcherimg'=>$signatcherimg_url,
        'logo'=>$logo_url,
        'email'=>$email,
        'gst_charges'=>$gst_charges,
        'subtotal'=>$subtotal,
        'address'=>$address,
        'tax_rate'=>$tax_rate,
        'total_tax'=>$total_tax,
        'discount'=>$discount,
        'currency'=>$currency,
        'zipcode'=>$zipcode,
        'country'=>$country,
        'bill_name'=>$bill_name,
        'bill_email'=>$bill_email,
        'bill_zipcode'=>$bill_zipcode,
        'bill_country'=>$bill_country,
        'bill_phone'=>$bill_phone,
        'bill_address'=>$bill_address,
        'option'=>$option,
        ];

    if($this->invoices_model->add($data)){
        $this->session->set_flashdata('success','add success.');
        redirect($this->agent->referrer());
    }else{

           $this->session->set_flashdata('error','add failed.');
        redirect($this->agent->referrer());
    }



}

    public function index($val){
        $user =user();
        $data['title'] = "Invoices";
        if($this->input->post('type')){
            $val = $this->input->post('type');
        }
        $year = $this->input->post('year');
        $monthyear = $this->input->post('monthYear');
        $custom1 = $this->input->post('custom1');
        $custom2 = $this->input->post('custom2');
        if(!empty($val)){
            if($val == 'all'){
             $data['invoices'] = $this->invoices_model->get_data();
             $this->load->view('admin/includes/_header', $data);
             $this->load->view('admin/invoices/index', $data);
             $this->load->view('admin/includes/_footer');

            }
            elseif($val == 'yearly'){
               if($this->input->is_ajax_request()){
                   $data['invoices'] = $this->invoices_model->get_data(['year(apartment_payments.created_at)' => $year]);
                  echo json_encode($data['invoices']);
               }
            }
            elseif($val == 'monthly'){
                if($this->input->is_ajax_request()){
                  $timestamp = explode('-', $monthyear);
                  $data['invoices'] = $this->invoices_model->get_data(['month(apartment_payments.created_at)' => $timestamp[0], 'year(apartment_payments.created_at)' => $timestamp[1]]);
                  echo json_encode($data['invoices']);
               }else{
                   $data['monthly'] = "monthly";
                   $data['invoices'] = $this->invoices_model->get_data(['month(apartment_payments.created_at)' => date('m'), 'year(apartment_payments.created_at)' => date('Y')]);
                   $this->load->view('admin/includes/_header', $data);
                   $this->load->view('admin/invoices/index', $data);
                   $this->load->view('admin/includes/_footer');
               }
            }
           
             else{
                if($this->input->is_ajax_request()){
                    $result = $this->invoices_model->get_data('date(apartment_payments.created_at) BETWEEN "'. $custom1 . '" and "'. $custom2 .'"');
                    echo json_encode($result);
                }
             }
         }
         else{
             $data['invoices'] = $this->invoices_model->get_data();
             $this->load->view('admin/includes/_header', $data);
             $this->load->view('admin/invoices/index', $data);
             $this->load->view('admin/includes/_footer');
        }
       
    } 


    public function details($id){

        $datainvoices=$this->invoices_model->get_data_row_by_id($id);
        if(empty($datainvoices)){
        redirect($this->agent->referrer());
        }

        $data['title'] = "Invoices";
        $data['invoices']=$datainvoices;
       
       $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/invoices/details', $data);
       $this->load->view('admin/includes/_footer',$data);

    }

   public function invoice_send_mail($id){
     
    $user =user();
    $invsc=$this->invoices_model->get_data_row_by_id($id);
    if(empty($invsc)){
    $this->session->set_flashdata('error', "No found data.");
    redirect($this->agent->referrer());
    }

  if(empty($invsc->bill_email)){
     $this->session->set_flashdata('error', "Can not empty bill email.");
    redirect($this->agent->referrer());
    }

    $link=base_url().'invoice-details-mail/'.base64_encode($id);
    
    $subject='NadlanPro';
    $msg="<h1>Hi Dear,</h1>";
    $msg.="<div class='secinvoices'>";
    $msg.="<p>Please click and download Invoice PDF file.</p></br>";
    $msg.='<a href="'.$link.'">Please click and download Invoice PDF file.</p></br>';
    $msg.="</div>";

    $mails=$this->email_model->send_email($invsc->bill_email,$subject,$msg);

    if($mails){

    $this->invoices_model->update($id,['send_mail'=>'0']);
   
    $this->session->set_flashdata('success', "invoices sent mail successfully.");
    redirect($this->agent->referrer());

    }else{
    $this->session->set_flashdata('error', "There was a problem sent mail the invoices!");
    redirect($this->agent->referrer());
    }

}

public function invoice_send_mail_post(){
    $id=$this->input->post('invid');
    $userselect=$this->input->post('userselect');
  
  if(empty($id)){
    $this->session->set_flashdata('error', "Can not empty id.");
    redirect($this->agent->referrer());
  }

  if(empty($userselect[0])){
    $this->session->set_flashdata('error', "Can not empty users.");
    redirect($this->agent->referrer());
  }

    foreach($userselect as $vl){    
       $link=base_url().'invoice-details-mail/'.base64_encode($id.'_'.$vl);
       $users=get_user($vl);
       if(!empty($users)){
        $subject='NadlanPro';
        $msg="<h1>Hi Dear,</h1>";
        $msg.="<div class='secinvoices'>";
        $msg.="<p>Please click and download Invoice PDF file.</p></br>";
        $msg.='<a href="'.$link.'">Please click and download Invoice PDF file.</p></br>';
        $msg.="</div>";
       }
        
        $mails=$this->email_model->send_email($users->email,$subject,$msg);

    }
  
   if($mails){

    $this->session->set_flashdata('success', "invoices sent mail successfully.");
     redirect($this->agent->referrer());

    }else{
        $this->session->set_flashdata('error', "There was a problem sent mail the invoices!");
         redirect($this->agent->referrer());
    }

    }

    public function delete_post(){
       
         $id=$this->input->post('id');

        if($this->invoices_model->delete($id)){

            $this->session->set_flashdata('success', "invoices successfully deleted!");
            redirect($this->agent->referrer());

        }else{
            $this->session->set_flashdata('error', "There was a problem deleting the invoices!");
            redirect($this->agent->referrer());
        }

    }
    
     public function unset(){
       
       $this->session->unset_userdata('type');
       echo 'true';
    }


}

?>