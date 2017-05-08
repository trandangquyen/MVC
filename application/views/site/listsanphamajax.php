<?php 
			foreach ($products as $item) {
			?>
				<div class="col-xs-4" style="padding-left: 2px; padding-right: 10px;">
					<div class="product_item" id="p-<?=$item['id']?>">
						<h3 title="<?=$item['name']?>"><?=substr($item['name'],0,15)?></h3>
						<div class="product_img"><a href="index.php/sanpham/<?=$item['id']?>"><img src="public/themes/images/product13.jpg" alt=""></a></div>
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
								<b><?=$item['views']?></b>
							</p>
							<!-- <a class="button" href="#" title="Mua ngay">Mua ngay</a> -->
						</div> <!-- end action -->
						<div class="flyout-p-<?=$item['id']?>" style="display: none;position:absolute;width:300px;height:auto;background:rgba(191, 184, 184, 0.9);overflow: hidden;z-index:10000;text-align: left;"><?=nl2br(substr($item['description'],0,150))?></div>
					</div>
				</div><!-- end product_item -->
				<?php } ?>