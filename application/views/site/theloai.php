<div class="col-xs-3">
  <div id="main_left">

    <div class="tittle-box">
      <img src="public/themes/images/icon.png" alt="" class="icon_tittle">
      <h3><?=$title?></h3>
    </div> <!-- end tittle -->
    <div class="boder_menu">
    <?php 
    foreach ($category as $mainCategory) {
      //var_dump($mainCategory);
      echo '<ul>
        <span><a href="theloai/'.$mainCategory['id'].'">'.$mainCategory['name'].'</a></span>';
        if(!empty($mainCategory['data'])) foreach ($mainCategory['data'] as $subCategory) {
          echo '<li><img src="public/themes/images/icon-02.png" alt="" class="icon_list"><a href="/theloai/'.$subCategory['id'].'">'.$subCategory['name'].'</a></li>';
        }
      echo '</ul>';
      }
       ?>

    </div> <!-- end boder_menu -->

  </div><!-- end main_left -->
</div> <!-- end col-xs-3 -->
<div class="col-xs-6">