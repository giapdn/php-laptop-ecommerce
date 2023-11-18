<?php
if (true) {
    $productCode = $_POST["productCode"];
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productDescription = $_POST["productDescription"];
    $productImage = $_FILES["productImage"]["name"];
    $productCategory = $_POST["productCategory"];

    $sql = "UPDATE `products` SET `prodName`='$productName',`prodPrice`='$productPrice',`prodDescription`='$productDescription',
    `prodImg`='$productImage',`category_id`='$productCategory' WHERE `prodID`='$productCode'";
    try {
        if ($productName != "" && $productPrice != "") {
            include "./database.php";
            $conn->query($sql);
            echo "<script>alert('Cập nhật thành công !')</script>";
            echo "<script>window.location.href='../index.php?act=prodList';</script>";
        } else {
            echo "<script>alert('Tên sản phẩm và giá sản phẩm không được bỏ trống !')</script>";
            echo "<script>window.location.href='../index.php?act=prodChange';</script>";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "OOP ! " . $th->getMessage();
    } finally {
        $conn->close();
    }
} else {
    echo "File xử lý không nhận được giá trị nào !";
}
