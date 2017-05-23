<!DOCTYPE html>
<html >
<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
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
            bottom: -10px;
        }
        .r_error{
            color: #ed2553;
            font-size: 13px;
            margin-bottom: -15px;
            position: absolute;
            top: 12px;
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
    <div class="card"></div>
    <div class="card">
        <h1 class="title">Quên mật khẩu</h1>
        <?php
        if(isset($error))
            echo '<div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              '.$error.'
            </div>';
        elseif(isset($message))
            echo '<div class="alert alert-info" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              '.$message.'
            </div>';
        if(isset($redirect)) echo '<script>setTimeout(function(){window.location.replace("'.$redirect.'");}, 2000);</script>';
        ?>
        <form method="post" action="user/forgot" name="login">
            <input type="hidden" name="dologin" value="true"/>
            <div class="input-container">
                <input name="email" type="text" id="email" autocomplete="on" />
                <label for="email">Email đăng nhập</label>
            </div>
            <div class="button-container">
                <button name="login" type="submit"><span>Send</span></button>
            </div>
        </form>
    </div>
</div>
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
