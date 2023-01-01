<?php
session_start();
$username = $_SESSION['username'];
include('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书管理员系统</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            width: 100%;
            overflow: hidden;
            background: url("图书馆.jpg") no-repeat;
            background-size: cover;
            color: antiquewhite;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">图书管理员系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">书籍管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">全部书籍</a></li>
                        <li><a href="admin_book_add.php">增加图书</a></li>
                    </ul>
                </li>

                <li><a href="admin_borrow_info.php">借还管理</a></li>
                <li><a href="admin_borrow_record.php">借阅记录</a></li>
                <li><a href="admin_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>


<h3 style="text-align: center">欢迎<span style="color: #00ffed"><?php echo $username; ?></span>管理员</h3><br/><br/><br/>
<h4 style="text-align: center;font-size: 40px;"><?php
    $sql = "select count(*) a from book_info;";

    $res = mysqli_query($dbc, $sql);
    $result = mysqli_fetch_array($res);
    echo "当前共有图书{$result['a']}本。";
    ?>
</h4>

<h4 style="text-align: center;font-size: 40px;">
    <?php
    $sqla = "select count(*) b from reader_card;";

    $resa = mysqli_query($dbc, $sqla);
    $resulta = mysqli_fetch_array($resa);
    echo "共有读者{$resulta['b']}位。";

    ?>
</h4>



</body>
</html>