<?php
$username = $_POST["username"];
$password = $_POST["password"];
$rePassword = $_POST["rePassword"];
$pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$/";


if ($password !== $rePassword) {
    echo "<script>alert('Mật khẩu không khớp !')</script>";
    echo "<script>window.location.href='login.php'</script>";
} elseif (strlen($username) < 5 || strlen($username) > 10) {
    echo "<script>alert('Tên tài khoản không ngắn hơn 5 kí tự và không dài quá 10 kí tự !')</script>";
    echo "<script>window.location.href='login.php'</script>";
} else {
    $sql = "INSERT INTO `users`(`userName`,`password`) VALUES('$username','$password')";
    include "../models/pdo.php";
    pdo_execute($sql);
    echo "<script>alert('Đăng ký thành công, hãy đăng nhập');</script>";
    echo "<script>window.location.href='login.php'</script>";

  
}
