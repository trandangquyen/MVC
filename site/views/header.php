<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MVC</title>
<?php
        echo "<link rel='stylesheet' type='text/css' href='".__SITE_PATH."public/css/bootstrap.min.css' />";
        echo "<link rel='stylesheet' type='text/css' href='".__SITE_PATH."public/css/global.css' />";
        echo "<script type='text/javascript' charset='utf-8' src='".__SITE_PATH."public/js/index.js' ></script>";
?>
</head>
<body>
<div id="wrapper">
    <!-----------------# header-------------------->
    <div id="header">
	<h2>HEADER</h2><br />
    <ul id="menu">
        <li><a href="<?php echo __SITE_PATH?>index.php/?link=home">Home</a></li>
        <li><a href="<?php echo __SITE_PATH?>index.php/?link=about">About</a></li>
        <li><a href="<?php echo __SITE_PATH?>index.php/?link=listProducts">Products</a></li>
        <li><a href="<?php echo __SITE_PATH?>index.php/?link=login">Login</a></li>

    </ul>
    
    </div>