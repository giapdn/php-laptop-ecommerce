<?php
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
        case 'tintuc':
            include "app/home/controllers/tintuc.php";
            break;
        case 'giohang':
            include "app/home/controllers/giohang.php";
            break;
        default:
            # code...
            break;
    }
} else {
    include "app/home/controllers/body.php";
}
include "app/home/views/footer.php";
