<?php

foreach ($url as $key => $value) {

echo '<div class="products-wrapper col-xs-6 col-ssm-6 col-sm-4 col-md-3">';
echo '<div class="item-detail">';
echo '<div class="img-wrapper"><a href="#"><img src="'.__SITE_PATH.$value->image.'" alt=""></a>';
echo '<div class="icon-discount"><span>-20%</span></div>';
echo '</div>';
echo '<div class="small-gift">Có quà</div>';
echo '<div class="item-name"> <a href="#">'.$value->name.'</a></div>';
echo '<div class="item-price"><span class="price">'.$value->price.'</span><span class="discount">6.790.000 đ</span></div>';
echo '</div>';
echo '</div>';




	
};

?>