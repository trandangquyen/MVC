<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function formatPrice($priceFloat) {
    $symbol = '';
	$symbol_thousand = '.';
	$decimal_place = 0;
	$price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
	return $price.$symbol;
}
function formatPriceArr($array, $col,$replace=false) {
	array_walk($array, function(&$value, $i) use($col,$replace) {
		if (array_key_exists($col, $value)) {
			$new = formatPrice($value[$col]);
			if($replace)
				$value[$replace] = $new;
			else
				$value[$col] = $new;
		}
	});
	return $array;
}
function getCart($user_id=false) {
	$CI = & get_instance();
	if($user_id) {
		$CI->load->model('Cart_model');
        $cart = $CI->Cart_model->getCart($user_id);
        if($cart) $CI->session->set_userdata("cart", $cart);
    } else $cart = $CI->session->userdata("cart");
    return $cart;
}
function getUser($user_id=false) {
	$CI = & get_instance();
	if($user_id) {
		$CI->load->model('User_model');
        $user = $CI->User_model->getUser($user_id);
        if($user) {
        	//return $user;
        	//$CI->session->set_userdata("user", $user);
        }
    } else {
    	$user = $CI->session->userdata("login");
    }
    return (array)$user;
}
function isAdmin($user_id=false) {
	$CI = & get_instance();
	if($user_id) {
		$CI->load->model('User_model');
        $user = $CI->User_model->getUser($user_id);
        if($user['admin']==1) {
        	return true;
        }
    }
    return false;
}
function cutcontent($new) {
    $string = $new['content'];
    $desired_width = 250;
    $shortcontent = substr($string, 0, strpos(wordwrap($string, $desired_width), "\n"));
    $new['content'] = $shortcontent.' ...';
    return $new;
}
?>