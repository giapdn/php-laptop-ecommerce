<?php
session_start();
include "./app/home/models/pdo.php";
include "app/home/views/header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangsanpham':
            include "app/home/modules/trangsanpham/trangsanpham.php";
            break;
        case 'listSPbyDM':
            include "app/home/modules/trangsanpham/trangsanpham.php";
            break;
        case 'hotSearch':
            include "app/home/modules/trangsanpham/trangsanpham.php";
            break;
        case 'chitietsanpham':
            include "app/home/modules/chitietsanpham/chitietSP.php";
            break;
        case 'thanhtoan':
            include "app/home/modules/thanhtoan/thanhtoan.php";
            break;
        case 'defaultPay':
            include "app/home/modules/thanhtoan/thanhtoan.php";
            break;
        case 'momo':
            include "app/home/modules/thanhtoan/thanhtoan.php";
            break;
        case 'paypal':
            include "app/home/modules/thanhtoan/thanhtoan.php";
            break;
        case 'tttk':
            echo "<script>window.location.href='app/home/modules/taikhoan/tttk.php'</script>";
            break;
        case 'logIn':
            echo "<script>window.location.href='app/home/modules/taikhoan/login-register.php'</script>";
            break;
        case 'logOut':
            session_destroy();
            echo "<script>window.location.href='../duan1/index.php'</script>";
            break;
        case 'giohang':
            if (isset($_SESSION["username"])) {
                include "app/home/modules/giohang/giohang.php";
            } else {
                echo "<script>alert('Đăng nhập để theo dõi giỏ hàng của bạn !')</script>";
                echo "<script>window.location.href='app/home/modules/taikhoan/login-register.php'</script>";
            }
            break;
        case 'addToCart':
            $id = $_GET["id_sanPham"];
            $check = "SELECT * FROM giohang WHERE id_sanPham = '$id'";
            $flag = pdo_query_one($check);
            if (empty($flag)) {
                $user = $_SESSION["username"];
                $sql = "INSERT INTO `giohang`(`userName`, `id_sanPham`) VALUES ('$user','$id')";
                pdo_execute($sql);
                echo "<script>alert('Thêm vào giỏ hàng thành công !')</script>";
                echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
            } else {
                $add = "UPDATE giohang SET soluong = soluong + 1 WHERE id_sanPham = '$id'";
                pdo_execute($add);
                echo "<script>alert('Tăng số lượng trong giỏ hàng thành công !')</script>";
                echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
            }
            break;
        case 'delFromCart':
            $id = $_GET["id_sanpham"];
            $user = $_SESSION["username"];
            $sql = "DELETE FROM `giohang` WHERE `userName` = '$user' AND `id_sanPham` = '$id'";
            pdo_execute($sql);
            // echo "<script>alert('Xoá thành công !')</script>";
            echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
            break;
        default:
            include "app/home/views/trangchu.php";
            break;
    }
} else {
    include "app/home/views/trangchu.php";
}
include "app/home/views/footer.php";
