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
			</div> <!-- end conten_product -->
		</div> <!-- end conten_product -->
<?php } ?>
	</div> <!-- end row -->
	<div class="clearfix"></div>
<div class="pagination" style="display: table;margin: 0 auto;"><div class="pagination-page"><?=$this->pagination->create_links();?></div></div>
</div> <!-- end main_center -->

<script type="text/javascript">
$("div[id^='p-']").hover(function(){
	var id = this.id;
    $('.flyout-'+id,this).slideToggle();
});
</script>