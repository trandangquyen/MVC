<?php
class Comment_model extends CI_Model
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
	public function getComment($product_id){
        $this->db->select("*");
        $this->db->where("product_id",$product_id);
        $this->db->order_by("id desc");
        //$this->db->limit(1,0);
        //$query=$this->db->get("category");
        return $query->result_array();
	}
	public function deleteComment($comment_id) {
		$this->db->select("*");
        $this->db->where("id",$comment_id);
        if($this->db->delete('comment')) return true;
        return false;
	}
    public function insertComment($data=array()) {
        if($this->db->insert('comment', $data)) return true;
        return false;
    }
}

?>