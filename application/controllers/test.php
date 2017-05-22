<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: khoazero123@gmail.com
 */
class Test extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->library('email');
            $config['protocol']='smtp';
            $config['smtp_host']='ssl://smtp.gmail.com';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_user']='cdtd35a@gmail.com';
            $config['smtp_pass']='tracdia35a';
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('cdtd35a@gmail.com', 'Site name');
            $this->email->to('khoazero123@gmail.com');
            $this->email->subject('Notification Mail');
            $this->email->message('Your message');
            //$this->email->send();
            //echo $this->email->print_debugger();

        if ( ! $this->email->send()) {
            // Generate error
            echo $this->email->print_debugger();
        }else{
            echo 'Gửi email thành công';
        }
    }
}