<?php
session_start();
if (isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>图书馆借阅系统</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <style>
        body {
            width: 100%;
            overflow: hidden;
            background: url("图书馆2.jpeg") no-repeat;
            background-size: cover;
            color: antiquewhite;

        }

        #login_box {
            width: 100%;
            height: calc(100% - 128px);
            padding: 40px 25px 16px;
            box-sizing: border-box;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            clear: both;
            /*background-color: red;*/
            /*border: 2px solid red;*/
        }
    </style>


</head>

<body>
<div id="login_box">
    <h1 style="text-align: center"><strong>欢迎使用图书借阅系统</strong></h1>
    <div style="padding: 180px 550px 10px;text-align: center">
        <form action="login_check.php" class="login_box" id="act" method="POST">
            <div id="login">
                <div class="input-group"><span class="input-group-text">学号</span><input name="account" type="text"
                                                                                        placeholder="请输入学号或管理员账号"
                                                                                        class="form-control"></div>
                <br><br>
                <div class="input-group"><span class="input-group-text">密码</span><input name="pass" type="password"
                                                                                        placeholder="请输入密码"
                                                                                        class="form-control"></div>

                <span style="font-size: 20px;"><b><i>请选择你的身份↓</i></b></span>
                <div class="form-check"><!--选择学生或管理员-->
                    <input type="radio" class="form-check-input" id="xuesheng" name="isadmin" value="学生" checked>
                    <label class="form-check-label" for="radio1"><span style="color: white">我是学生</span></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="admin" name="isadmin" value="管理员">
                    <label class="form-check-label" for="radio2"><span style="color: white">我是管理员</span></label>
                </div><!--选择学生或管理员-->
                <input type="submit" value="登录" class="btn btn-success" style="width: 200px;" onclick="login()"><br>
                <span>暂无账号？先注册一个吧↓</span><br>
                <input type="submit" value="注册" id="zhuce" class="btn btn-info" style="width: 200px;"
                       onclick="register()">
            </div>
        </form>
    </div>
</div>
</body>

</html>