<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTintuc extends CI_Controller {
	public function __construct(){
          parent::__construct();
          $this->load->helper(array('url'));
      }
	public function index()
	{

        $this->load->model('Tintuc_model');
        $data['news'] = $this->Tintuc_model->getAllNews();
        print_r($data);exit;
        

        $data['title'] = ucfirst("Danh sách bài viết"); // Capitalize the first letter

        $this->load->view('site/common/header', $data);
        $this->load->view('site/common/mainleft', $data);
        $this->load->view('site/tintuc/list', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
        
        
	}
}
