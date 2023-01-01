<?php
session_start();
$username = $_SESSION['username'];
include('mysqli_connect.php');

$bookid = $_GET['id'];
date_default_timezone_set("PRC");
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>管理员归还图书</title>
        <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    </body>
    </html>

<?php

$sqle = "select sernum from lend_list where book_id={$bookid}";
$rese = mysqli_query($dbc, $sqle);
$resulte = mysqli_fetch_array($rese);
//DELETE FROM `lend_list` WHERE `lend_list`.`sernum` = 1
$sqlc = "DELETE FROM `lend_list` where sernum={$resulte['sernum']};";
$sqld = "UPDATE book_info set state=1 where book_id={$bookid};";
$resc = mysqli_query($dbc, $sqlc);
$resd = mysqli_query($dbc, $sqld);

if ($resc == 1 && $resd == 1)
    echo "<script>alert('还书成功！');window.location.href='admin_borrow_info.php'; </script>";
else echo "<script>alert('还书失败！');</script>";
    echo mysqli_error($dbc);
//    window.location.href='admin_borrow_info.php'; ;
?>