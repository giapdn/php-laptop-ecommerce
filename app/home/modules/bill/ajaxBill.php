<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $orderID = $_POST["orderID"];
    $sql = "UPDATE donhang SET trangThai = 'cancelConfirming' WHERE id_donHang = '$orderID'";
    include "../models/pdo.php";
    pdo_execute($sql);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
