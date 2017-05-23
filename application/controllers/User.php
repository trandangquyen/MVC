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
        $this->load->helper('email');
        $this->load->model('user_model');
        $this->load->library('session');
        //$this->load->library('facebook');
        $this->load->library('email');

    }
    public function saveNewPassword() {
        $data = null;
        $data['email']    = $this->input->get('email');
        $data['token']    = $this->input->get('token');
        $user = $this->user_model->getUser($data['email']);
        //var_dump($user);exit;
        if(empty($data['email'])) $data['error'] = 'Truy vấn không hợp lệ (email unknown)';
        else if(empty($data['token'])) $data['error'] = 'Truy vấn không hợp lệ (token unknown)';
        else if(!$user) $data['error'] = 'Email không tồn tại';
        else if($user['token_reset_pass'] != $data['token']) $data['error'] = 'Link reset không hợp lệ';
        else if($this->input->method() == 'post') {
            if(empty($this->input->post('password'))) $data['error'] = 'Hãy nhập mật khẩu mới';
            else {
                $token = $data['token'];
                $email = $data['email'];
                $password = $this->input->post('password');

                if($token==md5('MVC'.$email)) {
                    $update['password'] = md5($password);
                    $user = $this->user_model->updateUser($update,$email);
                    $data['message'] = 'Đã thiết lập lại mật khẩu';
                } else {
                    $data['error'] = 'Truy vấn không hợp lệ (token invalid)';
                }
            }
        }
        $this->load->view('site/setpass',$data);
    }
    public function forgotPassword() {
        $data=null;
        if($this->input->method() == 'post') {
            $email    = $this->input->post('email');
            if (!$email) $data['error'] = 'Hãy điền địa chỉ email mà bạn đã đăng ký';
            if (!valid_email($email)) $data['error'] = 'Email không hợp lệ';
            else {
                $user = $this->user_model->getUserByEmail($email);
                if(!$user) $data['error'] = 'Email không tồn tại';
                else {
                    $token = md5('MVC'.$email);
                    $update['token_reset_pass'] = $token;
                    $linkreset = base_url().'user/resetpass?email='.$email.'&token='.$update['token_reset_pass'];
                    $user = $this->user_model->updateUser($update,$email);
                    if($this->config->item('mail')) {
                        
                        /*$config['protocol'] = 'smtp';
                        $config['smtp_host'] ='ssl://smtp.gmail.com';
                        $config['smtp_port'] ='465';
                        $config['smtp_timeout'] ='30';
                        $config['smtp_user'] ='cdtd35a@gmail.com';
                        $config['smtp_pass'] ='tracdia35a';
                        $config['charset'] ='utf-8';
                        $config['newline'] ="\r\n";
                        $config['wordwrap'] = TRUE;
                        $config['mailtype'] = 'html';*/
                        $this->email->initialize($this->config->item('mail'));
                        $this->email->from('cdtd35a@gmail.com', 'Support');
                        $this->email->to('khoazero123@gmail.com');
                        $this->email->subject('Reset password for '.base_url());
                        $this->email->message('Click <a href="'.$linkreset.'">here</a> to reset your password ('.$linkreset.')');
                        //$this->email->send();
                        //echo $this->email->print_debugger();

                        if (!$this->email->send()) {
                            echo $this->email->print_debugger();
                            $data['error'] = 'Không thể gửi email reset password';
                        } else {
                            $data['message'] = 'Đã gửi link reset qua email: '.$email.'';
                        }
                    } else $data['error'] = 'Cần thiết lập cấu hình send mail in config.php';
                }
            }
        }
        $this->load->view('site/forgotpass',$data);
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
/*//        Facebook login
        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        } else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('user/logout'); // Logs off application
            // OR
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('home'),
                'scope' => array("email") // permissions here
            ));
        }
//        End facebook login*/
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
                //redirect();//chuyen toi trang chure
                if($user['admin']==1) redirect('admin');
            } else {
                $data['error'] = 'Đăng nhập ko thành công';
            }
        }
        //var_dump($this->data);exit;
        //gui du lieu sang view
//        $this->data['temp'] = 'site/user/login';
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
// xoa session face book
            $this->facebook->destroySession();
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


