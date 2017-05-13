<?php 

class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
	}
    function index($data=null) {
        if(!empty($_POST['delete'])) return $this->deteleCategory();
        $this->load->library('pagination');

        $data['categorys'] = $this->Category_model->getAllCategory();

        $config['base_url'] = base_url('/admin/category');
        $config['total_rows'] = count((array)$data['categorys']);
        $config['per_page'] = 6;
        $config['use_page_numbers'] = true;
        $config['page_query_string'] = TRUE; 
        $config['first_url'] = site_url('/admin/category');
        $config['first_link'] = 'Trang đầu';
        $config['last_link'] = 'Trang cuối';
        $this->pagination->initialize($config);
        $page = (int)$this->input->get('per_page', TRUE);
        if($page<1) $page = 1;
        $start = ($page-1)*$config['per_page'];

        $data['active'] = 'category';
    	$data['categorys'] = $this->Category_model->getAllCategory();
        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/category',$data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function addCategory() {
        if(!empty($_POST['category'])) {
            if(empty($_POST['category']['name'])) $data['error'] = 'Hãy điền tên thể loại';
            else { 
                $insert = array(
                    'name' => $_POST['category']['name'],
                    'parent' => @implode(',',$_POST['category']['perent']),
                    'description' => $_POST['category']['description'],
                );
                if($id=$this->Category_model->addCategory($insert)) {
                    $data['success'] = 'Thêm thể loại thành công';
                    return $this->index($data);
                } else $data['error'] = 'Thêm thể loại thất bại';
            }
        }
        $data['active'] = 'category';
        $data['categorys'] = $this->Category_model->getAllCategory();
        //var_dump($data['categorys']);exit;

        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/addcategory.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function updateCategory($id) {
    	if(!empty($_POST['category'])) {
            if(empty($_POST['category']['name'])) $data['error'] = 'Hãy điền tên thể loại';
            else { 
                $update = array(
                    'name' => $_POST['category']['name'],
                    'parent' => (int)$_POST['category']['perent'],
                    'description' => $_POST['category']['description'],
                );
                if($this->Category_model->updateCategory($update,$id)) {
                    $data['success'] = 'Cập nhập thể loại thành công';
                } else $data['error'] = 'Cập nhập thể loại thất bại';
            }
        }
    	$data['category'] = $this->Category_model->getCategory($id);
        $data['categorys'] = $this->Category_model->getAllCategory();
        //var_dump($data['category']);exit;
        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/editcategory.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function deteleCategory($id=null) {
        $data = null;
        if($id) {
            if($this->Category_model->deleteCategory($id)) $data['success'] = 'Xóa thể loại thành công';
            else $data['error'] = 'Xóa thể loại thất bại';
        } else if(!empty($_POST['delete'])) {
            foreach ($_POST['delete'] as $key => $value) {
                $ids[] = (int) $value;
            }
            if($this->Category_model->deleteCategory($ids))
                $data['success'] = 'Xóa các thể loại thành công';
            else $data['error'] = 'Xóa các thể loại thất bại';
        }
        unset($_POST['delete']);
        return $this->index($data);
    }
}

?>