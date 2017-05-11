<?php 

class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Products_model');
	}
    function index() {
    	var_dump($this->Product_model->getAllProduct());
    }
    function addProduct() {
    	if(!empty($_POST['name']) && !empty($_POST['name'])) {
    		$data = array(
                'name' => '',
                'price' => '',
                'category_id' => '',
                'description' => '',
                'thumb' => '',
            );

    		$this->Product_model->addProduct($data);
    	}
    	
    	var_dump($this->Product_model->getAllProduct());
    }
    function updateProduct($id) {
    	$id = '';
    	$data = array(
			'name' => '',
			'price' => '',
            'category_id' => '',
            'description' => '',
			'thumb' => '',
    	);
    	$this->Product_model->updateProduct($data,$id);

    }
    function deteleProduct($id) {
    	$this->Product_model->deteleProduct($id);
    }
}

?>