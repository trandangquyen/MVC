<div class="col-xs-9">
    <div id="main_center" >
        <?php
        foreach ($products as $title => $product) {
            ?>
            <div class="row">
                <div class="product_list col-xs-12">
                    <div class="tittle-box box-center">
                        <img src="public/themes/images/icon.png" alt="" class="icon_tittle">
                        <h3><a href="#"><?= $title ?></a></h3>
                    </div> <!-- end tittle -->
                    <div class="conten_product col-xs-12">
                        <?php
                        foreach ($product as $item) {
                            ?>
                            <div class="col-xs-4" style="padding-left: 2px; padding-right: 10px;">
                                <div class="product_item" id="p-<?= $item['id'] ?>">
                                    <h3 title="<?= $item['name'] ?>"><?= substr($item['name'], 0, 15) ?></h3>
                                    <div class="product_img"><a href="index.php/sanpham/<?= $item['id'] ?>"><img src="public/themes/images/product13.jpg" alt=""></a></div>
                                    <p class="price"> <?= $item['price'] ?> đ</p>
                                    <div id="9" class="raty" data-score="4" title="good">
                                        <?php
                                        $star = '';
                                        for ($i = 1; $i <= ($item['rate']); $i++)
                                            $star .= '<img src="public/themes/images/star-on.png" alt="1" title="good">';
                                        echo $star;
                                        ?>
                                        <input name="score" value="4" readonly="readonly" type="hidden">
                                    </div>
                                    <div class="action">
                                        <p>
                                            Lượt xem:
                                            <b><?= $item['views'] ?></b>
                                        </p>
                                        <!-- <a class="button" href="#" title="Mua ngay">Mua ngay</a> -->
                                    </div> <!-- end action -->
                                    <div class="item-descript">
                                        <span> <?= nl2br(substr($item['description'], 0, 150)) ?></span> </br>
                                        <a href="#" class="btn-add-to-cart btn btn-info btn-sm">
                                            <span class=" glyphicon glyphicon-shopping-cart " ></span> Thêm vào giỏ hàng
                                        </a>
                                        <a href="index.php/sanpham/<?= $item['id'] ?>" class="btn-add-to-cart btn btn-info btn-sm">
                                            <span class=" glyphicon glyphicon-list-alt "></span>Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end product_item -->
                        <?php } ?>
                    </div> <!-- end conten_product -->
                </div> <!-- end conten_product -->
            </div> <!-- end row -->

        <?php } ?>

    </div> <!-- end main_center -->
</div>
<p id="loading" style="display: none;text-align: center;">
    <img src="public/images/loading.svg" alt="Loading…" />
</p>

<div class="clearfix"></div>
<div class="pagination" style="display: table;margin: 0 auto;"><div class="pagination-page"><?= $this->pagination->create_links(); ?></div></div>


<!--<script type="text/javascript">
$("div[id^='p-']").on({
    mouseenter: function () {
        $('.flyout-'+this.id,this).show();
    },
    mouseleave: function () {
        $('.flyout-'+this.id,this).hide();
    }
});
</script>-->