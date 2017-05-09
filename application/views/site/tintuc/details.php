<div class="col-xs-6">
	<div id="main_center" >
		<h3><?=$news->title ?></h3>
		<p><?=nl2br($news->content) ?></p>
	</div><br />
	<div class="news-related"><?php 
	if(!empty($news->related)) {
		echo '<a style="" href="index.php/tintuc/details/'.$news->related[0]['id'].'">Bài trước</a>';
		echo '<a style="float: right;" href="index.php/tintuc/details/'.$news->related[1]['id'].'">Bài tiếp</a>';
	}
	?></div>
</div>