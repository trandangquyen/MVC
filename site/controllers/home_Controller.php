<?php
// echo "đã import home_Controller";
class home_Controller extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index($link){
		$this->view->render($link,"");
	}
}
?>