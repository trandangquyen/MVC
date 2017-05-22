<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->library('session');

    }

//    public function index()
//    {
//        $this->load->view('site/login');
//    }
    /*
    * Kiem tra dang nhap
    */
    public function check_login()
    {
        //lay du lieu tu form
        $username    = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $where = array('name' => $username, 'password' => $password);
        if(!$this->user_model->check_exists($where))
        {
            $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập không thành công');
            return FALSE;
        }
        return true;
    }

    /*
    * Phuong thuc dang nhap
    */
    public function login()
    {
        //kiem tra xem thanh vien da dang nhap hay chua
        if($this->_user_is_login())
        {
            //chuyen trang
            redirect();
        }

        //load thu vien validation
        $this->load->library('form_validation');
        $this->load->helper('form');

        //tao cac tap luat
        $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required');
        $this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_login');

        if($this->form_validation->run())
        {
            $username    = $this->input->post('username');
            $password = $this->input->post('password');
            $password = md5($password);
            $where = array('name' => $username, 'password' => $password);
            $user = $this->user_model->get_info_rule($where);
            $this->session->set_userdata('login', $user);
            $this->session->set_flashdata('flash_message', 'Đăng nhập thành công');
//            echo $this->session->flashdata('flash_message');
            redirect();//chuyen toi trang chu
        }

        //gui du lieu sang view
        $this->data['temp'] = 'site/user/login';
        $this->load->view('site/login', $this->data);
    }

    /*
    * Phuong thuc dang xuat
    */
    public function logout()
    {
        if($this->_user_is_login())
        {
            //neu thanh vien da dang nhap thi xoa session login
            $this->session->unset_userdata('login');
        }
        $this->session->set_flashdata('flash_message', 'Đăng xuất thành công');
        redirect();
    }

    /*
     * Kiểm tra đã đăng nhập hay chưa
    */
    private function _user_is_login()
    {
        $user_data = $this->session->userdata('login');
        //neu chua login
        if(!$user_data)
        {
            return false;
        }
        return true;
    }
}


