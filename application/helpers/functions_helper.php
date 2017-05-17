<?php
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
function getCart() {
	$CI = & get_instance();
	return $CI->session->userdata('cart');
}
?>