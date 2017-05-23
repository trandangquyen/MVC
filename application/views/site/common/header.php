<?php 
if(isset($debug)) echo "<!-- ".json_encode($debug)." -->\n";
?><!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <title><?=isset($title) ? $title : 'Training E-commerce Templates'?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
        <!-- bootstrap -->
        <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Css for @media screen -->
        <link href="public/themes/css/bootstrappage.css" rel="stylesheet"/>
        <!-- global styles -->
        <link href="public/themes/css/flexslider.css" rel="stylesheet"/>
        <link href="public/themes/css/lienhe.css" rel="stylesheet"/>
        <link href="public/themes/css/main.css" rel="stylesheet"/>
        <!-- scripts -->
        <script src="public/themes/js/jquery-1.7.2.min.js"></script>
        <script src="public/bootstrap/js/bootstrap.min.js"></script>
        <script src="public/themes/js/superfish.js"></script>
        <script src="public/themes/js/jquery.scrolltotop.js"></script>
        <script src="public/themes/js/jquery.flexslider-min.js"></script>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <script src="public/themes/js/jquery.elevateZoom-3.0.8.min.js"></script>
        <script type="text/javascript" src="public/themes/js/main.js"></script>
        <script src="public/themes/js/common.js"></script>

    </head>
    <body>
        <div id="wrapper">
            <!-- Begin Header -->
            <div class="header container">
				<div id="Icon_search">
                    <a href="<?php echo base_url(); ?>"><img src="public/images/header.png" alt="Home"></a>
                    <div id="cart" style="cursor:pointer;" onclick="window.location='cart'"><span class="icon_cart"><img src="public/images/icon_cart.png" alt="cart"></span><span id="count_shopping_cart_store"><?=count($this->session->userdata('cart')) ?></span> sản phẩm <a href="cart" rel="nofollow"><img src="public/images/btn_giohang.png" alt="thanh toán"></a></div>
                </div>
                <?php
                    $user = $this->session->userdata('login');
                    if ($user && $user['admin'] == 1) {
                        echo "<div class='login'><a href='admin'><img src='public/themes/images/user-login.png' alt=''>Xin chào: ".$user['name']."</a><a href='logout'> Đăng xuất</a></div>";
                    }
                    elseif($user){
                        echo "<div class='login'><a href='user/info'><img src='public/themes/images/user-login.png' alt=''>Xin chào: ".$user['name']."</a><a href='logout'> Đăng xuất</a></div>";
                    }
                    else{
                        echo "<div class='login'><a href='user'><img src='public/themes/images/user-login.png' alt=''>Đăng ký/Đăng nhập</a></div>";
                    }
                ?>

                <ul id='top-menu'>
                    <li class='item<?=(isset($active) && $active == 'home') ? ' current' : '' ?>' id="lintrangchu"><a href='home'>Trang chủ</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li class='item<?=(isset($active) && $active == 'sanpham') ? ' current' : '' ?>' id="lintrangchu"><a href='sanpham'>Sản phẩm</a></li><li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li class='item<?=(isset($active) && $active == 'gioithieu') ? ' current' : '' ?>' id="lintrangchu"><a href='gioithieu/view'>Giới thiệu</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li <?php echo (isset($active) && $active == 'tintuc') ? 'class = "item current"' : 'class="item"' ?>><a href='tintuc'>Tin tức</a>
                    </li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li <?php echo (isset($active) && $active == 'lienhe') ? 'class = "item current"' : 'class="item"' ?>><a href='lienhe'>Liên hệ</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <div id="search" style="float: right;"><input type="text" name="keyword" style="background-color: #f3f2f0;"><button type="button" style="height: 34px;padding: 0 5px;" onclick="submitSearch()">Search</button></div>
                </ul>

            </div>
            <!-- End Header -->
            <script type="text/javascript">
                $('input[name=keyword]').on('keydown', function(e) {
                    if (e.which == 13) {
                        submitSearch();
                    }
                });
                var searchQuery = window.location.href.match(/search\/(.+)/);
                if(searchQuery) {
                    $('input[name=keyword]').val(decodeURIComponent(searchQuery[1]));
                }
                function submitSearch() {
                    var keyword = $('input[name=keyword]').val();
                    if(keyword.length < 3) return alert('Min 3 char');
                    window.location.replace('search/'+keyword);
                }
            </script>
            <!-- Begin main content -->
            <div id="main-content">
                <div class="container">
