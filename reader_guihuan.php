<?php
session_start();
$username = $_SESSION['username'];
include('mysqli_connect.php');
$bookid = $_GET['id'];

$sqlc = "select card_state from card_state where card_id={$username}";
$resc = mysqli_query($dbc, $sqlc);
$resultc = mysqli_fetch_array($resc);
if ($resultc['card_state'] == 1) {

    $sqla = "DELETE FROM `lend_list` WHERE `lend_list`.`book_id` = {$bookid};";
    $sqlb = "UPDATE book_info set state=1 where book_id={$bookid}";
    if (mysqli_query($dbc, $sqla) && mysqli_query($dbc, $sqlb))
        echo "<script>alert('归还成功！');window.location.href='reader_borrow.php'; </script>";
    else {
        echo "<script>alert('归还失败！');</script>";
        echo mysqli_error($dbc);
    }
} else {
    echo "<script>alert('借书证已挂失无法借阅');window.location.href='reader_borrow.php';</script>";
}

?>