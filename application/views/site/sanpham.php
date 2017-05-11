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
            <form id="user-comment">
                <div class="rate-star"><span class="pick-star">Chọn sao:</span><i class="star-off"></i><i class="star-off"></i><i class="star-off"></i><i class="star-off"></i><i class="star-off"></i><span>(<em id="count-star">0</em> sao)</span></div>
                <div class="form-group rate-title">
                    <label for="usr">Tiêu đề đánh giá (Tùy chọn):</label>
                    <input type="text" class="form-control" id="usr" name="title-rate">
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="cont-comment"></textarea>
                </div>
                <input type="submit" class="btn btn-info" value="Gửi bình luận">
            </form>
            <div class="all-comments">
                <h3>Các nhận xét về sản phẩm:</h3>
                <div class="user-com">
                    <div class="com-title"><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><div class="title">Giá tốt</div></div>
                    <div class="by-user"><span>Khách hàng:</span>Thuong ChuBin </div>
                    <p>Máy chuẩn, đẹp, giá cả hợp lý trong thời điểm mua hàng, giao nhanh. Nói chung rất ưng ý</p>
                </div>
                <div class="user-com">
                    <div class="com-title"><i class="star"></i><i class="star"></i><div class="title">Hàng tốt,nguyên seal chưa active</div></div>
                    <div class="by-user"><span>Khách hàng:</span>Đỗ Tuấn Anh</div>
                    <p>Giá rất tốt so với hàng chính hãng. Không biết chế độ hậu mãi tốt không!!!</p>
                </div>
                <div class="user-com">
                    <div class="com-title"><i class="star"></i><i class="star"></i><div class="title">Hàng tốt,nguyên seal chưa active</div></div>
                    <div class="by-user"><span>Khách hàng:</span>Lê Hoàng</div>
                    <p>Một sản phẩm thuộc top đầu công nghệ,phù hợp với tầng lớp học sinh sinh viên, những người dùng văn phòng. Em đang tích lúa để mang em nó về FGC trong thời gian sớm nhất</p>
                </div>
                <div class="user-com">
                    <div class="com-title"><i class="star"></i><i class="star"></i><div class="title">Rất hài lòng</div></div>
                    <div class="by-user"><span>Khách hàng:</span>Monalcal Petter</div>
                    <div class="com-title"><i class="star"></i><i class="star"></i><i class="star"></i><div class="title">Giá tốt</div></div>
                    <p>Mua lúc giá 21tr364k! Đúng hàng mới 100% nguyên seal,tuyệt đẹp,hài lòng!</p>
                </div>
                <div class="user-com">
                    <div class="com-title"><i class="star"></i><div class="title">Giá ổn đúng hàng FPT</div></div>
                    <div class="by-user"><span>Khách hàng:</span>Béo Mèo</div>
                    <div class="com-title"><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><div class="title">Giá tốt</div></div>
                    <p>Đã nhận hàng rất tốt màu đẹp</p>
                </div>
            </div>
        </div>
        <!--End User Comments -->

	</div> <!-- end row -->
</div> <!-- end main_center -->


</div><!-- end col-xs-9 -->