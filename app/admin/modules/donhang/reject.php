<?php
include "../models/pdo.php";

$user = $_POST["user"];
$orderID = $_POST["orderID"];
$sql = "UPDATE donhang SET trangThai = 'pending' WHERE id_donHang = '$orderID'";
pdo_execute($sql);
$x = "INSERT INTO thongbao(userName, noidung, dateCreate, id_donHang) VALUES ('$user', 'Yêu cầu huỷ đơn của bạn bị từ chối, đơn hàng sẽ tiếp tục được giao đến bạn.', NOW(), '$orderID')";
pdo_execute($x);
echo json_encode(['user' => $user, 'orderID' => $orderID]);
