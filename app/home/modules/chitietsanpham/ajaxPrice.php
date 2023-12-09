<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $store = $_POST["store"];
    $prodID = $_POST["prodID"];
    $sql = "SELECT `price` FROM bienthe_sanpham WHERE `gb` = '$store' AND id_sanPham = '$prodID'";
    include "../models/pdo.php";
    $result = pdo_query_one($sql);
    echo $result["price"];
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
