<?php
include "../models/pdo.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prodID = $_POST["prodID"];
    $soluong = $_POST["soluong"];
    if (isset($_POST["store"])) {
        $store = $_POST["store"];
        $sql = "SELECT `price` FROM bienthe_sanpham WHERE `gb` = '$store' AND id_sanPham = '$prodID'";
        $result = pdo_query_one($sql);
        $finalAmount = $result["price"] * $soluong;
        echo $finalAmount;
    } else {
        $sql = "SELECT `giaSanPham` FROM sanpham WHERE id_sanPham = '$prodID'";
        $result = pdo_query_one($sql);
        $finalAmount = $result["giaSanPham"] * $soluong;
        echo $finalAmount;
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
