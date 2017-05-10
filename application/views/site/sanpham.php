<div class="col-xs-9">
<div id="main_center" >
	<div class="row">	

		<div class="product_list col-xs-12">
			<div class="tittle-box box-center">
				<img src="public/themes/images/icon.png" alt="" class="icon_tittle">
				<h3><a href="#"><?=$title?></a></h3>
			</div> <!-- end tittle -->
			<div class="conten_product col-xs-12">
								
				<div class="col-xs-12 " style = "text-align: center;">
					<img class = “cloudzoom” src="<?php echo $product->thumb ?>" data-cloudzoom = “zoomImage:‘<?php echo $product->thumb ?>‘”/>
				</div>
				<div class="col-xs-12 list_img_product">
					<?php
				        foreach ($product->image as $image) {
				        	echo '<img src="'.$image['url'].'"/>';
				        }
				    ?>
				</div>
				<div class="col-xs-12 ">										
					<p style="text-align: center; font-weight: bold; font-size: 24px; color: #ea28ff;"><?php echo $title; ?></p>

					<div class="col-xs-4 col-xs-push-4" style = "height: auto;padding: 10px;margin: 10px; text-align: center; font-weight: bold; font-size: 22px;   
					background: -webkit-linear-gradient(top,#f59000,#fd6e1d); border-radius: 4px ">
						<?php
				        	echo($product->price);
				    	?>

					</div>

					<div class="col-xs-12">
						<span>
							<?=nl2br($product->description)?>
						</span>
					</div>
					
				</div>
			</div> <!-- end conten_product -->
		</div> <!-- end conten_product -->
        <!--User Comments -->
        <div class="commnent">
            <h3>Ý kiến đánh giá sản phẩm:</h3>
            <p>Hãy cho chúng tôi biết nhận xét của bạn về sản phẩm này:</p>
            <form>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
                <input type="submit" class="btn btn-info" value="Gửi bình luận">
            </form>
        </div>
        <!--End User Comments -->

	</div> <!-- end row -->
</div> <!-- end main_center -->


</div><!-- end col-xs-9 -->