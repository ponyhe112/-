<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

</body>
</html>
<?php
include('mysqli_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["account"];
    $password = $_POST["pass"];
}
$adsql = "select * from admin where admin_id={$username} and password='{$password}'";
$adres = mysqli_query($dbc, $adsql);



if (mysqli_num_rows($adres) == 1) {
    session_start();
    $_SESSION['username'] = $username;//管理员
    echo "<script>window.location='admin_index.php'</script>";

} else  {
echo "<script>alert('管理员账号或密码错误，请重新输入!');
    window.location='index.php'
   ;</script>";
}





?>