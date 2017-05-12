<?php 

class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
	}
    function index($data=null) {
    	//var_dump($this->Category_model->getAllCategory());
        $this->load->view();
    }
    function addCategory() {
    	if(!empty($_POST['name'])) $data['error'] = 'Hãy điền tên thể loại';
        else {
    		$data = array(
    			'name' => $_POST['name'],
    			'description' => $_POST['description'],
    			'parent' => (int)$_POST['parent'],
    		);

    		$this->Category_model->addCategory($data);
            $data['success'] = 'Thêm thể loại thành công';
    	}
    	//var_dump($this->Category_model->getAllCategory());
        return $this->index($data);
    }
    function updateCategory($id) {
    	$id = '';
    	$data = array(
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'parent' => (int)$_POST['parent'],
    	);
    	$this->Category_model->updateCategory($data,$id);
        return $this->index($data);
    }
    function deteleCategory() {
        if(!isset($_POST['categorys'])) $data['error'] = 'Không thể xác định thể loại';
        elseif(is_array($_POST['categorys'])) {
            foreach ($_POST['categorys'] as $id) {
                $this->Category_model->deteleCategory($id);
            }
            $data['success'] = 'Xóa các thể loại thành công';
        } else if($this->Category_model->deteleCategory($_POST['categorys'])) $data['success'] = 'Xóa thể loại thành công';
        else $data['error'] = 'Xóa thể loại thất bại';

        return $this->index($data);
    }
}

?>