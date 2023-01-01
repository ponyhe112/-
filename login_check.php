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


$resql = "select * from reader_card where reader_id={$username} and passwd='{$password}'";
$reres = mysqli_query($dbc, $resql);

if (mysqli_num_rows($reres) == 1) {

    session_start();
    $_SESSION['username'] = $username;

    echo "<script>window.location='reader_index.php'</script>";
} else {
    echo "<script>alert('用户名或密码错误，请重新输入!');
    window.location='index.php'
   ;</script>";

}


?>