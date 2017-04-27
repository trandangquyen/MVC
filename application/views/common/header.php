<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="http://localhost:8888/gitTranning/MVC/">
        <meta charset="utf-8">
        <title>Training E-commerce Templates</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
        <!-- bootstrap -->
        <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
        <link href="public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!-- Css for @media screen -->
        <link href="public/themes/css/bootstrappage.css" rel="stylesheet"/>		
        <!-- global styles -->
        <link href="public/themes/css/flexslider.css" rel="stylesheet"/>
        <link href="public/themes/css/lienhe.css" rel="stylesheet"/>
        <link href="public/themes/css/main.css" rel="stylesheet"/>
    </head>
    <body>
        <div id="wrapper" class="container">
            <!-- Begin Header -->
            <div class="header">
                <div id="Icon_search">
                    <img src="public/images/header.png" alt="">
                </div>

                <ul id='top-menu'>
                    <li class='item current' id="lintrangchu"><a href='index.php/trangchu/view'>Trang chủ</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li  <?php echo (isset($active) && $active == 'gioithieu') ? 'class = "item current"' : 'class="item"' ?>><a href='index.php/gioithieu/view'>Giới thiệu</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li <?php echo (isset($active) && $active == 'tintuc') ? 'class = "item current"' : 'class="item"' ?>><a href='index.php/tintuc/list'>Tin tức</a>
                    </li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li <?php echo (isset($active) && $active == 'lienhe') ? 'class = "item current"' : 'class="item"' ?>><a href='index.php/lienhe/view'>Liên hệ</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>

                </ul>			
            </div>
            <!-- End Header -->
            <!-- Begin main content -->
            <div id="main-content">