<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <style media="all" type="text/css">
        @import "public/admin/css/all.css";
    </style>
</head>
<body>
<div id="main">
    <div id="header"> <a href="#" class="logo"><img src="public/admin/img/logo.png" width="200" height="50" alt="" /></a>
        <ul id="top-navigation">
            <li <?= (isset($active) && $active == "home")? "class='active' " : '' ?>><span><span><a href="admin-home">Trang chủ</a></span></span></li>
            <li <?= (isset($active) && $active == "sanpham")? "class='active' " : '' ?>><span><span><a href="admin-sanpham">Sản phẩm</a></span></span></li>
            <li <?= (isset($active) && $active == "tintuc")? "class='active' " : '' ?>><span><span><a href="admin-tintuc">Tin tức</a></span></span></li>
            <li <?= (isset($active) && $active == "gioithieu")? "class='active' " : '' ?>><span><span><a href="admin-gioithieu">Giới thiệu</a></span></span></li>
            <li <?= (isset($active) && $active == "lienhe")? "class='active' " : '' ?>><span><span><a href="admin-lienhe">Liên hệ</a></span></span></li>
            <li <?= (isset($active) && $active == "caidat")? "class='active' " : '' ?>><span><span><a href="admin-caidat">Cài đặt</a></span></span></li>
            <li <?= (isset($active) && $active == "user")? "class='active' " : '' ?>><span><span><a href="admin-user">Người dùng</a></span></span></li>
        </ul>
    </div>
    <div id="middle">
        <div id="left-column">
            <h3>Danh mục</h3>
            <ul class="nav">
                <li <?= (isset($active) && $active == "sanpham")? "class='active' " : '' ?>><a href="admin-sanpham">Sản phẩm</a></li>
                <li <?= (isset($active) && $active == "category")? "class='active' " : '' ?>><a href="admin-category">Danh mục</a></li>
                <li <?= (isset($active) && $active == "tintuc")? "class='active' " : '' ?>><a href="admin-tintuc">Tin tức</a></li>
                <li <?= (isset($active) && $active == "gioithieu")? "class='active' " : '' ?>><a href="admin-gioithieu">Giới thiệu</a></li>
                <li <?= (isset($active) && $active == "lienhe")? "class='active' " : '' ?>><a href="admin-lienhe">Liên hệ</a></li>
                <li class="last"><a href="#">Nội dung khác</a></li>
            </ul>
            <a href="#" class="link">Link here</a> <a href="#" class="link">Link here</a> </div>
        <div id="center-column">