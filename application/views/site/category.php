<div class="row">
    <div class="col-xs-3">
        <div id="main_left">

            <div class="tittle-box">
                <img src="public/themes/images/icon.png" alt="" class="icon_tittle">
                <h3>Danh mục sản phẩm</h3>
            </div> <!-- end tittle -->
            <div class="boder_menu">
                <ul class="sub-1">
                <?php 
                foreach ($category as $mainCategory) {
                    echo '<li><a href="index.php/theloai/'.$mainCategory['id'].'"><img src="public/themes/images/icon-02.png" alt="" class="icon_list">'.$mainCategory['name'].'</a>';
                    if(!empty($mainCategory['data'])) {
                        echo '<ul class="sub-2">';
                         foreach ($mainCategory['data'] as $subCategory) {
                            echo '<li><a href="index.php/theloai/'.$subCategory['id'].'">'.$subCategory['name'].'</a></li>';
                        }
                        echo '</ul>';
                    echo '</li>';
                    
                    }
                } ?>
                </ul>
            </div> <!-- end boder_menu -->

        </div><!-- end main_left -->
    </div> <!-- end col-xs-3 -->

<div class="col-xs-6">