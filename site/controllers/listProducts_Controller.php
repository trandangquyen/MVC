<?php
// echo "đã import listProducts_Controller";
class listProducts_Controller extends Controller{
	public function __construct(){
		parent::__construct();
		// echo "<br>da khoi tao doi tuong listProducts_Controller ";
	}
	public function index($link){
		$this ->model->loadModel($link);
		
		$objModel = $link."_Model";
		$product = new $objModel;
		$url = $product ->loadProducts();
		$this ->view->render($link,$url);
	}
}
?>