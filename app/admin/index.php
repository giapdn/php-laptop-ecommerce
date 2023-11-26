<?php
include "header.php";
include "models/pdo.php";
if (isset($_GET["act"])) {
    $action = $_GET["act"];
    switch ($action) {


        case 'danhmuc':
            include "./views/danhmuc.php";
            break;

        case 'home':
            include "./views/main.php";
            break;

        case 'quanlysp':
            include "./views/quanlysp.php";
            break;

        case 'quanlythanhvien':
            include "./views/quanlythanhvien.php";
            break;
        case 'userDel':
            if (isset($_POST["xoauser"])) {
                $name = $_GET["name"];
                $sql = "DELETE FROM `users` WHERE `userName` = '$name'";    
                    pdo_query($sql);
                    echo '<script>alert("Xoá thành công");</script>';
                    echo '<script>window.location.href="index.php?act=quanlythanhvien"</script>';
                }
        case 'userChange':
            include "controllers/userChange.php";
        case 'userChange' :
            if(isset($_POST["userChange"])){
                $id = $_GET["id"];
                $userName = $_POST["userName"];
                $quyenHan = $_POST["quyenHan"];
                $sql = "UPDATE `users` SET `quyenHan`='$quyenHan'
                WHERE `userName`='$id'";
                pdo_execute($sql);
                echo "<script>alert('Sửa thành công !')</script>";
                echo '<script>window.location.href="index.php?act=quanlythanhvien"</script>';
            }
        break;

        case 'quanlydonhang':
            include "./views/quanlydonhang.php";
            break;


        case 'ctgryAddForm':
            include "./controllers/category-add.php";
           

         case 'themdanhmuc':
            if (isset($_POST["data-send"])) {
                $categoryName = $_POST["categoryName"];
                $sql = "INSERT INTO `danhmuc`(`tendanhmuc`) VALUES ('$categoryName')";
                try {
                    if ($categoryName == "") {
                        echo "<script>alert('Dữ liệu không được để trống !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=ctgryAddForm';</script>";
                    } else {
                        pdo_execute($sql);
                        echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=danhmuc';</script>";
                    }
                } catch (\mysqli_sql_exception $th) {
                    echo "OOP !: " . $th->getMessage();
                }
            }
        break;

        case 'categoryDel':
            if (isset($_POST["categoryID"])) {
                $category_id = $_POST["categoryID"];
                $sql = "DELETE FROM `danhmuc` WHERE `id_danhmuc` = '$category_id'";
                pdo_execute($sql);
                echo "<script>alert('Xoá thành công !')</script>";
                echo "<script>window.location.href='../admin/index.php?act=danhmuc';</script>";
            } 
        break;

        case 'categoryChange':
            include "controllers/category-change.php";
        break;

        case 'prodDel':
            if (isset($_POST["prod-delete-btn"])) {
                $prodID = $_GET["id"];
                $sql = "DELETE FROM `sanpham` WHERE `id_sanPham` = '$prodID'";
                try {
                    pdo_execute($sql);
                    echo "<script>alert('Xoá thành công !')</script>";
                    echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                } catch (\PDOException $th) {
                    die("Something went wrong !");
                }
            }
        break;

        case 'formadd':
            include "controllers/prodAdd.php";
        break;
        case 'addSp':
            $prodName = $_POST["prodName"];
            $prodPrice = $_POST["prodPrice"];
            $prodDesc = $_POST["prodDesc"];
            $prodImg = $_FILES["prodImg"]["name"];
            $prodCategory = $_POST["productCategory"];
            $target_dir = "uploads/";
            $flag = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $target_file = $target_dir . basename($_FILES["prodImg"]["name"]);
            $sql = "INSERT INTO `sanpham`(`tenSanPham`, `giaSanPham`, `moTaSanPham`, `img_path`, `id_danhmuc`, `dateAdd`)
            VALUES ('$prodName','$prodPrice','$prodDesc','$prodImg','$prodCategory', NOW())";
            if (isset($_POST["prod-data-send"])) {
                $check = getimagesize($_FILES["prodImg"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["prodImg"]["tmp_name"], $target_file) == false) {
                        die("OOP !");
                    }
                    pdo_execute($sql);
                    echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                    echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                } else {
                    echo "File is not an image.";
                }
            }
        break;

        case 'prodChange':
            include "controllers/prodChange.php";
            break;
        case 'prodChangeProcess':
            $prodID = $_GET["id"];
            $prodName = $_POST["prodName"];
            $prodPrice = $_POST["prodPrice"];
            $prodDesc = $_POST["prodDesc"];
            $prodImg = $_FILES["prodImg"]["name"];
            $productCategory = $_POST["productCategory"];
            $sql = "UPDATE `sanpham` SET `tenSanPham`='$prodName',`giaSanPham`='$prodPrice',`moTaSanPham`='$prodDesc',
                `img_path`='$prodImg',`id_danhmuc`='$productCategory' WHERE `id_sanPham`='$prodID'";
            $target_dir = "uploads/";
            $flag = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $target_file = $target_dir . basename($_FILES["prodImg"]["name"]);
            if (isset($_POST["prod-data-change"])) {
                $check = getimagesize($_FILES["prodImg"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["prodImg"]["tmp_name"], $target_file) == false) {
                        die("OOP !");
                    }
                    pdo_execute($sql);
                    echo "<script>alert('Sửa thành công !')</script>";
                    echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                } else {
                    $query = "UPDATE `sanpham` SET `tenSanPham`='$prodName',`giaSanPham`='$prodPrice',`moTaSanPham`='$prodDesc',
                    `id_danhmuc`='$productCategory' WHERE `id_sanPham`='$prodID'";
                    pdo_execute($query);
                    echo "<script>alert('Sửa thành công !')</script>";
                    echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                }
            }
            break;

        case 'cart':
            include "views/quanlydonhang.php";
        break;

        case 'suadonhang':
            include "controllers/suadonhang.php";
        case 'sdonhang':
            if(isset($_POST["sdonhang"])){
                $id = $_GET["id"];
                $id_donHang = $_POST["id_donHang"];
                $trangThai = $_POST["trangThai"];
                $sql = "UPDATE `donhang` SET `trangThai`='$trangThai'
                WHERE `id_donHang`='$id'";
                
                    pdo_execute($sql);
                    echo "<script>alert('Sửa thành công !')</script>";
                    echo '<script>window.location.href="index.php?act=cart"</script>';
            }
        break;

        case 'donhangxoa':
            if(isset($_POST["xoaudonhang"])){
                $id_donHang = $_GET["id_donHang"];
                $sql = "DELETE FROM `donhang` WHERE `id_donHang`= '$id_donHang' ";
                pdo_query($sql);
                echo '<script>alert("Xoá thành công");</script>';
                echo '<script>window.location.href="index.php?act=cart"</script>';
            }
        break;

        case 'commentList':
            include "views/commentList.php";
        break;
        
        case 'commentDel':
            if (isset($_POST["xoabl"])) {
                $id = $_GET["id"];
                $sql = "DELETE FROM `binhluan` WHERE `id_binhLuan`= '$id'";
                pdo_query($sql);
                echo '<script>alert("Xoá thành công");</script>';
                echo '<script>window.location.href="index.php?act=commentList"</script>';
            }
        break;

        case 'thongke':
            include "views/bieudolist.php";
            break;

        case 'bieudo':
            include "controllers/bieudo.php";
        break;
    default:
        include "./views/main.php";
    break;
    }
} else {
}
