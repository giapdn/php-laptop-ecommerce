<?php
include "pdo.php";
if (isset($_POST["categoryID"])) {
    $categoryID = $_POST["categoryID"];
    $categoryName = $_POST["categoryName"];
    $sql = "UPDATE `danhmuc` SET `tendanhmuc`= '$categoryName' WHERE `id_danhmuc`= '$categoryID'";
   
    try {
        if(isset($_POST['data-change']) && ($_POST['data-change'])){
            $a = pdo_query($sql);
            echo "<script>alert('Cập nhật xong !')</script>";
            echo "<script>window.location.href='../index.php?act=categories';</script>";
        } else {
            echo "<script>alert('Tên không được bỏ trống !')</script>";
            echo "<script>window.location.href='../index.php?act=categories';</script>";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "<script>alert(" . $th->getMessage() . ")</script>";
    } finally {
        $a->close();
    }
} else {
    echo "Không có giá trị categoryID được gửi.";
}
