<?php

session_start();
$username = $_SESSION['username'];
include('mysqli_connect.php');

$bookid = $_GET['id'];

$sqlc = "select card_state from card_state where card_id={$username}";
$GetName = "select * from reader_info where reader_id={$username}";
$resc = mysqli_query($dbc, $sqlc);
$res_getname = mysqli_query($dbc, $GetName);
$resultc = mysqli_fetch_array($resc);
$result_getname = mysqli_fetch_array($res_getname);
if ($resultc['card_state'] == 1) {

    $sqla = "insert into lend_list(book_id,reader_id,lend_date) values ({$bookid},{$username},NOW()) ;";
    $sqlb = "UPDATE book_info set state=0 where book_id={$bookid}";
    $sql_record = "insert into lend_record(lend_date,book_id,reader_id,reader_name) values (NOW(),{$bookid},{$username},'{$result_getname['name']}')";
    if (mysqli_query($dbc, $sqla) && mysqli_query($dbc, $sqlb) && mysqli_query($dbc, $sql_record))
        echo "<script>alert('借阅成功！');window.location.href='reader_querybook.php'; </script>";
    else {
        echo "<script>alert('借阅失败！');</script>";
        echo mysqli_error($dbc);
    }
} else {
    echo "<script>alert('借书证已挂失无法借阅');window.location.href='reader_querybook.php';</script>";
}

