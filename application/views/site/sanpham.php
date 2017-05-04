<div id="main_center" >
	<div class="row">	
<?php 
	foreach ($products as $title => $product) {
		
	?>

		<div class="product_list col-xs-12">
			<div class="tittle-box box-center">
				<img src="public/themes/images/icon.png" alt="" class="icon_tittle">
				<h3><a href="#"><?=$title?></a></h3>
			</div> <!-- end tittle -->
			<div class="conten_product col-xs-12">
			<?php 
			foreach ($product as $item) {

			?>
				<div class="col-xs-4" style="padding-left: 2px; padding-right: 10px;">
					<div class="product_item">
						<h3><?=$item['name']?></h3>
						<div class="product_img"><a href="/sanpham/<?=$item['id']?>"><img src="public/themes/images/product13.jpg" alt=""></a></div>
						<p class="price"> <?=$item['price']?> đ</p>
						<div id="9" class="raty" data-score="4" title="good">
							<img src="public/themes/images/star-on.png" alt="1" title="good">
							<img src="public/themes/images/star-on.png" alt="2" title="good">
							<img src="public/themes/images/star-on.png" alt="3" title="good">
							<img src="public/themes/images/star-on.png" alt="4" title="good">
							<img src="public/themes/images/star-off.png" alt="5" title="good">
							<input name="score" value="4" readonly="readonly" type="hidden">
						</div>
						<div class="action">
							<p>
								Lượt xem:
								<b>19</b>
							</p>
							<a class="button" href="#" title="Mua ngay">Mua ngay</a>
						</div> <!-- end action -->
					</div>
				</div><!-- end product_item -->
				<?php } ?>
			</div> <!-- end conten_product -->
		</div> <!-- end conten_product -->
<?php } ?>
	</div> <!-- end row -->
</div> <!-- end main_center -->