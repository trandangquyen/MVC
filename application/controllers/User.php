<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
        //load thu vien validation
        $this->load->library('form_validation');
        $this->load->helper('form');
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
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        $where = array('email' => $email, 'password' => $password);
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
        $data = null;

        //kiem tra xem thanh vien da dang nhap hay chua
        if($this->_user_is_login())
        {
            //chuyen trang
            redirect();
        }
        if($this->input->post('dologin')) {
            //tao cac tap luat
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required');
            $this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_login');

            if($this->form_validation->run())
            {
                $email    = $this->input->post('email');
                $password = $this->input->post('password');
                $password = md5($password);
                $where = array('email' => $email, 'password' => $password);
                $user = $this->user_model->get_info_rule($where);
                $this->session->set_userdata('login', $user);
                $this->session->set_flashdata('flash_message', 'Đăng nhập thành công');
                $data['message'] = 'Đăng nhập thành công';
                $data['redirect'] = base_url();
                //redirect();//chuyen toi trang chu
            } else {
                $data['error'] = 'Đăng nhập ko thành công';
            }
        }
        //var_dump($this->data);exit;
        //gui du lieu sang view
        $this->data['temp'] = 'site/user/login';
        $this->load->view('site/login', $data);
    }

    /*
    * Phuong thuc dang xuat
    */
    public function logout()
    {
        if($this->_user_is_login())
        {
            //xoa session login
            $this->session->unset_userdata('login');
            $this->session->unset_userdata('cart');
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
        if(!$user_data)
        {
            return false;
        }
        return true;
    }
    /*
 * Kiểm tra email đã tồn tại hay chưa
 */
    function check_email()
    {

        $email = $this->input->post('remail');
        $where = array();
        $where['email'] = $email;
        if($this->user_model->check_exists($where))
        {
            $this->form_validation->set_message(__FUNCTION__, 'Email đã sử dụng');
            return FALSE;
        }
        return TRUE;
    }

    /*
    * Phuong thuc dang ky thanh vien
    */
    public function register()
    {
        $this->form_validation->set_rules('remail', 'Email', 'required|valid_email|callback_check_email');
        $this->form_validation->set_rules('rname', 'Họ và tên', 'required|min_length[8]');
        $this->form_validation->set_rules('rpass', 'Mật khẩu', 'required|min_length[6]|numeric');
        $this->form_validation->set_rules('rrepass', 'Nhập lại mật khẩu', 'required|matches[rpass]');

        if($this->form_validation->run())
        {
            $data = array(
                'name'     => $this->input->post('rname'),
                'email'    => $this->input->post('remail'),
                'password' => md5($this->input->post('rpass')),

            );
            if($this->user_model->create($data))
            {
                $this->session->set_flashdata('flash_message', 'Dang ky thanh vien thanh cong');
                redirect();
            }
        }
        //gui du lieu sang view
        $this->load->view('site/login');
    }
}


