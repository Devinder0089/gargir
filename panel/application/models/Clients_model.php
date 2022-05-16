<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_Model{

     var $dir_path="";

    public function __construct(){
        parent::__construct();

    $this->dir_path=dirname(dirname(__dir__));

    }


}