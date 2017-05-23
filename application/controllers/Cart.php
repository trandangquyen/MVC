<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: khoazero123@gmail.com
 */
class Cart extends CI_Controller {
    private $cart;
    private $user;
    private $user_id;
	public function __construct() {
        parent::__construct();
        //$this->load->helper(array('cookie')); 
        //$this->load->library('session'); // unnecessary because it set autoload
        $this->load->model('Products_model');
        $this->load->model('Cart_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
        $this->cart = $this->getCart();
        $this->user = getUser();
        $this->user_id = $this->user ? $this->user['id'] : false;
        //var_dump($user);var_dump($this->user_id);exit;
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
     * print html input info shipping and confirm put order
     * @return print html
     */
    public function confirmCart() {
        $data['title'] = 'Thông tin giỏ hàng';
        if(!empty($this->cart) && is_array($this->cart)) {
            //var_dump($this->cart);exit;
            $ids = array_keys($this->cart);
            $products = $this->Products_model->getProducts($ids);
            $order_total = 0;
            for($i=0;$i<count($products);$i++) {
                $id = $products[$i]['id'];
                $quantity = $this->cart[$id];
                $products[$i]['quantity'] = $quantity;
                $products[$i]['total-price'] = $products[$i]['price'] * $quantity;
                $order_total += $products[$i]['total-price'];
            }
            $data['items'] = $products;
            $data['order_total'] = $order_total;
        }
        $data['user'] = $this->user;
        $this->load->view('site/common/header',$data);
        $this->load->view('site/order',$data);
        $this->load->view('site/common/footer');
    }
    /**
     * print details of order
     * @param  int $id
     * @return print html
     */
    public function viewOrder($id) {
        $data['order'] = $this->Order_model->getOrder($id);
        if(!empty($data['order'])) for ($i=0;$i<count($data['order']['details']);$i++) {
            $data['order']['products'][$i] = $this->Products_model->getProductArray($data['order']['details'][$i]['product_id']);
            $data['order']['products'][$i]['quantity'] = $data['order']['details'][$i]['quantity'];
        }
        //var_dump($data['order']);exit;
        $data['user'] = $this->User_model->getUser($data['order']['user']);
        $this->load->view('site/invoice',$data);
    }
    /**
     * save order to db
     * @return redirect to viewOrder
     */
    public function putOrder() {
        $data['title'] = 'Đặt hàng';
        if(empty($this->input->post('user_info'))) $data['error'] = 'Hãy điền đầy đủ thông tin';
        else if(empty($this->cart) || !is_array($this->cart)) $data['error'] = 'Giỏ hàng đã hết hạn';
        else {
            $ids = array_keys($this->cart);
            $products = $this->Products_model->getProducts($ids);
            $order_total = 0;
            for($i=0;$i<count($products);$i++) {
                $id = $products[$i]['id'];
                $quantity = $this->cart[$id];
                $products[$i]['quantity'] = $quantity;
                $products[$i]['total-price'] = $products[$i]['price'] * $quantity;
                $order_total += $products[$i]['total-price'];
            }
            $user_info = $this->input->post('user_info');
            //var_dump($user_info);exit;
            $insert = array(
                            'order' => [
                                'user' =>$this->user_id,
                                'price' =>$order_total,
                                'ship_name' => isset($user_info['ship_to_name']) ? $user_info['ship_to_name'] : null,
                                'ship_phone' => isset($user_info['ship_to_phone']) ? $user_info['ship_to_phone'] : null,
                                'ship_address' => isset($user_info['ship_to_address']) ? $user_info['ship_to_address'] : null,
                                'ship_note' => isset($user_info['ship_note']) ? $user_info['ship_to_address'] : null,
                                'payment' => (null !== $this->input->post('payment')) ? $this->input->post('payment') : null,
                                'transport' => (null !== $this->input->post('transport')) ? $this->input->post('transport') : null,
                            ],
                            'order_details' => $this->cart,
                        );
            
            if($order_id=$this->Order_model->createOrder($insert)) {
                $data['message'] = 'Đặt hóa đơn thành công: #'.$order_id;
                $data['order']['id'] = $order_id;
                $this->session->unset_userdata('cart');
                redirect('order/'.$order_id);
            } else exit('Đặt hóa đơn thất bại');
        }
        //$data['user'] = $this->user;
        //$this->load->view('site/common/header',$data);
        //$this->load->view('site/invoice',$data);
        //$this->load->view('site/common/footer');
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
            $this->saveCart($this->cart);
            $response['debug']['thiscart'] = $this->cart;
        } else if(isset($this->cart[$product_id])) {
            //$response = array('message' => 'Sản phẩm đã có trong giỏ hàng');
            $this->cart[$product_id] = $this->cart[$product_id] + 1;
        } else {
            $this->cart[$product_id] = $quantity;
        }

        $this->saveCart(); // $user_id

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
        $this->saveCart($this->user_id); // $user_id
        $response = array('status' => 1);
        return $this->outputJson($response);
    }
    /**
     * print view Cart
     * @return html
     */
    public function viewCart() {
        $data['title'] = 'Giỏ hàng';
        if(!empty($this->cart) && is_array($this->cart)) {
            $ids = array_keys($this->cart);
            $products = $this->Products_model->getProducts($ids);
            for($i=0;$i<count($products);$i++) {
                $id = $products[$i]['id'];
                $quantity = $this->cart[$id];
                $products[$i]['quantity'] = $quantity;
                $products[$i]['total-price'] = $products[$i]['price'] * $quantity;
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
    public function saveCart($cart=null) {
        $cart = $cart ? $cart : $this->cart;
        $this->session->set_userdata("cart", $cart);
        if($this->user_id) {
            $this->Cart_model->updateCart($this->user_id,$cart);
        }
    }
    /**
     * get cart from db if user logged, else get from session
     * @return array(['product_id'=>'quantity', ...])
     */
    public function getCart() {
        if($this->user_id) {
            $this->cart = $this->Cart_model->getCart($this->user_id);
            if($this->cart) $this->session->set_userdata("cart", $this->cart);
        } else $this->cart = $this->session->userdata("cart");

        return $this->cart;
    }
    /**
     * [applyCoupon description]
     * @param  string $code [description]
     * @return boolean      1 if code valid
     */
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