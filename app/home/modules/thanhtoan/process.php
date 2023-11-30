<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_SESSION["username"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];
    $sum = $_POST["sum"];
    $sql = "INSERT INTO
    `donhang`(`userName`, `ngayDatHang`, `tongGiaDonHang`, `pttt`, `tenNguoiNhan`, `diaChi`, `SDT`)
    VALUES 
    ('$user',NOW(),'$sum','TTKNH','$name','$location','$phone')";
    include "../models/pdo.php";
    pdo_execute($sql);
    $x = "SELECT MAX(id_donHang) AS max FROM donhang";
    $data = pdo_query_one($x);
    extract($data);
    $y = "SELECT * FROM giohang WHERE userName = '$user'";
    $result = pdo_query($y);
    foreach ($result as $rows) {
        $id_sp = $rows["id_sanPham"];
        $soluong = $rows["soluong"];
        $z = "INSERT INTO chitietdonhang(id_donHang, soLuong, id_sanPham) VALUES ('$max', '$soluong', '$id_sp')";
        pdo_execute($z);
    }
    $xoaGH = "DELETE FROM giohang WHERE userName = '$user'";
    pdo_execute($xoaGH);
    header('Content-Type: application/json');
    echo json_encode(['id_donhang' => $max]);
}
