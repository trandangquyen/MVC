<?php 

class Comment extends Auth_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Comments_model');
	}
    function index($data=null) {
    	var_dump($this->Comment_model->getAllComment());
    }
    function deteleComment($id) {
    	if($this->Comment_model->deteleComment($id)) $data['success'] = 'Xóa tin tức thành công';
        else $data['error'] = 'Xóa tin tức thất bại';
        return $this->index($data);
    }
}

?>