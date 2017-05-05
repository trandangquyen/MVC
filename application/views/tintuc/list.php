<?php
foreach ($news as $item) {
?>

<h3 class='head3'><?=$item['TenBV']?></h3>
<style>
    .content{
        text-align: justify;
    }
    </style>
<p class='content'>

<?php 
echo $item['Content'];
?>


</p>
<br />
<a class="readmore" href="index.php/tintuc/details/<?php echo $item['MaBV'];?>">read more...</a>
<?php
}
?>;