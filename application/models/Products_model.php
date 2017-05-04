<?php
class Products_model extends CI_Model
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
	public function listProducts($category=null){
		$this->db->select("*");
        if($category) $this->db->where("category",$category);
        $this->db->order_by("name desc");
        //$this->db->limit(1,0);
        $query=$this->db->get("product");
        return $query->result_array();
	}
	public function searchProducts($parent){
		
	}
}

?>