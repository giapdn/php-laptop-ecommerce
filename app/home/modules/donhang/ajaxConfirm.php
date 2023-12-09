<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $orderID = $_POST["orderID"];
    $pttt = $_POST["pttt"];
    if ($pttt == "TTKNH") {
        $update = "UPDATE donhang SET pttt = 'TTKNH-paid' WHERE id_donHnag = '$orderID'";
        pdo_execute($update);
    }
    $user = $_SESSION["username"];
    $sql = "UPDATE donhang SET trangThai = 'success' WHERE id_donHang = '$orderID'";
    $alert = "INSERT INTO thongbao (`userName`, noidung, dateCreate, id_donHang) VALUES ('$user', 'Bạn vừa xác nhận đã nhận đơn hàng, mong bạn hài lòng về sản phẩm của chúng tôi !', NOW(), '$orderID')";
    include "../models/pdo.php";
    pdo_execute($sql);
    pdo_execute($alert);
    echo json_encode(['user' => $user, 'orderID' => $orderID]);
}
