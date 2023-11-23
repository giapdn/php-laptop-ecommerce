<?php
$username = $_POST["username"];
$password = $_POST["password"];
$rePassword = $_POST["rePassword"];

if ($password !== $rePassword) {
    echo "<script>alert('Mật khẩu không khớp !')</script>";
    echo "<script>window.location.href='../views/login.php'</script>";
} elseif (strlen($username) < 5 || strlen($username) > 10) {
    echo "<script>alert('Tên tài khoản không ngắn hơn 5 kí tự và không dài quá 10 kí tự !')</script>";
    echo "<script>window.location.href='../views/login.php'</script>";
} else {
    include "pdo.php";
    // $query = "SELECT * FROM `users` WHERE `userName` = '$username'";
    $sql = "INSERT INTO `users`(`userName`,`password`) VALUES('$username','$password')";
    pdo_execute($sql);
    echo "<script>alert('Đăng ký thành công, hãy đăng nhập');</script>";
    echo "<script>window.location.href='../views/login.php'</script>";

    // if (count($data) == 0) {
    //     
    //     if (pdo_execute($sql)) {
    //         echo "<script>alert('Đăng ký thành công, hãy đăng nhập')</script>";
    //         echo "<script>window.location.href='../views/login.php'</script>";
    //     } else {
    //         echo "<script>alert('Có lỗi xảy ra, thử lại sau')</script>";
    //         echo "<script>window.location.href='../views/login.php'</script>";
    //     }
    // } else {
    //     echo "<script>alert('Tài khoản đã tồn tại.')</script>";
    //     echo "<script>window.location.href='../views/login.php'</script>";
    // }
}
