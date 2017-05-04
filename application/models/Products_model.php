<?php
class Products_model extends CI_Model
{
	public function __construct()
    {
        $this->load->database();
    }
	public function getList(){
		echo "Hello ta la Alibaba";

	}
}

?>