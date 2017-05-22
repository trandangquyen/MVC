<!DOCTYPE html>
<html >
<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <title>Material Login Form</title>
    <link rel="stylesheet" href="public/admin/css/reset.min.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="public/admin/css/style.css">
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .error{
            color: #ed2553;
            font-size: 13px;
            margin-bottom: -15px;
            position: absolute;
            bottom: -17px;
        }
        .r_error{
            color: #ed2553;
            font-size: 13px;
            margin-bottom: -15px;
            position: absolute;
            top: 12px;
        }
        #main{
            width:960px;
            margin:50px auto;
            font-family:raleway;
        }
        h2{
            position: relative;
            background-color: #26c489;
            text-align:center;
            border-radius: 10px 10px 0 0;
            margin: -10px -40px;
            padding: 30px;
            color:white;
        }
        hr{
            border:0;
            border-bottom:1px solid #ccc;
            margin: 10px -40px;
            margin-bottom: 30px;
        }
        #login{
            width:462px;
            float: left;
            border-radius: 10px;
            font-family:raleway;
            border: 2px solid #ccc;
            padding: 10px 40px 34px;
            margin-top: 0;
            margin-left: -70px;;
            background-color: #DBF6ED;
        }
        img.fb{
            height: 50px;
            padding-left: 90px;
        }
        img.fb_profile{
            height: 50px;
            padding-right: 20px;
            margin-left: -410px;
        }
        p.profile_name{
            font-size: 16px;
            margin-top: -19px;
            margin-left: -148px;
        }
        a.logout{
            position: absolute;
            font-size: 18px;
            text-decoration: none;
            top: 46px;
            right: 45px;
        }
    </style>

</head>

<body>

<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
    <h1>Hãy đăng nhập hoặc đăng ký</h1><span>Hoặc <i class='fa fa-code'></i><a href='#'>Quay lại trang chủ</a></span>
</div>
<div class="rerun"><a href="home">Quay lại</a></div>
<div class="container">
    <div id="main">
        <div id="login">
            <h2> <?php echo "<a href=".$user_profile['link']." target='_blank' ><img class='fb_profile' src="."https://graph.facebook.com/".$user_profile['id']."/picture".">"."</a>"."<p class='profile_name'>Welcome ! <em>".$user_profile['name']."</em></p>";
                echo "<a class='logout' href='$logout_url'>Logout</a>";
                ?></h2>
            <hr/>
            <h3><u>Profile</u></h3>
            <?php
            echo "<p>First Name : ".$user_profile['first_name']."</p>";
            echo "<p>Last Name : ".$user_profile['last_name']."</p>";
            echo "<p>Gender : ".$user_profile['gender']."</p>";
            echo "<p>Facebook URL : "."<a href=".$user_profile['link']." target='_blank'"."> https://www.facebook.com/".$user_profile['id']."</a></p>";
            ?>
        </div>
    </div>
</div>
<!--Login Facebook-->
<div id="login">
    <h2>CodeIgniter : Login Facebook via Oauth 2.0</h2>
    <?php echo "<a href='$login_url'><img class='fb' src=".base_url()."images/fb.png"."></a>"; ?>
</div>
<!--End login facebook-->
<!-- Portfolio--><a id="portfolio" href="#" onclick="goBack()" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="#" onclick="goBack()" title="Follow me!"><i class="fa fa-codepen"></i></a>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script src='public/themes/js/jquery-1.7.2.min.js'></script>
<script src="public/admin/js/index.js"></script>

</body>
</html>
