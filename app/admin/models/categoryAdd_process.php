<?php
include "pdo.php";
if (isset($_POST["data-send"])) {
    $categoryName = $_POST["categoryName"];
    $sql = "INSERT INTO `danhmuc`(`tendanhmuc`) VALUES ('$categoryName')";
    try {
        if ($categoryName == "") {
            echo "<script>alert('Dữ liệu không được để trống !')</script>";
            echo "<script>window.location.href='../index.php?act=categoryAdd';</script>";
        } else {
            pdo_execute($sql);
            echo "<script>alert('Nạp dữ liệu thành công !')</script>";
            echo "<script>window.location.href='../index.php?act=categoryAdd';</script>";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "OOP !: " . $th->getMessage();
    }
}
