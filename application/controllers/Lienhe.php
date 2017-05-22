<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lienhe extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Contact_model');
        $this->load->model('Support_model');
    }
	public function index() {
		$data['active'] = 'lienhe';
		$support = $this->Support_model->getSupport();
		$this->load->view('site/common/header', $data);
		$this->load->view('site/lienhe',[$data, 'support'=>$support]);
        $this->load->view('site/common/footer', $data);
	}
	public function save() {
		//echo '<pre>';print_r($_POST);echo '</pre>';
		if(empty($_POST['info'])) $data['error'] = 'Chưa nhập đầy đủ thông tin';
		if(empty($_POST['info']['user_name'])) $data['error'] = 'Xin hãy nhập tên';
		elseif(empty($_POST['info']['user_email'])) $data['error'] = 'Xin hãy nhập email';
		elseif(empty($_POST['info']['user_mobile'])) $data['error'] = 'Xin hãy nhập mobile';
		elseif(empty($_POST['info']['form_data']['content'])) $data['error'] = 'Xin hãy nhập content';
		else {
			$insert['name'] = $_POST['info']['user_name'];
			$insert['email'] = $_POST['info']['user_email'];
			$insert['phone'] = $_POST['info']['user_mobile'];
			$insert['content'] = $_POST['info']['form_data']['content'];
			if($this->Contact_model->insertContact($insert)) $data['success'] = 'Cám ơn bạn đã liên hệ.';

		}
		//echo '<pre>';print_r($data);echo '</pre>';
		$data['active'] = 'lienhe';
		$this->load->view('site/common/header', $data);
        $this->load->view('site/lienhe',$data);
        $this->load->view('site/common/footer', $data);
	}
}
