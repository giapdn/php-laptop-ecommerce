<?php
session_start();
include "pdo.php";
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT `userName`, `password`  FROM `users` WHERE `userName` = '$username' AND `password` = '$password'";
$data = pdo_query_one($sql);
if (empty($data)) {
    echo "<script>alert('Không tìm thấy tài khoản của bạn, thử lại.');</script>";
    echo "<script>window.location.href='../views/login.php'</script>";
} else {
    $_SESSION["username"] = $username;
    echo "<script>alert('Đăng nhập thành công !');</script>";
    // echo "<script>window.location.href='index.php'</script>";
}
