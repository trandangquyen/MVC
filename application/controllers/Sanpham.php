<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanpham extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form'));
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
        $this->load->view('site/category', ['category'=>$listCategory]);
        
        if($category) {
            $name = $this->Category_model->getNameCategory($category);
            $name = end($name);
            if(!$name) show_404();
            $data['products'][$name] = $this->Products_model->listProducts($category,null,0,3);
        } else {
            //$data['products']['Đánh giá cao nhất'] = $this->Products_model->listProducts(null,'rate',0,6);
            //$data['products']['Lượt mua'] = $this->Products_model->listProducts(null,'buys',0,6);
            $data['products']['New'] = $this->Products_model->listProducts(null,null);
            $config['base_url'] = base_url('index.php/sanpham');
            $config['total_rows'] = count((array)$data['products']['New']);
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
            $data['products']['New'] = $this->Products_model->listProducts(null,null,$start,6);
        }
        
        $this->load->view('site/listsanpham', $data);
        $this->load->model('News_model');
        $listNews = $this->News_model->listNews(null,0,6);
        $this->load->view('site/common/footer', $data);
    }
    // load more product when user scroll down
    public function loadAjax() {
        $start = !empty($_REQUEST['start']) ? $_REQUEST['start'] : 0;
        $category_id = !empty($_REQUEST['category']) ? $_REQUEST['category'] : 1;
        $data['products'] = $this->Products_model->listProducts($category_id,null,$start,3);
        $this->load->view('site/listsanphamajax', $data);
    }
    // show detail a product
    // param $id: id of product 
    public function viewProduct($id) {
        if(isset($_REQUEST['comment'])) return $this->saveComment();
        $data['title'] = 'Sản phẩm';
        $data['active'] = 'sanpham';

        $this->load->model('Products_model');
        $this->load->model('Category_model');
        $this->load->model('Comment_model');

        if($data['product'] = $this->Products_model->getProducts($id))
            $data['product']->category_name = $this->Category_model->getNameCategory($data['product']->category_id);
        else show_404();
        $data['title'] = $data['product']->name;

        $data['product']->image = $this->Products_model->getImageProducts($id);
        $listCategory = $this->Category_model->getAllCategory();
        $data['product']->comments = $this->Comment_model->getComment($id);
        $this->load->view('site/common/header', $data);

        $this->load->view('site/category', ['category'=>$listCategory]);

        $this->load->view('site/sanpham', $data);
        //$this->load->model('News_model');
        //$listNews = $this->News_model->listNews(null,null,0,6);
        //$this->load->view('site/common/mainright', ['news'=>$listNews]);
        $this->load->view('site/common/footer', $data);

        if(!isset($_COOKIE['view_product_'.$id])) {
            $this->db->where('id', $id);
            $this->db->set('views', 'views+1', FALSE);
            $this->db->update('product');
            setcookie('view_product_'.$id,true,time()+15);
        }

	}
    // save comment and rate of product
    public function saveComment() {
        //echo '<pre>';var_dump($_REQUEST); echo '/<pre>';exit;
        $this->load->model('Comment_model');
        $this->load->model('Products_model');
        if(!empty($_REQUEST['comment']['product_id'])) {
            $data = array(
                'name' => $_REQUEST['comment']['name'],
                'content' => $_REQUEST['comment']['content'],
                'product_id' => $_REQUEST['comment']['product_id'],
                'rate' => (int) $_REQUEST['comment']['rate'],
            );
            $this->Comment_model->insertComment($data);
        }
        redirect($this->uri->uri_string());
    }
}

