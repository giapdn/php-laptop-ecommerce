<?php
include "../models/pdo.php";

$user = $_POST["user"];
$orderID = $_POST["orderID"];
$sql = "UPDATE donhang SET trangThai = 'canceled' WHERE id_donHang = '$orderID'";
pdo_execute($sql);
$x = "INSERT INTO thongbao(userName, noidung, dateCreate, id_donHang) VALUES ('$user', 'Đơn hàng của bạn đã được huỷ.', NOW(), '$orderID')";
pdo_execute($x);
echo json_encode(['user' => $user, 'orderID' => $orderID]);
