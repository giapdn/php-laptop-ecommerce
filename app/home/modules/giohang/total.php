<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION["username"])) {
        $id = $_SESSION["username"];
        $sql = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS sumCart
    FROM giohang
    JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
    -- GROUP BY giohang.userName;
    WHERE giohang.userName = '$id';";
        include "../models/pdo.php";
        $data = pdo_query_one($sql);
        // echo json_encode(['newPrice' => $data["sumCart"]]);
        echo '<li>Tổng <span id="g" style="background-color: yellow;color: red;">' . number_format($data["sumCart"], 0, ',', '.') . ' ₫</span></li>';
    }
    // Send a response (you can customize this based on your needs)
    // echo json_encode(['status' => 'success', 'message' => 'Quantity updated successfully']);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
