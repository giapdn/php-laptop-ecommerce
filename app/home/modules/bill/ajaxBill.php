<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $orderID = $_POST["orderID"];
    include "../models/pdo.php";
    $check = "SELECT trangThai FROM donhang WHERE id_donHang = '$orderID'";
    $flag = pdo_query_one($check);
    if ($flag["trangThai"] == 'pending') {
        $sql = "UPDATE donhang SET trangThai = 'canceled' WHERE id_donHang = '$orderID'";
        pdo_execute($sql);
        header('Content-Type: application/json');
        echo json_encode(["accept" => "yes"]);
    } elseif ($flag["trangThai"] == "confirmed") {
        $sql = "UPDATE donhang SET trangThai = 'cancelConfirming' WHERE id_donHang = '$orderID'";
        pdo_execute($sql);
        header('Content-Type: application/json');
        echo json_encode(["accept" => "no"]);
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
