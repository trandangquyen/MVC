<?php
/**
 * Author: khoazero123@gmail.com
 */
class Order_model extends CI_Model
{
    private $table = 'order';
    private $table_order_details = 'order_details';
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    public function getOrder($id) {
        $this->db->where("id",$id);
        $query = $this->db->get($this->table);
        if($query->num_rows()>0) {
            $order = $query->row_array();
            $order['details'] = $this->getOrderDetails($id);
            return $order;
        }
        return null;
    }

    public function getOrderDetails($order_id) {
        $this->db->select("product_id, quantity");
        $this->db->where("order_id",$order_id);
        $query=$this->db->get($this->table_order_details);
        if($query->num_rows()>0) return $query->result_array();
        return null;
    }
    /**
     * [createOrder description]
     * @param  array  $data array(
     *                            'user'=>int,
     *                            'price'=>float
     *                            'products'=> [
     *                                'id' => int,
     *                                'quantity'=>int
     *                            ])
     * @return [type]       [description]
     */
    public function createOrder($data=array()) {
        //echo '<pre>';var_dump($data);echo '</pre>';
        if($this->db->insert($this->table, $data['order'])) {
            $order_id = $this->db->insert_id();
            $i=0;
            foreach ($data['order_details'] as $id => $quantity) {
            //for ($i=0;$i<count($data['products']);$i++) {
                $insert[$i]['order_id'] = $order_id;
                $insert[$i]['product_id'] = $id;
                $insert[$i]['quantity'] = $quantity;
                $i++;
            }
            if($this->db->insert_batch($this->table_order_details, $insert)) return $order_id;
        }
        return false;
    }
}

?>