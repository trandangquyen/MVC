<?php
class Category_model extends CI_Model
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
	public function getMainCategory(){
        $this->db->select("*");
        $this->db->where("parent",null);
        $this->db->order_by("name desc");
        //$this->db->limit(1,0);
        $query=$this->db->get("category");
        return $query->result_array();
	}
	public function getSubCategory($parent){
		$this->db->select("*");
        $this->db->where("parent",$parent);
        $this->db->order_by("name desc");
        $query=$this->db->get("category");
        return $query->result_array();
	}
}

?>