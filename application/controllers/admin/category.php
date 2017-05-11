<?php 

class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
	}
    function index() {
    	var_dump($this->Category_model->getAllCategory());
    }
    function addCategory() {
    	if(!empty($_POST['name']) && !empty($_POST['name'])) {
    		$data = array(
    			'name' => '',
    			'description' => '',
    			'parent' => '',
    		);

    		$this->Category_model->addCategory($data);
    	}
    	
    	var_dump($this->Category_model->getAllCategory());
    }
    function updateCategory($id) {
    	$id = '';
    	$data = array(
			'name' => '',
			'description' => '',
			'parent' => '',
    	);
    	$this->Category_model->updateCategory($data,$id);

    }
    function deteleCategory($id) {
    	$this->Category_model->deteleCategory($id);
    }
}

?>