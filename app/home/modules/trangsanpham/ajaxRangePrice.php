<?php
include "../models/pdo.php";
include "../models/methods.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $min = $_POST["min"];
    $max = $_POST["max"];

    $sql = "SELECT * FROM sanpham WHERE giaSanPham >= '$min' AND giaSanPham <= '$max'";;
    $result = pdo_query($sql);
    if (empty($result)) {
        # code...
    } else {
        showSanPham($sql);
    }
}
