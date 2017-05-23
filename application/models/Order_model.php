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
    /**
     * get order from db
     * @param  int $id
     * @return array
     */
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
    /**
     * get order details, use for function getOrder
     * @param  int $order_id
     * @return array
     */
    public function getOrderDetails($order_id) {
        $this->db->select("product_id, quantity");
        $this->db->where("order_id",$order_id);
        $query=$this->db->get($this->table_order_details);
        if($query->num_rows()>0) return $query->result_array();
        return null;
    }
    public function getOrderUser($user_id) {
        //$this->db->select("product_id, quantity");
        $this->db->where("user",$user_id);
        $query=$this->db->get($this->table);
        if($query->num_rows()>0) {
            $listOrders = $query->result_array();
            return $listOrders;
        }
        return null;
    }
    /**
     * [createOrder insert cart to order table]
     * @param  $data array(
                            'order' => [
                                'user' => int,
                                'price' => float,
                                'ship_name' => string,
                                'ship_phone' => string,
                                'ship_address' => string,
                                'ship_note' => string,
                                'payment' => string,
                                'transport' => string,
                            ],
                            'order_details' => array('product_id'=>int,'quantity'=>int),
                        );
     * @return int order id if insert success
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