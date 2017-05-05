<?php
class Products_model extends CI_Model
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
	public function listProducts($category=null,$order=null,$offset=0,$limit=0) {
		$this->db->select("*");
        if($category) $this->db->where("FIND_IN_SET(".$category.",category_id) !=", 0);

        switch ($order) {
            case 'views':
                $this->db->order_by("views desc");
                break;
            case 'buys':
                $this->db->order_by("buys desc");
                break;
            case 'rate':
                $this->db->order_by("rate desc");
                break;
            default:
                $this->db->order_by("id desc");
                break;
        }

        if($limit) $this->db->limit($limit,$offset);
        $query=$this->db->get("product");
        //echo $this->db->last_query().'<br/>';
        return $query->result_array();
	}
    public function getProducts($id) {
        $this->db->where("id",$id);
        $query=$this->db->get("product");
        if($result=$query->first_row()) return $result;
        return null;
    }
}

?>