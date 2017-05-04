<?php
class Products_model extends CI_Model
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
	public function listProducts($category=null,$limit=0){
		$this->db->select("*");
        if($category) $this->db->where("category_id",$category);
        $this->db->order_by("name desc");
        if($limit) $this->db->limit($limit,0);
        $query=$this->db->get("product");
        return $query->result_array();
	}
	public function searchProducts($parent){
		
	}
}

?>