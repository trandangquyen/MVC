
<div class="col-xs-3">
  <div id="main_right">

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
      <h3>Bài viết mới </h3>
    </div><!-- end tittle -->
    <div class="boder_right_menu">
      <ul>
      <?php 
      foreach ($news as $new) {
        echo '<li><img src="public/themes/images/li.png" alt="" class="icon_list"><a href="index.php/tintuc/details/'.$new['id'].'">'.$new['title'].'</a></li>';
      }
      ?>
      </ul>
    </div><!-- end boder_menu -->

  </div><!-- end main_right -->
</div> <!-- end col-xs-3 -->
</div> <!-- end row -->