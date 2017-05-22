<?php
class Comment_model extends CI_Model
{
    private $table;
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
        $this->table = 'comment';
    }
    public function index() {
        
    }
	public function getComment($product_id) {
        $this->db->select("*");
        $this->db->where("product_id",$product_id);
        $this->db->order_by("id desc");
        $query=$this->db->get($this->table);
        return $query->result_array();
	}
    public function getAllComment() {
        $this->db->select("*");
        $this->db->order_by("id desc");
        $query=$this->db->get($this->table);
        return $query->result_array();
    }
	public function deleteComment($comment_id) {
        $this->db->where("id",$comment_id);
        if($this->db->delete($this->table)) return true;
        return false;
	}
    public function insertComment($data=array()) {
        if($this->db->insert($this->table, $data)) {
            $this->load->model('Products_model');

            $sql = "SELECT avg(rate) as avgrate from ".$this->table." where product_id = '".$data['product_id']."'";
            $query = $this->db->query($sql);
            if($avgRate = $query->first_row()) {
                $avgRate = $avgRate->avgrate;
                $this->Products_model->updateProduct(['rate'=>$avgRate],$data['product_id']);
            }
            return true;
        }
        return false;
    }
}

?>