<div class="row">
    <div class="col-xs-3">
        <div id="main_left">
            <div class="tittle-box">
                <img src="public/themes/images/icon.png" alt="" class="icon_tittle">
                <h3>Hỗ trợ trực tuyến </h3>
            </div><!-- end tittle -->
            <div class="boder_menu">
                <h4>FGC TECHLUTION</h4>
                <p style="margin-left: 27px;">
                    <img src="public/themes/images/phone.png" alt="" class="icon_list">01669872627
                </p >
                <p style="margin-left: 27px;">
                    <img src="public/themes/images/email.png" alt="" class="icon_list">Email:fgcsupport@gmail.com
                </p>
                <p style="margin-left: 27px;">
                    <img src="public/themes/images/skype.png" alt="" class="icon_list">Skype:khanhhuyna
                </p>
            </div><!-- end boder_menu -->

            <div class="tittle-box">
                <img src="public/themes/images/icon.png" alt="" class="icon_tittle">
                <h3>Danh mục sản phẩm</h3>
            </div> <!-- end tittle -->
            <div class="boder_menu">
                <ul class="sub-1">
                    <?php 
                    foreach ($category as $mainCategory) {
                        echo '<li class="cha"><a href="index.php/theloai/'.$mainCategory['id'].'">'.$mainCategory['name'].'</a>';
                        if(!empty($mainCategory['data'])) {
                            echo '<ul class="sub-3">';
                            foreach ($mainCategory['data'] as $subCategory) {
                                echo '<li><a href="index.php/theloai/'.$subCategory['id'].'"><img src="public/themes/images/icon-02.png" alt="" class="icon_list">'.$subCategory['name'].'</a></li>';
                            }
                            echo '</ul>';
                            echo '</li>';

                        }
                    } ?>
                </ul>
            </div> <!-- end boder_menu -->
            <div class="tittle-box">
                <img src="public/themes/images/icon.png" alt="" class="icon_tittle">
                <h3>Bài viết mới </h3>
            </div><!-- end tittle -->
            <div class="boder_menu">
                <ul class="sub-1">
                    <?php 
                    foreach ($news as $new) {
                        echo '<li ><a href="index.php/tintuc/details/'.$new['id'].'"><img src="public/themes/images/li.png" alt="" class="icon_list">'.$new['title'].'</a></li>';
                    }
                    ?>
                </ul>
            </div><!-- end boder_menu -->
            <div class="tittle-box">
                <img src="public/themes/images/icon.png" alt="" class="icon_tittle">
                <h3>Các đánh giá mới nhất</h3>
            </div><!-- end tittle -->
            <div class="boder_menu" style="height: 422px;overflow: scroll;">
                <ul class="sub-1">
                    <?php 
                    foreach ($news as $new) {
                        echo '<li ><a href="index.php/tintuc/details/'.$new['id'].'"><img src="public/themes/images/li.png" alt="" class="icon_list">'.$new['title'].'</a></li>';
                    }
                    ?>

                    <!-- <?php
                    if(!empty($product->comments)) {
                        foreach ($product->comments as $comment) {
                            echo '<li ><a href="index.php/tintuc/details/'.$new['id'].'">';
                            $star = '';
                            for($i=($comment['rate']);$i>=1;$i--) $star .= '<i class="star"></i>';
                            echo '<div class="user-com">
                                <div class="com-title">'.$star .'<div class="title">'.$comment['title'].'</div></div>
                                <div class="by-user"><span>Khách hàng:</span>'.$comment['name'].'</div>
                                <p>'.$comment['content'].'</p>
                            </div></a></li>';
                        }
                        }
                    ?> -->
                </ul>
            </div><!-- end boder_menu -->

        </div><!-- end main_left -->
    </div> <!-- end col-xs-3 -->

