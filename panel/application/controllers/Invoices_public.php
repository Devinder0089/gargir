<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_public extends MY_Controller{


    public function index($any){
      $id=base64_decode($any);

        $invsc=$this->invoices_model->get_data_row_by_id($id);
        if(empty($invsc)){
        $this->session->set_flashdata('error', "No found data.");
        redirect(base_url());
        exit;
        }

        $data['title'] = "invoices";
        $data['invoices'] = $invsc;
      
       // $htmls=$this->load->view('invoices/invoice-details-mail',$data);
          $html=$this->load->view('invoices/invoice-details-mail', $data,true);
     
        $this->pdf->createPDF($html, 'mypdf', false);
      
    } 


    public function details($any){
        $id=base64_decode($any);

        $invsc=$this->invoices_model->get_data_row_by_id($id);
        if(empty($invsc)){
        $this->session->set_flashdata('error', "No found data.");
        redirect(base_url());
         exit;
        }

        $data['title'] = "invoices";
        $data['invoices'] = $invsc;
      
        $html=$this->load->view('invoices/invoice-details-mails', $data,true);
     //$html=$this->load->view('invoices/invoice-details-mails', $data);
       $this->pdf->createPDF($html, 'mypdf', false);

        
    } 

}

?>