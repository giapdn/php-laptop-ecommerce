<?php
if (isset($_POST["prod-data-send"])) {
    $productCode = $_POST["productCode"];
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productDescription = $_POST["productDescription"];
    $productImage = $_FILES["productImage"]["name"];
    $productCategory = $_POST["productCategory"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
    $sql = "INSERT INTO `products`(`prodID`, `prodName`, `prodPrice`, `prodDescription`, `prodImg`, `category_id`, `dateAdd`)
            VALUES ('$productCode','$productName','$productPrice','$productDescription','$productImage','$productCategory', NOW())";
   
        move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_dir);
        include "database.php";
        $conn->query($sql);
        echo "<script>alert('Nạp dữ liệu thành công !')</script>";
        echo "<script>window.location.href='../index.php?act=products';</script>";
 
}
