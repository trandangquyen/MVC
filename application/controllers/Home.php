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
     }

	public function index($page = 'home') {
		
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['active'] = 'trangchu';
        $this->load->view('site/common/header', $data);
        $this->load->model('Category_model');
        $listCategory = $this->Category_model->getAllCategory();
        $this->load->view('site/theloai', ['category'=>$listCategory]);
        $this->load->view('site/home', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
	}
}

