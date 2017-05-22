<?php
class Support_model extends CI_Model
{
    private $table = 'support';
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getSupport() {
        $query=$this->db->get($this->table);
        if($result=$query->first_row()) return $result;
        return null;
    }
    public function updateSupport($data=array()) {
        $this->db->set($data);
        $this->db->update($this->table); 
        return true;
    }
}

?>