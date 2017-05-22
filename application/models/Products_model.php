<?php
class Products_model extends CI_Model
{
    private $table = 'product';
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
        $this->load->helper('functions');
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
	public function search($keyword,$order=null,$offset=0,$limit=0) {
		$this->db->select("*");

        $this->db->like('name', $keyword);
        $this->db->or_like('description', $keyword);

        if($limit) $this->db->limit($limit,$offset);
        $query=$this->db->get("product");
        $result = $query->result_array();
        return $result;
	}
    public function getProduct($id,$array=false) {
        $this->db->where("id",$id);
        $query=$this->db->get("product");
        if($array) $result=$query->first_row()->row();
        else $result=$query->first_row();
        if($result) return $result;
        return null;
    }
    public function getProducts($ids) {
        $this->db->where_in("id",$ids);
        $query=$this->db->get("product");
        $result=$query->result_array();
        if($result) return $result;
        return null;
    }
    public function addImageProducts($data) { 
        if($this->db->insert_batch('image', $data)) return true;
        return false;
    }
    public function getImageProducts($product_id) {
        $this->db->select("*");
        $this->db->where("product_id",$product_id);
        $query=$this->db->get("image");
        return $query->result_array();
    }
    public function deleteProduct($product_id) {
        $this->db->where("id",$product_id);
        if($this->db->delete('product')) return true;
        return false;
    }
    public function deleteProducts($array_id) {
        $this->db->where_in("id",$array_id);
        if($this->db->delete('product')) return true;
     
        return false;
    }
    public function addProduct($data=array()) {
        if($this->db->insert('product', $data)) return $this->db->insert_id();
        return false;
    }
    public function updateProduct($data=array(),$product_id) {
        $this->db->set($data);
        $this->db->where('id', $product_id);
        if($this->db->update('product')) return true;
        return false;
    }
}

?>