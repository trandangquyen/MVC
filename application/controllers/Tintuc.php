<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tintuc extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Tintuc_model');
    }

    public function list_view() {

        $data['news'] = $this->Tintuc_model->getAllNews();
        //print_r($data);exit;
        $data['title'] = ucfirst("Danh sách bài viết"); // Capitalize the first letter

        $this->load->view('site/common/header', $data);
        $this->load->view('site/common/mainleft', $data);
        $this->load->view('tintuc/list', $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
    }

    public function deleteTintuc($Tintuc_id) {
        $this->Tintuc_model->deleteTintuc($Tintuc_id);
    }

    public function insertTintuc($data = array()) {
        $data['TenBV'] = 'test';
        $data['Content'] = 'test';
        $this->Tintuc_model->insertTintuc($data);
          
    }

    public function details($id) {
        $data = null;
        $this->load->view('site/common/header', $data);
        $this->load->view('site/common/mainleft', $data);
        $this->load->view("tintuc/details", $data);
        $this->load->view('site/common/mainright', $data);
        $this->load->view('site/common/footer', $data);
    }

}
