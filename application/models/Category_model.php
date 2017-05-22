<?php
class Category_model extends CI_Model
{
    private $table = 'category';
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
        $query=$this->db->get($this->table);
        return $query->result_array();
	}
    public function getSubCategory($parent){
        $this->db->select("*");
        $this->db->where("parent",$parent);
        $this->db->order_by("name desc");
        $query=$this->db->get($this->table);
        return $query->result_array();
    }
    public function getCategory($id){
        $this->db->select("*");
        $this->db->where("id",$id);
        $query=$this->db->get($this->table);
        if($result=$query->first_row()) return $result;
        return null;
    }
	public function getAllCategory() {
		$mainCategory = $this->getMainCategory();
        foreach ($mainCategory as $i => $value) {
            $mainCategory[$i]['data'] = $this->getSubCategory($value['id']);
        }
        return $mainCategory;
	}
    public function getNameCategory($ids) {
        $data = null;
        foreach (explode(',', $ids) as $id) {
            $this->db->where("id",$id);
            $query = $this->db->get($this->table);
            if($result = $query->first_row()) $data[$id] = $result->name;
        }
        return $data;
        /*$this->db->where("id",$id);
        $query=$this->db->get("category");
        if($result=$query->first_row()) return $result->name;
        return null;*/
    }
    public function addCategory($data=array()) {
        if($this->db->insert($this->table, $data)) return true;
        return false;
    }
    public function deleteCategory($id) {
        $this->db->where("id",$id);
        if($this->db->delete($this->table)) return true;
        return false;
    }
    public function updateCategory($data=array(),$id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        if($this->db->update($this->table)) return true;
        return false;
    }
}

?>