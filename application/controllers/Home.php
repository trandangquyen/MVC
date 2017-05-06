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
	public function index($page = 'site/home')
	{
        $this->load->model('Products_model');
        $this->load->model('Category_model');
		if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('site/common/header', $data);
        $this->load->view('site/common/mainleft', $data);
        if($category) {
            $name = $this->Category_model->getNameCategory($category);
            if(!$name) show_404();
            echo $name;
            $data['products'][$name] = $this->Products_model->listProducts($category);
            $config['base_url'] = base_url('index.php/theloai');
            if($category) $config['base_url'] .= '/'.$category;
            //$config['base_url'] .= '/page';
            //$config['total_rows'] = $this->db->query("select id from product")->num_rows();
            $config['total_rows'] = count((array)$data['products'][$name]);
            //echo $config['total_rows']."<br>";
            $config['per_page'] = 6;
            $config['use_page_numbers'] = true;
            $config['page_query_string'] = TRUE;
            //$config['suffix'] = '.html';
            $config['first_url'] = site_url('index.php/theloai/'.$category);
            $config['first_link'] = 'Trang d?u';
            $config['last_link'] = 'Trang cu?i';
            $this->pagination->initialize($config);
            $page = (int)$this->input->get('per_page', TRUE);
            if($page<1) $page = 1;
            $start = ($page-1)*$config['per_page'];
            $data['products'][$name] = $this->Products_model->listProducts($category,null,$start,$config['per_page']);
        } else {
            $data['products']['Xem nhi?u nh?t'] = $this->Products_model->listProducts(null,'views',0,6);
            $data['products']['Ðánh giá cao nh?t'] = $this->Products_model->listProducts(null,'rate',0,6);
            $data['products']['Lu?t mua'] = $this->Products_model->listProducts(null,'buys',0,6);

        }
        $this->load->view($page, $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
	}
}


