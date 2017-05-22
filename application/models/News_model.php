<?php
class News_model extends CI_Model
{
    private $table = 'news';
	public function __construct() {
    	parent::__construct();
        $this->load->database();
    }
	public function listNews($order=null,$offset=0,$limit=0) {
		$this->db->select("*");
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
        $query=$this->db->get($this->table);
        //echo $this->db->last_query()."\n";
        return $query->result_array();
	}
    public function getNews($id) {
        $this->db->where("id",$id);
        $query=$this->db->get($this->table);
        if($result=$query->first_row()) return $result;
        return null;
    }
    public function getRelatedNews($id) {
        $this->db->where("id <>",$id);
        $this->db->order_by('rand()');
        $this->db->limit(2); 
        $query=$this->db->get($this->table);
        if($result=$query->result_array()) return $result;
        return null;
    }
    public function deleteNews($id) {
        if(is_array($id)) $this->db->where_in("id",$id);
        else $this->db->where("id",$id);
        if($this->db->delete($this->table)) return true;
        return false;
    }
    public function insertNews($data=array()) {
        if($this->db->insert($this->table, $data)) return true;
        return false;
    }
    public function updateNews($data=array(),$news_id) {
        $this->db->set($data);
        $this->db->where('id', $news_id);
        $this->db->update($this->table); 
        return false;
    }
}

?>