<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->model('Products_model');
        $this->load->model('Category_model');
    }

    // list products per category or a category
    public function index() {
        $data = null;
        $this->load->view('site/invoice', $data);
    }
} 

