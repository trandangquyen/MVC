<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct(){
          parent::__construct();
          $this->load->helper(array('url'));
//          $this->load->database();
//          $this->load->library('session');
     }
	public function index()
	{ 
        if(isset($_REQUEST['comment'])) return $this->saveComment();
        $data['title'] = 'Sản phẩm';
        $data['active'] = 'sanpham';

        

        $this->load->library('pagination');
        $this->load->model('Products_model');
        $this->load->model('Category_model');
        $this->load->model('Comment_model');
        $this->load->model('Support_model');


        $data['user'] = $this->session->userdata('login');
        $data['title'] = 'Danh sách sản phẩm';
        $data['active'] = 'home';
        $newProducts = $this->Products_model->listProducts(null,'null',0,9);


		//var_dump($newProducts);
        $data['newProducts'] = $newProducts;
        


        $data['comments'] = $this->Comment_model->getAllComment();
        //foreach ($data['comments'] as $comment) {
        for ($i=0;$i<count($data['comments']);$i++) {
            $product_id = $data['comments'][$i]['product_id'];
            $product_details = $this->Products_model->getProducts($product_id);
            $data['comments'][$i]['product_image'] = $product_details[0]['thumb'];
            //var_dump($data['comments'][$i]['product_image']);


        }
        //var_dump( $data['comments']);exit;

        $this->load->view('site/common/header', $data);


        //$this->load->view('site/common/mainleft', $data);
        $listCategory = $this->Category_model->getAllCategory();
        $support = $this->Support_model->getSupport();
        $this->load->model('News_model');
        $listNews = $this->News_model->listNews(null,0,6);
        $this->load->view('site/category', ['category'=>$listCategory, 'news'=>$listNews, 'comments'=>$data['comments'], 'support'=>$support]);


        $this->load->view('site/home', $data);
        
        $this->load->view('site/common/footer', $data);
	}
}


