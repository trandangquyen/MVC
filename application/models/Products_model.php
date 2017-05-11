<?php
include_once(__DIR__ .'/../libraries/function.php');
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
        $result = $query->result_array();

        if($result && !empty($result)) $result = formatPriceArr($result,'price');
        return $result;
	}
    public function getProducts($id) {
        $this->db->where("id",$id);
        $query=$this->db->get("product");
        if($result=$query->first_row()) return $result;
        return null;
    }
    public function getImageProducts($product_id) {
        $this->db->select("*");
        $this->db->where("product_id",$product_id);
        $query=$this->db->get("image");
        return $query->result_array();
    }
    public function deleteProducts($product_id) {
        $this->db->select("*");
        $this->db->where("id",$product_id);
        if($this->db->delete('product')) return true;
        return false;
    }
    public function insertProducts($data=array()) {
        if($this->db->insert('product', $data)) return true;
        return false;
    }
    public function updateProducts($data=array(),$product_id) {
        $this->db->set($data);
        $this->db->where('id', $product_id);
        $this->db->update('product'); 
        return false;
    }
}

?>