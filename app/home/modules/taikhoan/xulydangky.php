<?php
$username = $_POST["username"];
$password = $_POST["password"];
$rePassword = $_POST["rePassword"];
include "../models/pdo.php";
$pattern = '/^[a-z0-9]+$/';
if ($password !== $rePassword) {
    echo "<script>alert('Mật khẩu không khớp !')</script>";
    echo "<script>window.location.href='login.php'</script>";
} elseif (strlen($username) < 4 || strlen($username) > 10 || preg_match($pattern, $username) == 0) {
    echo "<script>alert('Tên tài khoản không ngắn hơn 4 kí tự và không dài quá 10 và chỉ chấp nhận kí tự a-z,0-9 !')</script>";
    echo "<script>window.location.href='login.php'</script>";
} else {
    $check = "SELECT * FROM users WHERE userName = '$username'";
    $flag = pdo_query_one($check);
    if (empty($flag)) {
        $sql = "INSERT INTO `users`(`userName`,`password`) VALUES('$username','$password')";
        pdo_execute($sql);
        echo "<script>alert('Đăng ký thành công, hãy đăng nhập');</script>";
        echo "<script>window.location.href='login.php'</script>";
    } else {
        echo "<script>alert('Tài khoản đã tồn tại.');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}
