<?php
class Cart_model extends CI_Model
{
    private $table = 'cart';
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
    /**
     * UPDATE: unnecessary
     * 
     * [deleteCart description]
     * @param  [type]  $user_id    [description]
     * @param  mixed $product_id    if set -> delete only product in cart, else delete entry cart
     * @return boolean              true if delete success
     */
    public function deleteCart($user_id,$product_id=false) {
        $this->db->where("user_id",$user_id);
        if(is_array($product_id)) $this->db->where_in("product_id",$product_id);
        else if($product_id) $this->db->where("product_id",$product_id);
        if($this->db->delete($this->table)) return true;
        return false;
    }

    /**
     * [updateCart      insert/update cart to database]
     * @param  int      $user_id
     * @param  array    $cart       array(['product_id'=>'quantity'])
     * @return void
     */
    public function updateCart($user_id,$cart) {
        $debug = null;
        $this->db->select("*");
        $this->db->where("user_id",$user_id);
        $query=$this->db->get($this->table);
        if($query->num_rows()>0) {
            $result = $query->result_array();
            foreach ($result as $item) {
                $dbCart[$item['product_id']] = $item['quantity'];
            }
            $data['insert'] = array_diff_key($cart, $dbCart);       // return array('product_id'=>'quantity')
            $data['delete'] = array_diff_key($dbCart, $cart);       // return array('product_id'=>'quantity')
            $data['update'] = array_intersect_key($cart, $dbCart);  // return array('product_id'=>'quantity')

            if(!empty($data['delete'])) {
                $debug['delete'] = $data['update'];
                $this->db->where_in("product_id",array_keys($data['delete']));
                $this->db->delete($this->table);  
            }
            if(!empty($data['update'])) {
                $debug['update'] = $data['update'];
                foreach ($data['update'] as $id => $quantity) {
                    $update[] = array('user_id'=>$user_id,'product_id'=>$id,'quantity'=>$quantity);
                }
                $this->db->where('user_id',$user_id);
                $this->db->update_batch($this->table,$update,'product_id');
            }
            if(!empty($data['insert'])) {
                $cart = $data['insert'];
                goto insertCart;
            }

        } else {
            insertCart:
            $debug['insert'] = $cart;
            foreach ($cart as $id => $quantity) {
                $insert[] = array('user_id'=>$user_id,'product_id'=>$id,'quantity'=>$quantity);
            }
            $this->db->insert_batch($this->table,$insert);
        }
        //var_dump($debug);
        return true;
    }
}

?>