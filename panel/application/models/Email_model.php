<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    //send email
    public function send_email($to, $subject, $message,$reply=false){
        $this->load->library('email');

        $settings = $this->settings_model->get_settings();

        if($settings->mail_protocol == "mail") {
            $config = Array(
                'protocol' => 'mail',
                'smtp_host' => $settings->mail_host,
                'smtp_port' => $settings->mail_port,
                'smtp_user' => $settings->mail_username,
                'smtp_pass' => $settings->mail_password,
                'smtp_timeout' => 100,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );
        }elseif($settings->mail_protocol == "smtp"){
            $config = Array(
                'protocol' => 'smtp',//tls or  smtp or mail
                'smtp_host' => $settings->mail_host,//"smtp.gmail.com"
                'smtp_port' => $settings->mail_port, //587 or 465
                'smtp_user' => $settings->mail_username,
                'smtp_pass' => $settings->mail_password,
                'smtp_timeout' => 100,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE,
            );
        }else{
            $config = Array(
                'protocol' => 'tls',//tls or  smtp or mail
                'smtp_host' => $settings->mail_host,//"smtp.gmail.com"
                'smtp_port' => $settings->mail_port, //587 or 465
                'smtp_user' => $settings->mail_username,
                'smtp_pass' => $settings->mail_password,
                'smtp_timeout' => 100,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE,
            );
        }

        if($reply){
        $sent_from=$settings->mail_username;
        }else{
        $sent_from='no-reply@'.$settings->mail_host;
        }

        //initialize
        $this->email->initialize($config);
        //send email

        $this->email->from($sent_from, $settings->application_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->set_newline("\r\n");

        return $this->email->send();
    }

}