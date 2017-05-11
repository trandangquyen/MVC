<?php 

class Comment extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Comments_model');
	}
    function index() {
    	var_dump($this->Comment_model->getAllComment());
    }
    function deteleComment($id) {
    	$this->Comment_model->deteleComment($id);
    }
}

?>