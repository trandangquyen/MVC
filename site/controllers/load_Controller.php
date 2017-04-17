<?php

include_once (__VIEW_PATH."load_view.php");
include_once (__MODEL_PATH."load_Model.php");

if(isset($link))
{
	include_once (__CONTROLLER_PATH.$link."_Controller.php");
}else{
	$link = "home";
	include_once (__CONTROLLER_PATH.$link."_Controller.php");
}
class Controller{
	public $view;
	public $model;
	public function __construct(){
		$this->view = new View;
		$this->model = new Model;
	}
}

$goPage = $link."_Controller";

$object = new $goPage;
$object ->index($link);

?>