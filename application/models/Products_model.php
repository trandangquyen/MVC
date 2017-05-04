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
        if($category) $this->db->where("FIND_IN_SET(".$category.",category_id) !=", 0);
        $this->db->order_by("name desc");
        if($limit) $this->db->limit($limit,0);
        $query=$this->db->get("product");
        return $query->result_array();
	}
    public function getProducts($id) {
        $this->db->where("id",$id);
        $query=$this->db->get("product");
        if($result=$query->first_row()) return $result;
        return null;
    }
	public function customList($type=null) {
		switch ($type) {
            case 'xemnhieunhat':
                # code...
                break;
            case 'muanhieunhat':
                # code...
                break;
            case 'danhgiacao':
                # code...
                break;
            
            default:
                # code...
                break;
        }
	}
}

?>