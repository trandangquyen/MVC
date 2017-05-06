<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
          $this->load->database();
     }
	public function index($page = 'site/home',$category=null)
	{
        $this->load->library('pagination');
        $this->load->model('Products_model');
        $this->load->model('Category_model');

        $data['title'] = 'Danh sách sản phẩm';
        $data['active'] = 'sanpham';
        $newProducts = $this->Products_model->listProducts(null,'null',0,10);
//        var_dump($newProducts);
        $data['newProducts'] = $newProducts;

        $this->load->view('site/common/header', $data);
        $this->load->view('site/common/mainleft', $data);
        $this->load->view($page, $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
	}
}


