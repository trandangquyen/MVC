<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    private $cart;
	public function __construct() {
        parent::__construct();
        //$this->load->helper(array('cookie'));
        $this->load->library('session');
        $this->load->model('Products_model');
        $this->cart = $this->getCart();
    }
    /**
     * @return redirect to methob by action
     */
    public function actionCart() {
        $type = $this->input->post('type');
        switch ($type) {
            case 'addtocart':
                return $this->addtoCart();
                break;
            case 'deleteProduct':
                return $this->deleteProduct();
                break;
            case 'updateCart':
                return $this->addtoCart(true);
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
        $quantity = (int)$this->input->post('quantity');
        if($quantity<1) $quantity = 1;
        if(is_array($product_id)) {
            if($update) $this->cart = null;
            foreach ($product_id as $id => $quantity) {
                $this->cart[$id] = $quantity;
            }
            $this->saveCart($this->cart);
            $response['debug']['thiscart'] = $this->cart;
        } else if(isset($this->cart[$product_id])) {
            //$response = array('message' => 'Sản phẩm đã có trong giỏ hàng');
            $this->cart[$product_id] = $this->cart[$product_id] + 1;
        } else {
            $this->cart[$product_id] = $quantity;
        }

        $this->saveCart();

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
        unset($this->cart[$id]);
        $this->saveCart();
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
            $newCart = array(); // set new cookie for cart to filter product not exists
            for($i=0;$i<count($products);$i++) {
                $id = $products[$i]['id'];
                $quantity = $this->cart[$id];
                $products[$i]['quantity'] = $quantity;
                $newCart[$id] = $quantity;
            }
            $this->saveCart($newCart); // save new data cookie cart
            $data['items'] = $products;
        }
        $data['debug'] = $this->getCart();
        $this->load->view('site/common/header', $data);
        $this->load->view('site/cart', $data);
        $this->load->view('site/common/footer', $data);
    }
    /**
     * @param  array
     * save cart to session
     * @return null
     */
    public function saveCart($cart=null) {
        $cart = $cart ? $cart : $this->cart;
        $this->session->set_userdata("cart", $cart);
    }
    /**
     * get cart from session
     * @return null
     */
    public function getCart() {
        //$this->cart = json_decode(get_cookie('cart'),true);
        $this->cart = $this->session->userdata("cart");
        return $this->cart;
    }
    /**
     * @param  array
     * @return json
     */
    public function outputJson($response=null) {
        $response['status'] = $response['status'] || 0;
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }
}