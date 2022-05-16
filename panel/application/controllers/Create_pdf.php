<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_pdf extends MY_Controller{

public function pdf(){
   $data['pdf_data']='pdf';
   
    $this->load->view('pdfreport', $data);
}

}
