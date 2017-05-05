<?php
class Contact_model extends CI_Model
{
    private $table;
	public function __construct()
    {

    	parent::__construct();
        $this->load->database();
        $this->table = 'contact';
    }
	public function getContact($product_id){
        $this->db->select("*");
        $this->db->where("product_id",$product_id);
        $this->db->order_by("id desc");
        //$this->db->limit(1,0);
        $query=$this->db->get($this->table);
        return $query->result_array();
	}
	public function deleteContact($comment_id) {
		$this->db->select("*");
        $this->db->where("id",$comment_id);
        if($this->db->delete($this->table)) return true;
        return false;
	}
    public function insertContact($data=array()) {
        if($this->db->insert($this->table, $data)) return true;
        return false;
    }
}

?>