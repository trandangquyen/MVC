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

    // list products per category or a category
	public function index($category=null,$page=0) {

        $this->load->library('pagination');
        $data['title'] = 'Danh sách sản phẩm';
        $data['active'] = 'sanpham';
        $this->load->view('site/common/header', $data);
        $this->printCategory();
        $this->load->model('Products_model');
        $this->load->model('Category_model');
        if($category) {
            $name = $this->Category_model->getNameCategory($category);
            if(!$name) show_404();
            $data['products'][$name] = $this->Products_model->listProducts($category);
        } else {
            //$mainCategory = $this->Category_model->getMainCategory();
            //for ($i=0; $i < 3; $i++) { 
                //$data['products'][$mainCategory[$i]['name']] =  $this->Products_model->listProducts($mainCategory[$i]['id']);
            //}
            $data['products']['Xem nhiều nhất'] = $this->Products_model->listProducts(null,'views');
            $data['products']['Đánh giá cao nhất'] = $this->Products_model->listProducts(null,'rate');
            $data['products']['Lượt mua'] = $this->Products_model->listProducts(null,'buys');

        }
        
        $this->load->view('site/listsanpham', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
    }

    // show detail a product
    // param $id: id of product
    public function viewProduct($id) {
        $data['title'] = ucfirst('Sản phẩm');
        $data['active'] = 'sanpham';


        $this->load->model('Products_model');
        $this->load->model('Category_model');
        
        if($data['product'] = $this->Products_model->getProducts($id))
            $data['product']->category_name = $this->Category_model->getNameCategory($data['product']->category_id);
        else show_404();
        $data['title'] = $data['product']->name;
        $this->load->view('site/common/header', $data);
        $this->printCategory();
        $this->load->view('site/sanpham', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
	}
    // print list category on left side on page product
	public function printCategory() {
		$this->load->model('Category_model');

		$mainCategory = $this->Category_model->getMainCategory();
		foreach ($mainCategory as $i => $value) {
			$mainCategory[$i]['data'] = $this->Category_model->getSubCategory($value['id']);
		}
        $data['title'] = 'Danh mục thể loại';
        $data['category'] = $mainCategory;
        $this->load->view('site/theloai', $data);
	}
}

