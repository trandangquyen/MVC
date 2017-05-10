<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tintuc extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('News_model');
		$this->load->model('Category_model');
	}

	// load list news 
	public function index() {
		$data['title'] = 'Tin tức';
		$data['active'] = 'tintuc';
		$this->load->view('site/common/header', $data);
		//$this->load->view('site/common/mainleft', $data);
        $listCategory = $this->Category_model->getAllCategory();
        $this->load->view('site/category', ['category'=>$listCategory]);

        $data['news'] = $this->News_model->listNews(null,0,6);

        $this->load->view('site/tintuc/list',$data);        
        // $this->load->model('News_model');
        $listNews = $this->News_model->listNews(null,0,6);
        $this->load->view('site/common/mainright', ['news'=>$listNews]);
        $this->load->view('site/common/footer', $data);
	}

	public function deleteTintuc($id) {
		//echo "Delete $id";
	}

	/**
	 * Print detail of news
	 *
	 * @param	int	$id	  id of news
	*/
	public function details($id) {
		$data['news'] = $this->News_model->getNews($id);
        if($data['news']) {
        	$data['title'] = $data['news']->title;
        	$data['news']->related = $this->News_model->getRelatedNews($id);
        	//var_dump($data['news']->related);exit;
        }

		$this->load->view('site/common/header', $data);
        $listCategory = $this->Category_model->getAllCategory();
        $this->load->view('site/category', ['category'=>$listCategory]);



        $this->load->view("site/tintuc/details",$data);        
        //$this->load->model('News_model');
        $listNews = $this->News_model->listNews(null,0,6);
        $this->load->view('site/common/mainright', ['news'=>$listNews]);
        $this->load->view('site/common/footer', $data);
	}
	public function loadAjax() {
		//var_dump($_REQUEST);exit;
        $start = !empty($_REQUEST['start']) ? $_REQUEST['start'] : 0;
        //echo "Start at $start\n";
        $data['news'] = $this->News_model->listNews(null,$start,6);
        $this->load->view('site/tintuc/listtintucajax', $data);
    }
	
}
