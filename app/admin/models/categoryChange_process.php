<?php
include "pdo.php";
if (isset($_POST["categoryID"])) {
    $categoryID = $_POST["categoryID"];
    $categoryName = $_POST["categoryName"];
    $img_path = $_FILES["img_danhmuc"]["name"];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["img_danhmuc"]["name"]);
    move_uploaded_file($_FILES["img_danhmuc"]["tmp_name"], $target_file);
    $sql = "UPDATE `danhmuc` SET `tendanhmuc`= '$categoryName' ,`img_danhmuc`='$img_path' WHERE `id_danhmuc`= '$categoryID'";
   
    try {
        if(isset($_POST['data-change']) && ($_POST['data-change'])){
            $a = pdo_query($sql);
            echo "<script>alert('Cập nhật xong !')</script>";
           
            echo "<script>window.location.href='../index.php?act=danhmuc';</script>";
        } else {
            echo "<script>alert('Tên không được bỏ trống !')</script>";
            echo "<script>window.location.href='../index.php?act=danhmuc';</script>";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "<script>alert(" . $th->getMessage() . ")</script>";
    } finally {
        $a->close();
    }
} else {
    echo "Không có giá trị categoryID được gửi.";
}


