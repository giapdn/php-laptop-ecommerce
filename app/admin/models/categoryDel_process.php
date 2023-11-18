<?php
if (isset($_POST["data-delete"])) {
    $category_id = $_POST["categoryID"];
    $sql = "DELETE FROM `categories` WHERE `category_id` = '$category_id'";
    try {
        include "./database.php";
        $conn->query($sql);
        echo "<script>alert('Xoá thành công !')</script>";
        echo "<script>window.location.href='../index.php?act=categories';</script>";
    } catch (\mysqli_sql_exception $th) {
        echo "OOP !: " . $th->getMessage();
    } finally {
        $conn->close();
    }
}
