<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanpham extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->model('Products_model');
        $this->load->model('Category_model');
     }

    // list products per category or a category
	public function index($category=null,$page=1) {
        $this->load->library('pagination');
        $data['title'] = 'Danh sách sản phẩm';
        $data['active'] = 'sanpham';
        $this->load->view('site/common/header', $data);
        $listCategory = $this->Category_model->getAllCategory();
        $this->load->view('site/theloai', ['category'=>$listCategory]);
        
        if($category) {
            $name = $this->Category_model->getNameCategory($category);
            $name = $name[count($name)-1];
            if(!$name) show_404();
            $data['products'][$name] = $this->Products_model->listProducts($category,null,0,3);
        } else {
            //$data['products']['Đánh giá cao nhất'] = $this->Products_model->listProducts(null,'rate',0,6);
            //$data['products']['Lượt mua'] = $this->Products_model->listProducts(null,'buys',0,6);
            $data['products']['new'] = $this->Products_model->listProducts(null,null);
            $config['base_url'] = base_url('index.php/sanpham');
            $config['total_rows'] = count((array)$data['products']['new']);
            $config['per_page'] = 6;
            $config['use_page_numbers'] = true;
            $config['page_query_string'] = TRUE;
            $config['first_url'] = site_url('index.php/sanpham');
            $config['first_link'] = 'Trang đầu';
            $config['last_link'] = 'Trang cuối';
            $this->pagination->initialize($config);
            $page = (int)$this->input->get('per_page', TRUE);
            if($page<1) $page = 1;
            $start = ($page-1)*$config['per_page'];
            $data['products']['new'] = $this->Products_model->listProducts(null,null,0,6);
            //$data['products']['Sản phẩm mới nhất'] = $this->Products_model->listProducts(null,null,0,9);
        }
        
        $this->load->view('site/listsanpham', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
    }
    public function loadAjax() {
        $start = !empty($_REQUEST['start']) ? $_REQUEST['start'] : 0;
        $category_id = !empty($_REQUEST['category']) ? $_REQUEST['category'] : 1;
        $data['products'] = $this->Products_model->listProducts($category_id,null,$start,3);
        $this->load->view('site/listsanphamajax', $data);
    }
    // show detail a product
    // param $id: id of product
    public function viewProduct($id) {
        $data['title'] = 'Sản phẩm';
        $data['active'] = 'sanpham';

        $this->load->model('Products_model');
        $this->load->model('Category_model');

        if($data['product'] = $this->Products_model->getProducts($id))
            $data['product']->category_name = $this->Category_model->getNameCategory($data['product']->category_id);
        else show_404();
        $data['title'] = $data['product']->name;

        $data['product']->image = $this->Products_model->getImageProducts($id);

        $this->load->view('site/common/header', $data);
        $listCategory = $this->Category_model->getAllCategory();
        $this->load->view('site/theloai', ['category'=>$listCategory]);

        $this->load->view('site/sanpham', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
	}
}

