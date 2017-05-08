<!DOCTYPE html>
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
        <link href="public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!-- Css for @media screen -->
        <link href="public/themes/css/bootstrappage.css" rel="stylesheet"/>		
        <!-- global styles -->
        <link href="public/themes/css/flexslider.css" rel="stylesheet"/>
        <link href="public/themes/css/lienhe.css" rel="stylesheet"/>
        <link href="public/themes/css/main.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Cho Cloud Zoom CSS vào -->
        <link rel=”stylesheet” type=”text/css” href=”public/themes/css/cloudzoom.css” />
 
        <!-- Cho Cloud Zoom script vào -->
        <script type=”text/javascript” src=”public/themes/js/cloudzoom.js”></script>
 
        <!-- Gọi hàm  -->
        <script type=”text/javascript”>
            CloudZoom.quickStart();
        </script>    
    </head>
    <body>
        <div id="wrapper" class="container">
            <!-- Begin Header -->
            <div class="header">
				<div id="Icon_search">
                    <img src="public/images/header.png" alt="">
                </div>

                <ul id='top-menu'>
                    <li class='item<?=(isset($active) && $active == 'trangchu') ? ' current' : '' ?>' id="lintrangchu"><a href='home'>Trang chủ</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li class='item<?=(isset($active) && $active == 'sanpham') ? ' current' : '' ?>' id="lintrangchu"><a href='sanpham'>Sản phẩm</a></li><li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li class='item<?=(isset($active) && $active == 'gioithieu') ? ' current' : '' ?>' id="lintrangchu"><a href='gioithieu/view'>Giới thiệu</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li class='item<?=(isset($active) && $active == 'tintuc') ? ' current' : '' ?>' id="lintrangchu"><a href='tintuc/list'>Tin tức</a>
                    </li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>
                    <li class='item<?=(isset($active) && $active == 'lienhe') ? ' current' : '' ?>' id="lintrangchu"><a href='lienhe/view'>Liên hệ</a></li>
                    <li class='item_separator'><img  class = "anhmenu" src="public/images/anhmenu.png" alt="đường viền cách giữa menu" /> </li>

                </ul>			
            </div>
            <!-- End Header -->
            <!-- Begin main content -->
            <div id="main-content">
            <!-- End Header -->
		<!-- Begin main content -->
		<div id="main-content">
			<div class="container">
		      	<div class="row">
