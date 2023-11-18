<?php
if (isset($_POST["prod-delete-btn"])) {
    $prodID = $_POST["prodID"];
    $sql = "DELETE FROM `products` WHERE `prodID` = '$prodID'";
    try {
        include "./database.php";
        if ($conn->query($sql)) {
            echo "<script>alert('Xoá thành công !')</script>";
            echo "<script>window.location.href='../index.php?act=prodList';</script>";
        }
        else {
            echo "<script>alert('Có lỗi xảy ra, thử lại sau.')</script>";
            echo "<script>window.location.href='../index.php?act=prodList';</script>";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "OOP !: " . $th->getMessage();
    } finally {
        $conn->close();
    }
}
