<?php
// echo "đã import about_Controller";
class about_Controller extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index($link){
		$this->view->render($link,"");
	}
}
?>