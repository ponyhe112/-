<?php
header('Content-Type:text/html;charset=utf-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
error_reporting(0);
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library1";

$uname = $_POST['username'];
$upswd = $_POST['password'];

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "SELECT * FROM reader_card where `reader_id`='$uname'";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('该用户名已存在，请重新注册！');
                location.href='register.php';</script>";
    exit(0);
}

$sql = " INSERT INTO `library1`.`reader_card` (`reader_id`, `passwd`) 
      VALUES ('$uname', '$upswd')";

$sql2 = "INSERT INTO `reader_info` (`reader_id`) VALUES ('$uname')";
$sql3 = "INSERT INTO `card_state` (`card_id`,`card_state`) VALUES ('$uname',1)";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
    $_SESSION['username'] = $uname;
    echo "<script>alert('注册成功');
    location.href='full_info.php';</script>";

} else {
    echo mysqli_error($conn);
}


mysqli_close($conn);
exit(0);
