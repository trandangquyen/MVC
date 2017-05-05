<?php
class Tintuc_model extends CI_Model
{
    private $table = 'baiviet';
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
	public function getAllNews(){
        $this->db->select("*");
        //$this->db->where("parent",null);
        $this->db->order_by("MaBV desc");
        //$this->db->limit(1,0);
        $query=$this->db->get($this->table);
        return $query->result_array();
	}
	public function deleteTintuc($Tintuc_id) {
        $this->db->where("MaBV",$Tintuc_id);
        if($this->db->delete($this->table)) return true;
        return false;
	}
       public function insertTintuc($data = array()) {
        if ($this->db->insert($this->table, $data))
            return true;
        return false;
    }
}

?>