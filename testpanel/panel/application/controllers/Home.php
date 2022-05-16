<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller{


    public function __construct(){
        parent::__construct();

         if(auth_check()){
           
           redirect(base_url('admin'));
        }

        
    }


    /**
     * Index Page
     */
    public function index(){
       
        $data['title'] ='login';
        $this->load->view('index', $data);
       
    }

   
   
    public function error_404()
    {
        $data['title'] = "Error 404";
        $data['description'] = "Error 404";
        $data['keywords'] = "error,404";

        $this->load->view('partials/_header', $data);
        $this->load->view('errors/error_404');
        $this->load->view('partials/_footer');
    }


}
