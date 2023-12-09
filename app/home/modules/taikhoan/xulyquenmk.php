<?php
include "../models/pdo.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form (ví dụ: email người dùng nhập vào)
    $username = $_POST["username"];
    $email = $_POST['email'];
    $name = $_POST["name"];
    $sdt = $_POST["sdt"];

    if (isValidEmail($email) && isValidPhoneNumber($sdt)) {
        $sql = "SELECT * FROM users WHERE userName = '$username' AND `name` = '$name' AND sdt = '$sdt' AND email = '$email'";
        $result = pdo_query_one($sql);
        if (empty($result)) {
            echo '<script>alert("Thông tin không khớp !")</script>';
            echo "<script>window.location.href='login.php'</script>";
        } else {
            $newPassword = generateRandomPassword();
            $sql = "UPDATE users SET `password` = '$newPassword' WHERE userName = '$username'";
            pdo_execute($sql);
            echo '<script>alert("Mật khẩu mới: ' . $newPassword . ', hãy ghi nhớ và bảo mật nó cẩn thận !")</script>';
            echo "<script>window.location.href='login.php'</script>";
        }
    } else {
        echo '<script>alert("Không tìm thấy tài khoản của bạn")</script>';
        echo "<script>window.location.href='login.php';</script>";
    }
}

function generateRandomPassword($length = 8)
{
    // Hàm tạo mật khẩu ngẫu nhiên
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

function isValidEmail($email)
{
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}


function isValidPhoneNumber($phoneNumber)
{
    $pattern = '/^(\+?84|0)(3[2-9]|5[6-9]|7[0-9]|8[1-9]|9[0-9])\d{7}$/';
    return preg_match($pattern, $phoneNumber);
}
