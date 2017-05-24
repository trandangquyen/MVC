<?php 

class Support extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Support_model');
    }
    function index($data=null) {
        $data = $this->session->flashdata('data');
        $this->load->library('pagination');

        $data['support'] = $this->Support_model->getSupport();

        $config['base_url'] = base_url('/admin/hotro');
        $config['total_rows'] = count((array)$data['support']);
        $this->pagination->initialize($config);
        

        $data['active'] = 'support';
        $data['support'] = $this->Support_model->getSupport();
        //var_dump($data['support']);exit;
        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/hotro',$data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function updateSupport() {
      //var_dump($_POST['support']);exit;

        if(!empty($_POST['support'])) {
            if(empty($_POST['support']['namecompany'])) $data['error'] = 'Hãy điền tiên công ty';
            if(empty($_POST['support']['phone'])) $data['error'] = 'Hãy điền số điện thoại';
            else{
                $update = array(
                    'namecompany' => $_POST['support']['namecompany'],
                    'phone' => $_POST['support']['phone'],
                    'hotline' => $_POST['support']['hotline'],
                    'email' => $_POST['support']['email'],
                    'skype' => $_POST['support']['skype'],
                    'address' => $_POST['support']['address'],
                    'gioithieu' => $_POST['support']['gioithieu'],
                );
                if($id=$this->Support_model->updateSupport($update)) {
                    $data['success'] = 'Cập nhập tin tức thành công';
                    return $this->index($data);
                } else $data['error'] = 'Cập nhập tin tức thất bại';
            }
            //redirect('admin/support');
        }
        $data['support'] = $this->Support_model->getSupport();
        //var_dump($data['category']);exit;
        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/hotro.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
}

?>