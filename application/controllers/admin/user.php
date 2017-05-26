<?php 

class User extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url','isAdmin');
        $this->load->database();
	}
    function index($data=null) {
        $data = $this->session->flashdata('data');
        $data['users'] = $this->User_model->listUser();
        $data['active'] = 'user';

        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/user.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);

    }
    
    function updateUser($id) {
        if(!empty($_POST['user'])) {
            $update = array(
                'name' => $_POST['user']['name'],
                'email' => $_POST['user']['email'],
                'admin' => (isset($_POST['user']['admin']) && (int)$_POST['user']['admin']==1) ? 1 : 0,
            );
            if($this->User_model->updateUser($update,$id)) $data['success'] = 'Cập nhập người dùng thành công';
            else $data['error'] = 'Cập nhập người dùng thất bại: '.$this->db->last_query();


        }
        $data['user'] = $this->User_model->getUser($id);
        
        $data['title'] = 'Cài đặt người dùng '.$data['user']['name'];
        $data['active'] = 'user';

        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/edituser.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function deteleUser($id=null) {
        $data = null;
        if($id) {
        	if($this->User_model->deleteUser($id)) $data['success'] = 'Xóa người dùng thành công';
            else $data['error'] = 'Xóa người dùng thất bại';
        } else if(!empty($_POST['delete'])) {
            foreach ($_POST['delete'] as $key => $value) {

                $ids[] = (int) $value;

            }
            if($this->User_model->deleteUser($ids))
                $data['success'] = 'Xóa các người dùng thành công';
            else $data['error'] = 'Xóa các người dùng thất bại';
        }
        $this->session->set_flashdata('data', $data);
        redirect('admin/user');
    }
}

?>