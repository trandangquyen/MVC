<?php
// error_reporting(0);

define ('__SITE_PATH', "http://localhost/training/MVC/");
define ('__CONTROLLER_PATH',"site/controllers/");
define ('__VIEW_PATH',"site/views/");
define ('__MODEL_PATH',"site/models/");


$dotask = $_GET["todo"];

require_once(__CONTROLLER_PATH."load_Controller.php");

?>