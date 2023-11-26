<?php
session_start();
include "app/home/views/header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangsanpham':
            include "app/home/views/trangsanpham.php";
            break;

            case 'checkout':
                include "app/home/views/checkout.php";
                break;

        case 'listSPbyDM':
            include "app/home/views/trangsanpham.php";
            break;
        case 'logIn':
            echo "<script>window.location.href='app/home/modules/taikhoan/login-register.php'</script>";
            break;
        case 'logOut':
            session_destroy();
            echo "<script>window.location.href='index.php'</script>";
            break;
        case 'hotSearch':
            include "app/home/views/trangsanpham.php";
            break;
        case 'addToCart':
            $id = $_GET["id_sanPham"];
            $user = $_SESSION["username"];
            $sql = "INSERT INTO `giohang`(`userName`, `id_sanPham`) VALUES ('$user','$id')";
            pdo_execute($sql);
            echo "<script>alert('Thêm vào giỏ hàng thành công !')</script>";
            echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
            break;
        case 'delFromCart':
            $id = $_GET["id_sanpham"];
            $user = $_SESSION["username"];
            $sql = "DELETE FROM `giohang` WHERE `userName` = '$user' AND `id_sanPham` = '$id'";
            pdo_execute($sql);
            echo "<script>alert('Xoá thành công !')</script>";
            echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
            break;
        case 'chitietsanpham':
            include "app/home/modules/chitietsanpham/chitietSP.php";
            break;
        case 'giohang':
            if (isset($_SESSION["username"])) {
                include "app/home/modules/giohang/giohang.php";
            } else {
                echo "<script>alert('Đăng nhập để theo dõi giỏ hàng của bạn !')</script>";
                echo "<script>window.location.href='app/home/modules/taikhoan/login-register.php'</script>";
            }
            break;

            case 'thoat':
                session_unset();
                header('Location: index.php');
              
                break;


        case 'thanhtoan':
            echo "<script>alert('Thanh toán thành công, hãy theo dõi trạng thái đơn hàng của bạn ở phần tài khoản !')</script>";
            echo "<script>window.location.href='../duan1/index.php'</script>";
            break;
        default:
            include "app/home/views/trangchu.php";
            break;
    }
} else {
    include "app/home/views/trangchu.php";
}
include "app/home/views/footer.php";
