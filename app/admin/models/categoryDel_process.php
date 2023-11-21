<?php
include "pdo.php";
if (isset($_POST["data-delete"])) {
    $category_id = $_POST["categoryID"];
    $sql = "DELETE FROM `danhmuc` WHERE `id_danhmuc` = '$category_id'";
    $id = pdo_query($sql);
    try {
        
        if(isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc']>0)){
           $a($_GET['id_danhmuc']);
        }
        echo "<script>alert('Xoá thành công !')</script>";
        echo "<script>window.location.href='../index.php?act=categories';</script>";

    } catch (\mysqli_sql_exception $th) {
        echo "OOP !: " . $th->getMessage();
    } finally {
        $id_danhmuc->close();
    }
}
