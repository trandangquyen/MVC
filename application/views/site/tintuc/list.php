<div class="col-xs-6">
<div id="main_center" >
<?php 
foreach ($news as $item) {
	?>

	<h3 class='head3'><a href="index.php/tintuc/details/<?=$item['id']?>"><?=$item['title']?></a></h3>

	<p class='content'>
	<?=nl2br(substr($item['content'],0,250))?>
	<br />
	<a style="float: right;" class="readmore" href="index.php/tintuc/details/<?=$item['id']?>">read more...</a>

	</p><br /><br />
	<?php 
}
?>

</div>
</div>
