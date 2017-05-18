<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: khoazero123@gmail.com
 */
class Cart extends CI_Controller {
    private $cart;
	public function __construct() {
        parent::__construct();
        //$this->load->helper(array('cookie')); 
        $this->load->library('session'); // unnecessary because it set autoload
        $this->load->model('Products_model');
        $this->load->model('Cart_model');
        $this->cart = $this->getCart();
    }
    /**
     * @return redirect to method by action
     */
    public function actionCart() {
        $type = $this->input->post('type');
        switch ($type) {
            case 'addtocart':
                return $this->addtoCart(); // add a product to cart
                break;
            case 'deleteProduct':
                return $this->deleteProduct();
                break;
            case 'updateCart':
                return $this->addtoCart(true); // update entry cart
                break;
            case 'applyCoupon':
                return $this->applyCoupon(); // update entry cart
                break;
            
            default:
                return $this->outputJson(['message'=>'Unknown action']);
                break;
        }
    }
    /**
     * @param  boolean $update: True will be reset cart
     * @return json
     */
    public function addtoCart($update=false) {
        $product_id = $this->input->post('products');
        if(!$product_id) {
            $this->deleteProduct();
            $this->session->unset_userdata('cart');
            exit('Delete entry cart');
        }
        $quantity = (int)$this->input->post('quantity');
        if($quantity<1) $quantity = 1;
        if(is_array($product_id)) {
            if($update) $this->cart = null;
            foreach ($product_id as $id => $quantity) {
                if($id) $this->cart[$id] = $quantity;
            }
            $this->saveCart(false,$this->cart);
            $response['debug']['thiscart'] = $this->cart;
        } else if(isset($this->cart[$product_id])) {
            //$response = array('message' => 'Sản phẩm đã có trong giỏ hàng');
            $this->cart[$product_id] = $this->cart[$product_id] + 1;
        } else {
            $this->cart[$product_id] = $quantity;
        }

        $this->saveCart(false); // $user_id

        $response['status'] = 1;
        $response['number'] = count($this->getCart());
        $response['debug']['data'] = $this->getCart();
        $response['debug']['post'] = $this->input->post();
        return $this->outputJson($response);
        
    }
    /**
     * delete product from Cart
     * @return json
     */
    public function deleteProduct() {
        $id = $this->input->post('product_id');
        if($id) unset($this->cart[$id]);
        else $this->cart = null;
        $this->saveCart(false); // $user_id
        $response = array('status' => 1);
        return $this->outputJson($response);
    }
    /**
     * print view Cart
     * @return html
     */
    public function viewCart() {
        $data['title'] = 'Giỏ hàng';
        if(!empty($this->cart)) {
            $ids = array_keys($this->cart);
            $products = $this->Products_model->getProducts($ids);
            for($i=0;$i<count($products);$i++) {
                $id = $products[$i]['id'];
                $quantity = $this->cart[$id];
                $products[$i]['quantity'] = $quantity;
            }
            $data['items'] = $products;
        }
        $data['debug'] = $this->getCart();
        $this->load->view('site/common/header', $data);
        $this->load->view('site/cart', $data);
        $this->load->view('site/common/footer', $data);
    }
    /**
     * @param  array
     * save cart to session, and db if user logged
     * @return void
     */
    public function saveCart($user_id=false,$cart=null) {
        $cart = $cart ? $cart : $this->cart;
        $this->session->set_userdata("cart", $cart);
        if($user_id) {
            $this->Cart_model->updateCart($user_id,$cart);
        }
    }
    /**
     * get cart from db if user logged, else get from session
     * @return array(['product_id'=>'quantity', ...])
     */
    public function getCart($user_id=false) {
        if($user_id) {
            $this->cart = $this->Cart_model->getCart($user_id);
            if($this->cart) $this->session->set_userdata("cart", $this->cart);
        } else $this->cart = $this->session->userdata("cart");

        return $this->cart;
    }
    public function applyCoupon($code=null) {
        if(!$code) $code = $this->input->post('code');
        $response = array('status' => 1);
        $response = array('message' => 'Coupon code not valid');
        return $this->outputJson($response);
    }
    /**
     * @param  array
     * @return json
     */
    public function outputJson($response=null) {
        $response['status'] = isset($response['status']) ? $response['status'] : 0;
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }
}