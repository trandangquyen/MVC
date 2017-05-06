<?php 
foreach ($news as $item) {
	?>

	<h3 class='head3'><?=$item['title']?></h3>

	<p class='content'>
	<?=nl2br(substr($item['content'],0,250))?>
	<br />
	<a style="float: right;" class="readmore" href="index.php/tintuc/details/<?=$item['id']?>">read more...</a>

	</p><br /><br />
	<?php 
}
?>
