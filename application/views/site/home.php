<div class="col-xs-9">
<div id="main_center" >
	<div class="row">	
		<div class="product_list col-xs-12">
			<div class=" box-center">
			</div> <!-- end tittle -->
<!--Begin slider products-->
            <div class="flexslider">
                <ul class="slides">
                <?php
                $i=0;
                foreach ($newProducts as $product) {
                    if($i==5) break;
                    echo '<li>
                        <a href="index.php/sanpham/'.$product['id'].'"><img src="'.$product['thumb'].'" /></a>
                        <p class="flex-caption bounceInUp">'.nl2br(strip_tags($product['description'])).'</p>
                    </li>';
                    $i++;
                    } ?>
                </ul>
            </div>
<!--End slider products-->
		</div>
		<div class="product_list col-xs-12">
			<div class="tittle-box box-center">
				<img src="public/themes/images/icon.png" alt="" class="icon_tittle">
				<h3><a href="#">Sản phẩm mới nhất </a></h3>
			</div> <!-- end tittle -->
			<div class="conten_product col-xs-12">
                <?php
                foreach ($newProducts as $product ) {
                ?>
				<div class="col-xs-4">
                    <div class="product_item">
                        <h3><?=$product['name']?></h3>
                        <div class="product_img"><a href="index.php/sanpham/<?=$product['id']?>"><img src="<?=$product['thumb']?>" alt=""></a></div>
                        <p class="price"><?=$product['price']?></p>
                        <div id="9" class="raty" data-score="4" title="good">
                            <?php
                            $star = '';
                            for($i=1;$i<=($product['rate']);$i++) $star .= '<img src="public/themes/images/star-on.png" alt="1" title="good">';
                            echo $star;
                            ?>
                            <input name="score" value="4" readonly="readonly" type="hidden"> 
                        </div>
                        <div class="action">
                            <p>
                                Lượt xem:
                                <b><?=$product['views']?></b>
                            </p>
                            <a class="button" href="#" title="Mua ngay">Mua ngay</a>
                        </div> <!-- end action -->
                        <a href="index.php/sanpham/<?=$product['id']?>"><span class="item-descript flyout-p-<?=$product['id']?>" > <?=nl2br(substr($product['description'],0,150))?></span></a>
                    </div>
                </div><!-- end product_item -->
                <?php } ?>
			</div> <!-- end conten_product -->
		</div> <!-- end conten_product -->
	</div> <!-- end row -->
</div> <!-- end main_center -->
</div>