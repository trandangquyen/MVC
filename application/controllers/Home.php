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
        $data['user'] = $this->session->userdata('login');
        $data['title'] = 'Danh sách sản phẩm';
        $data['active'] = 'home';
        $newProducts = $this->Products_model->listProducts(null,'null',0,10);


		//var_dump($newProducts);
        $data['newProducts'] = $newProducts;


        $this->load->view('site/common/header', $data);


        //$this->load->view('site/common/mainleft', $data);
        $listCategory = $this->Category_model->getAllCategory();

        $this->load->model('News_model');
        $listNews = $this->News_model->listNews(null,0,6);
        $this->load->view('site/category', ['category'=>$listCategory, 'news'=>$listNews]);


        $this->load->view('site/home', $data);
        
        $this->load->view('site/common/footer', $data);
	}
}


