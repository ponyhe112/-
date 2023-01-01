<?php

session_start();
$username = $_SESSION['username'];
include('mysqli_connect.php');

$state = $_GET['id'];

if ($state == 1) {
    $sql = "update card_state set card_state=0 where card_id={$username}";
    $res = mysqli_query($dbc, $sql);

    if ($res == 1) {
        echo "<script>alert('挂失成功！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    } else {
        echo "<script>alert('挂失失败！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    }

} else {

    $sqla = "update card_state set card_state=1 where card_id={$username}";
    $resa = mysqli_query($dbc, $sqla);

    if ($resa == 1) {
        echo "<script>alert('取消挂失成功！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    } else {
        echo "<script>alert('取消挂失失败！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
