<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanpham extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
          parent::__construct();
          $this->load->helper(array('url'));
     }

	public function index($category=null) {

        $data['title'] = ucfirst('Sản phẩm'); // Capitalize the first letter

        $this->load->view('site/common/header', $data);
        //$this->load->view('site/common/mainleft', $data);
        $this->printCategory();

        $this->load->model('Products_model');
        $products = $this->Products_model->listProducts();


        $this->load->view('site/sanpham', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
	}
	public function printCategory() {
		$this->load->model('Category_model');

		$mainCategory = $this->Category_model->getMainCategory();
		foreach ($mainCategory as $i => $value) {
			$mainCategory[$i]['data'] = $this->Category_model->getSubCategory($value['id']);
		}
        $data['title'] = ucfirst('Danh mục thể loại'); // Capitalize the first letter
        $data['category'] = $mainCategory;
        $this->load->view('site/theloai', $data);
	}
}

