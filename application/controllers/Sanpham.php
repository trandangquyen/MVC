<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanpham extends CI_Controller {

	public function __construct() {
          parent::__construct();
          $this->load->helper(array('url'));
          $this->load->database();
     }

    // list products per category or a category
	public function index($category=null,$page=1) {
        $this->load->library('pagination');
        $this->load->model('Products_model');
        $this->load->model('Category_model');
        
        $data['title'] = 'Danh sách sản phẩm';
        $data['active'] = 'sanpham';
        $this->load->view('site/common/header', $data);
        $listCategory = $this->Category_model->getAllCategory();
        $this->load->view('site/theloai', ['category'=>$listCategory]);
        
        if($category) {
            $name = $this->Category_model->getNameCategory($category);
            $name = $name[count($name)-1];
            if(!$name) show_404();
            $data['products'][$name] = $this->Products_model->listProducts($category);
            $config['base_url'] = base_url('index.php/theloai');
            $config['base_url'] .= '/'.$category;
            //$config['total_rows'] = $this->db->query("select id from product")->num_rows();
            $config['total_rows'] = count((array)$data['products'][$name]);
            //echo $config['total_rows']."<br>";
            $config['per_page'] = 6;
            $config['use_page_numbers'] = true;
            $config['page_query_string'] = TRUE;
            //$config['suffix'] = '.html';
            $config['first_url'] = site_url('index.php/theloai/'.$category);
            $config['first_link'] = 'Trang đầu';
            $config['last_link'] = 'Trang cuối';
            $this->pagination->initialize($config);
            $page = (int)$this->input->get('per_page', TRUE);
            if($page<1) $page = 1;
            $start = ($page-1)*$config['per_page'];
            $data['products'][$name] = $this->Products_model->listProducts($category,null,$start,$config['per_page']);
        } else {
            $data['products']['Xem nhiều nhất'] = $this->Products_model->listProducts(null,'views',0,6);
            $data['products']['Đánh giá cao nhất'] = $this->Products_model->listProducts(null,'rate',0,6);
            $data['products']['Lượt mua'] = $this->Products_model->listProducts(null,'buys',0,6);
        }
        
        $this->load->view('site/listsanpham', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
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

