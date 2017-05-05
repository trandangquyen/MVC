<div class="col-xs-9">
<div id="main_center" >
	<div class="row">	

		<div class="product_list col-xs-12">
			<div class="tittle-box box-center">
				<img src="public/themes/images/icon.png" alt="" class="icon_tittle">
				<h3><a href="#"><?=$title?></a></h3>
			</div> <!-- end tittle -->
			<div class="conten_product col-xs-12">
				<!-- <pre>
				    <?php
				        // print_r($product);
				    ?>
				</pre> -->
				
				<div class="col-xs-10">
					<img src="public/themes/images/product13.jpg" alt="">
				</div>
				<div class="col-xs-2">	
					<?php
				        print_r($product->thumb);
				    ?>
				</div>
				<div class="col-xs-12 ">
					<p style="text-align: center; font-weight: bold; font-size: 24px; color: #ea28ff;"><?php echo $title; ?></p>
					
					<span><?php print_r($product->description); ?></span>
				
				</div>

				



			
			
			</div> <!-- end conten_product -->
		</div> <!-- end conten_product -->

	</div> <!-- end row -->
</div> <!-- end main_center -->


</div><!-- end col-xs-9 -->