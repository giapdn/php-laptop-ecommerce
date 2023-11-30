<?php
session_start();
include "../models/pdo.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_SESSION["username"];
    $id_sanpham = $_POST['id_sanPham'];
    $soluong = $_POST['soluong'];
    $update = "UPDATE giohang 
        SET soluong = '$soluong' 
        WHERE id_sanPham = '$id_sanpham' 
        AND userName = '$user';
    ";
    pdo_execute($update);
    $select = "SELECT giohang.soluong * sanpham.giaSanPham AS total
        FROM giohang
        JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham 
        WHERE giohang.userName = '$user' AND giohang.id_sanPham = '$id_sanpham';
    ";
    $result = pdo_query_one($select);
    $total = number_format($result["total"], 0, ',', '.');
    $select2 = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS cartSum
        FROM giohang
        JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
        WHERE giohang.userName = '$user';
    ";
    $data = pdo_query_one($select2);
    $cartSum = number_format($data["cartSum"], 0, ',', '.');
    header('Content-Type: application/json');
    echo json_encode(['newJeans' => $total, 'allIWantForChristmasIsYou' => $cartSum]);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
