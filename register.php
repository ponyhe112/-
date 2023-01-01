<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
    <!--    <link rel="stylesheet" href="css/register.css">-->
</head>
<style>
    .error {
        color: rgb(32, 23, 23);
    }

    body {
        background: url("图书馆.jpg");
        background-size: cover;
        background-attachment: fixed;
    }

    .registerbox {
        position: relative;
        width: 800px;
        height: 360px;
        background-color: antiquewhite;
        border-radius: 30px;
        padding: 30px;
        float: right;
        margin-right: 335px;
        text-align: center;
        margin-top: 123px;
        align-items: center;
    }

    .tip_font {
        position: absolute;
        color: #050505;
        font-size: 30px;
        left: 15px;
        float: left;
    }

    .innner-box {
        position: relative;
        /* background-color: yellow; */
        width: 287px;
        height: 213px;
        margin-top: 40px;
        margin-left: 254px;
    }

    .input_text {
        border-radius: 30px;
        height: 33px;
        width: 249px;
    }

    .submitbutton {
        border-radius: 30px;
        height: 63px;
        width: 159px;
        font-size: 30px;
        color: #070707;
        box-shadow: black 3px 3px 3px;
        background-color: rgb(0, 195, 255);
    }

    .header_text {
        color: #000000;
    }
</style>
<body>
<?php
error_reporting(0);


?>
<div class="registerbox">
    <form action="regester_inmysql.php" method="post">
        <div class="innner-box">
            <h1 class="header_text">账号注册</h1>
            <span class="tip_font">学号： </span><br><br>
            <input type="text" id="username" name="username" class="input_text" placeholder="在此输入学号"><span
                    class="error"></span><br>
            <span class="tip_font">密码： </span><br><br>
            <input type="password" id="password" name="password" class="input_text" placeholder="在此输入密码"><span
                    class="error"></span><br>
            <br>
            <input type="button" id="zhuce" value="注册" class="submitbutton" onclick="regsiter()">
        </div>
    </form>
</div>
<script type="text/javascript" src="js/register_check.js"></script>
</body>

</html>