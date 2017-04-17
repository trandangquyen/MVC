<?php
// echo "đã import login_Controller";
class login_Controller extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index($link){
		$this->view->render($link,"");
	}
}
?>