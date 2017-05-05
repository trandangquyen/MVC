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
    public function getNameCategory($ids) {
        $data = null;
        foreach (explode(',', $ids) as $id) {
            $this->db->where("id",$id);
            $query = $this->db->get("category");
            if($result = $query->first_row()) $data[] = $result->name;
        }
        return $data;
        /*$this->db->where("id",$id);
        $query=$this->db->get("category");
        if($result=$query->first_row()) return $result->name;
        return null;*/
    }
}

?>