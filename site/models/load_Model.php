<?php
// echo " đã import file load_Model <br /> ";

Class Model {
	
	public function loadModel($link,$noInclude=""){
		if($noInclude == "")
		{
			require_once(__MODEL_PATH.$link."_Model.php");

		}
		
	}
	
}

?>