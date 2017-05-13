<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <base href="<?php echo base_url(); ?>">
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style media="all" type="text/css">
        @import "public/admin/css/all.css";
        .pagination-page {
            margin-top:20px;
            margin-bottom:20px;
            float:left;
            width:100%;
        }
        .pagination-page a,
        .pagination-page strong{
            float:left;
            min-width:30px;
            padding:0px 5px;
            height:30px;
            text-align:center;
            line-height:30px;
            border:solid 1px #ddd;
            border-right:none;
            font-size:12px;
        }
        .pagination-page a:last-child,
        .pagination-page strong:last-child{
            border-right:solid 1px #ddd;
        }
        .pagination-page strong{
            background:#000;
            color:#FFF;
            border-color:#000
        }
        .pagination-page a:hover{
            background:#f5f5f6
        }
    </style>
<!--    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap-multiselect.css">
    <script type="text/javascript" src="public/themes/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/bootstrap/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="main">
    <div id="header"> <a href="#" class="logo"><img src="public/admin/img/logo.png" width="200" height="50" alt="" /></a>
        <ul id="top-navigation">
            <li <?= (isset($active) && $active == "sanpham")? "class='active' " : '' ?>><span><span><a href="admin">Home</a></span></span></li>
            <!-- <li <?= (isset($active) && $active == "tintuc")? "class='active' " : '' ?>><span><span><a href="admin-tintuc">Tin tức</a></span></span></li>
            <li <?= (isset($active) && $active == "gioithieu")? "class='active' " : '' ?>><span><span><a href="admin-gioithieu">Giới thiệu</a></span></span></li>
            <li <?= (isset($active) && $active == "lienhe")? "class='active' " : '' ?>><span><span><a href="admin-lienhe">Liên hệ</a></span></span></li>
            <li <?= (isset($active) && $active == "caidat")? "class='active' " : '' ?>><span><span><a href="admin-caidat">Cài đặt</a></span></span></li>
            <li <?= (isset($active) && $active == "user")? "class='active' " : '' ?>><span><span><a href="admin-user">Người dùng</a></span></span></li> -->
        </ul> 
    </div>
    <div id="middle">
        <div id="left-column">
            <h3>Danh mục</h3>
            <ul class="nav">
                <li <?= (isset($active) && $active == "sanpham")? "class='active' " : '' ?>><a href="admin/product">Sản phẩm</a></li>
                <li <?= (isset($active) && $active == "category")? "class='active' " : '' ?>><a href="admin/category">Thể loại</a></li>
                <li <?= (isset($active) && $active == "tintuc")? "class='active' " : '' ?>><a href="admin/news">Tin tức</a></li>
            </ul>
        </div>
        <div id="center-column">