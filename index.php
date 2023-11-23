<?php
session_start();
include "app/home/views/header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangsanpham':
            include "app/home/views/trangsanpham.php";
            break;
        case 'listSPbyDM':
            include "app/home/views/trangsanpham.php";
            break;
        case 'logIn':
            echo "<script>window.location.href='../duan1/app/home/modules/account/views/login.php'</script>";
            break;
        case 'lienhe':
            include "app/home/controllers/lienhe.php";
            break;
        case 'hotSearch':
            include "app/home/views/trangsanpham.php";
            break;
        case 'addToCart':
            $id = $_GET["id_sanPham"];
            $x = $_SESSION["username"];
            $sql = "INSERT INTO `giohang`(`userName`, `id_sanPham`, `soLuong`) VALUES ('$x','$id','1'";
            pdo_execute($sql);
            echo "<script>alert('Thêm vào giỏ hàng thành công !')</script>";
            echo "<script>window.location.href='../duan1/index.php?act=trangsanpham'</script>";


            break;
        case 'tintuc':
            include "app/home/controllers/tintuc.php";
            break;
        case 'chitietsanpham':
            include "app/home/modules/chitietsanpham/chitietSP.php";
            break;
        case 'giohang':
            if (isset($_SESSION["username"])) {
                include "app/home/controllers/giohang.php";
            } else {
                echo "<script>alert('Đăng nhập để theo dõi giỏ hàng của bạn !')</script>";
                echo "<script>window.location.href='modules/account/views/login.php'</script>";
            }
            break;
        default:
            include "app/home/controllers/body.php";
            break;
    }
} else {
    include "app/home/controllers/body.php";
}
include "app/home/views/footer.php";
