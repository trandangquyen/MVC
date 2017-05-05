<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lienhe extends CI_Controller {

	public function __construct(){
          parent::__construct();
          $this->load->helper(array('url'));
          $this->load->model('Contact_model');
     }
	public function index()
	{
		$data['active'] = 'lienhe';
		$this->load->view('site/common/header', $data);
        $this->load->view('site/lienhe',$data);
        $this->load->view('site/common/footer', $data);
	}
}
