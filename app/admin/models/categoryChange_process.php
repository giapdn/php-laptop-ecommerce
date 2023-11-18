<?php
if (isset($_POST["categoryID"])) {
    $categoryID = $_POST["categoryID"];
    $categoryName = $_POST["categoryName"];
    $sql = "UPDATE `categories` SET `category_name`= '$categoryName' WHERE `category_id`= '$categoryID'";
    try {
        if ($categoryName != "") {
            include "./database.php";
            $conn->query($sql);
            echo "<script>alert('Cập nhật xong !')</script>";
            echo "<script>window.location.href='../index.php?act=categories';</script>";
        } else {
            echo "<script>alert('Tên không được bỏ trống !')</script>";
            echo "<script>window.location.href='../index.php?act=categories';</script>";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "<script>alert(" . $th->getMessage() . ")</script>";
    } finally {
        $conn->close();
    }
} else {
    echo "Không có giá trị categoryID được gửi.";
}
