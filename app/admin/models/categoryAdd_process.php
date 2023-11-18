<?php
if (isset($_POST["data-send"])) {
    $categoryID = $_POST["categoryID"];
    $categoryName = $_POST["categoryName"];
    $sql = "INSERT INTO `categories`(`category_id`, `category_name`) VALUES ('$categoryID','$categoryName')";
    try {
        include "./database.php";
        if ($categoryID == "" && $categoryName == "") {
            echo "<script>alert('Dữ liệu không được để trống !')</script>";
            echo "<script>window.location.href='../index.php?act=categoryAdd';</script>";
        } else {
            $conn->query($sql);
            echo "<script>alert('Nạp dữ liệu thành công !')</script>";
            echo "<script>window.location.href='../index.php?act=categoryAdd';</script>";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "OOP !: " . $th->getMessage();
    } finally {
        $conn->close();
    }
}
