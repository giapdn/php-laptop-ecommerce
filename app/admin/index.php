<?php
session_start();
session_start();
include "models/pdo.php";
include "header.php";
include "header.php";
if (isset($_GET["act"])) {
    $action = $_GET["act"];
    switch ($action) {
        case 'searchOrder':
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                include "./views/quanlydonhang.php";
            }
            break;
        case 'searchOrder':
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                include "./views/quanlydonhang.php";
            }
            break;
        case 'danhmuc':
            include "./views/danhmuc.php";
            break;
        case 'quanlybienthe':
            include "./modules/bienthe/listBienthe.php";
            break;
        case 'variantChange_Form':
            include "modules/bienthe/variantChange_Form.php";
            break;
        case 'variantChange_Process':
            $ID = $_POST["ID"];
            $prodID = $_POST["prodID"];
            $chip = $_POST["chip"];
            $ram = $_POST["ram"];
            $gb = $_POST["gb"];
            $display = $_POST["display"];
            $color = $_POST["color"];
            $weight = $_POST["weight"];
            $price = $_POST["price"];
            $push = "UPDATE `bienthe_sanpham` SET `chip`='$chip',`ram`='$ram',`gb`='$gb',`display`='$display',`color`='$color',`price`='$price',`weight`='$weight' WHERE ID = '$ID'";
            pdo_execute($push);
            include "./modules/bienthe/listBienthe.php";
            break;
        case 'variantDel':
            $ID = $_GET["ID"];
            $del_Variant = "DELETE FROM bienthe_sanpham WHERE `ID` = '$ID'";
            pdo_execute($del_Variant);
            echo '<script>window.location.href="index.php?act=quanlybienthe"</script>';
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
                echo '<script>window.location.href="index.php?act=quanlythanhvien"</script>';
            }
        case 'userChange':
            include "controllers/userChange.php";
            break;
        case 'userChangeProcess':
            $id = $_GET["id"];
            $userName = $_POST["userName"];
            $quyenHan = $_POST["quyenHan"];
            $sql = "UPDATE `users` SET `author` = '$quyenHan' WHERE `userName` = '$id'";
            pdo_execute($sql);
            echo "<script>alert('Sửa thành công !')</script>";
            echo '<script>window.location.href="index.php?act=quanlythanhvien"</script>';
            break;
        case 'userChangeProcess':
            $id = $_GET["id"];
            $userName = $_POST["userName"];
            $quyenHan = $_POST["quyenHan"];
            $sql = "UPDATE `users` SET `author` = '$quyenHan' WHERE `userName` = '$id'";
            pdo_execute($sql);
            echo "<script>alert('Sửa thành công !')</script>";
            echo '<script>window.location.href="index.php?act=quanlythanhvien"</script>';
            break;
        case 'quanlydonhang':
            include "./views/quanlydonhang.php";
            break;
        case 'capnhatdonhang':
            include "./views/quanlydonhang.php";
            break;
        case 'orderStateChange':
            if (isset($_POST["__button"])) {
                $state = $_POST["__orderState"];
                $orderID = $_POST["__orderID"];
                $sql = "UPDATE donhang SET trangThai = '$state' WHERE id_donHang = '$orderID'";
                pdo_execute($sql);
                echo "<script>alert('Xong')</script>";
                echo "<script>window.location.href='../admin/index.php?act=capnhatdonhang';</script>";
            }
            break;
        case 'donchohuy':
            include "./modules/donhang/donchohuy.php";
            break;
        case 'xemdon':
            include "./modules/donhang/chitietdonhuy.php";
            break;
        case 'chitietdonhang':
            include "./modules/donhang/chitietdonhang.php";
            break;
        case 'capnhatdonhang':
            include "./views/quanlydonhang.php";
            break;
        case 'orderStateChange':
            if (isset($_POST["__button"])) {
                $state = $_POST["__orderState"];
                $orderID = $_POST["__orderID"];
                $sql = "UPDATE donhang SET trangThai = '$state' WHERE id_donHang = '$orderID'";
                pdo_execute($sql);
                echo "<script>alert('Xong')</script>";
                echo "<script>window.location.href='../admin/index.php?act=capnhatdonhang';</script>";
            }
            break;
        case 'donchohuy':
            include "./modules/donhang/donchohuy.php";
            break;
        case 'xemdon':
            include "./modules/donhang/chitietdonhuy.php";
            break;
        case 'chitietdonhang':
            include "./modules/donhang/chitietdonhang.php";
            break;
        case 'ctgryAddForm':
            include "./controllers/category-add.php";
        case 'themdanhmuc':
            if (isset($_POST["data-send"])) {
                $categoryName = $_POST["categoryName"];
                $img_path = $_FILES["img_danhmuc"]["name"];
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["img_danhmuc"]["name"]);
                move_uploaded_file($_FILES["img_danhmuc"]["tmp_name"], $target_file);
                $sql = "INSERT INTO `danhmuc`(`tendanhmuc`,`img_danhmuc`) VALUES ('$categoryName','$img_path')";
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
            $chip = $_POST["chip"];
            $ram = $_POST["ram"];
            $store = $_POST["store"];
            $display = $_POST["display"];
            $color = $_POST["color"];
            $weight = $_POST["weight"];
            $card = $_POST["card"];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["prodImg"]["name"]);
            $flag = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $sql = "INSERT INTO `sanpham`(`tenSanPham`, `giaSanPham`, `moTaSanPham`, `img_path`, `id_danhmuc`, `dateAdd`, `chip`, `ram`, `store`, `display`, `color`, `weight`, `card`)
            VALUES ('$prodName','$prodPrice','$prodDesc','$prodImg','$prodCategory', NOW(),'$chip', '$ram', '$store', '$display', '$color', '$weight', '$card')";
            if (isset($_POST["prod-data-send"])) {
                if (!empty($prodImg)) {
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
                } else {
                    pdo_execute($sql);
                    echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                    echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                if (!empty($prodImg)) {
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
                } else {
                    pdo_execute($sql);
                    echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                    echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                }
            }

            break;
        case 'prodChange':
            include "controllers/prodChange.php";
            break;
        case 'prodChangeProcess':
            $chip = $_POST["chip"];
            $ram = $_POST["ram"];
            $gb = $_POST["gb"];
            $display = $_POST["display"];
            $color = $_POST["color"];
            $weight = $_POST["weight"];

            $chip = $_POST["chip"];
            $ram = $_POST["ram"];
            $gb = $_POST["gb"];
            $display = $_POST["display"];
            $color = $_POST["color"];
            $weight = $_POST["weight"];

            $prodID = $_GET["id"];
            $prodName = $_POST["prodName"];
            $prodPrice = $_POST["prodPrice"];
            $prodDesc = $_POST["prodDesc"];
            $prodImg = $_FILES["prodImg"]["name"];
            $productCategory = $_POST["productCategory"];
            $sql = "UPDATE `sanpham` SET `tenSanPham`='$prodName',`giaSanPham`='$prodPrice',`moTaSanPham`='$prodDesc',
                `img_path`='$prodImg',`id_danhmuc`='$productCategory' WHERE `id_sanPham`='$prodID'";
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["prodImg"]["name"]);
            if (isset($_POST["prod-data-change"])) {
                if (!empty($prodImg)) {
                    $check = getimagesize($_FILES["prodImg"]["tmp_name"]);
                    if ($check !== false) {
                        if (move_uploaded_file($_FILES["prodImg"]["tmp_name"], $target_file) == false) {
                            die("OOP !");
                        }
                        pdo_execute($sql);
                        echo "<script>alert('Sửa thành công !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                    } else {
                        $query = "UPDATE `sanpham` 
                        SET `tenSanPham`='$prodName',`giaSanPham`='$prodPrice',`moTaSanPham`='$prodDesc', `id_danhmuc`='$productCategory', `chip`='$chip',`ram`='$ram',`store`='$gb',`display`='$display',`color`='$color',`weight`='$weight' 
                        WHERE `id_sanPham`='$prodID'";
                        pdo_execute($query);
                        echo "<script>alert('Sửa thành công !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                    }
                } else {
                    $query = "UPDATE `sanpham` 
                        SET `tenSanPham`='$prodName',`giaSanPham`='$prodPrice',`moTaSanPham`='$prodDesc', `id_danhmuc`='$productCategory', `chip`='$chip',`ram`='$ram',`store`='$gb',`display`='$display',`color`='$color',`weight`='$weight' 
                        WHERE `id_sanPham`='$prodID'";
                if (!empty($prodImg)) {
                    $check = getimagesize($_FILES["prodImg"]["tmp_name"]);
                    if ($check !== false) {
                        if (move_uploaded_file($_FILES["prodImg"]["tmp_name"], $target_file) == false) {
                            die("OOP !");
                        }
                        pdo_execute($sql);
                        echo "<script>alert('Sửa thành công !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                    } else {
                        $query = "UPDATE `sanpham` 
                        SET `tenSanPham`='$prodName',`giaSanPham`='$prodPrice',`moTaSanPham`='$prodDesc', `id_danhmuc`='$productCategory', `chip`='$chip',`ram`='$ram',`store`='$gb',`display`='$display',`color`='$color',`weight`='$weight' 
                        WHERE `id_sanPham`='$prodID'";
                        pdo_execute($query);
                        echo "<script>alert('Sửa thành công !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=quanlysp';</script>";
                    }
                } else {
                    $query = "UPDATE `sanpham` 
                        SET `tenSanPham`='$prodName',`giaSanPham`='$prodPrice',`moTaSanPham`='$prodDesc', `id_danhmuc`='$productCategory', `chip`='$chip',`ram`='$ram',`store`='$gb',`display`='$display',`color`='$color',`weight`='$weight' 
                        WHERE `id_sanPham`='$prodID'";
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
            if (isset($_POST["sdonhang"])) {
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
            if (isset($_POST["xoaudonhang"])) {
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
        case 'thongkesp':
            include "views/bieudosplist.php";
            break;
            break;
        case 'bieudosp':
            include "controllers/bieudosp.php";
            break;
        case 'tintuc':
            include "views/tintuc.php";
            break;
        case 'deltintuc':
            if (isset($_POST["xoatt"])) {
                $id = $_GET["id"];
                $sql = "DELETE FROM `tintuc` WHERE `id_tinTuc` = '$id'";
                pdo_query($sql);
                echo '<script>alert("Xoá thành công");</script>';
                echo '<script>window.location.href="index.php?act=tintuc"</script>';
            }
            break;
        case 'suatt':
            include "controllers/suatt.php";
        case 'suatintuc':
            if (isset($_POST["suatintuc"])) {
                $id = $_GET["id"];
                $id_tinTuc = $_POST["id_tinTuc"];
                $noidung_tinTuc = $_POST["noidung_tinTuc"];
                $tieude = $_POST["tieude"];
                $img_path = $_FILES["img_path"]["name"];
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["img_path"]["name"]);
                if (empty($img_path)) {
                    $sql = "UPDATE `tintuc` SET `noidung_tinTuc`='$noidung_tinTuc',`tieude`='$tieude' 
                            WHERE `id_tinTuc`='$id'";
                    pdo_execute($sql);
                    echo "<script>alert('Sửa thành công !')</script>";
                    echo '<script>window.location.href="index.php?act=tintuc"</script>';
                } else {
                    move_uploaded_file($_FILES["img_path"]["tmp_name"], $target_file);
                    $sql = "UPDATE `tintuc` SET `noidung_tinTuc`='$noidung_tinTuc',`tieude`='$tieude',`img_path`='$img_path' 
                            WHERE `id_tinTuc`='$id'";
                    pdo_execute($sql);
                    echo "<script>alert('Sửa thành công !')</script>";
                    echo '<script>window.location.href="index.php?act=tintuc"</script>';
                }
            }

            break;
        case 'themtt':
            include "./controllers/themtt.php";
        case 'them':
            if (isset($_POST["themtt"])) {
                $noidung_tinTuc = $_POST["noidung_tinTuc"];
                $tieude = $_POST["tieude"];
                $img_path = $_FILES["img_path"]["name"];
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["img_path"]["name"]);
                move_uploaded_file($_FILES["img_path"]["tmp_name"], $target_file);
                $sql = "INSERT INTO `tintuc`(`noidung_tinTuc`, `ngaydang_tinTuc`,`tieude`, `img_path`) 
                        VALUES ('$noidung_tinTuc',NOW(),'$tieude','$img_path')";

                pdo_execute($sql);
                echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                echo "<script>window.location.href='../admin/index.php?act=tintuc';</script>";
            }
            break;
        case 'banner':
            include "views/banner.php";
            break;
        case 'xoabn':
            if (isset($_POST["xoabn"])) {
                $id = $_GET["id"];
                $sql = "DELETE FROM `banner` WHERE `id` = '$id'";
                pdo_query($sql);
                echo '<script>alert("Xoá thành công");</script>';
                echo '<script>window.location.href="index.php?act=banner"</script>';
            }
            break;
        case 'sua':
            include "controllers/suabaner.php";
        case 'suabn':
            if (isset($_POST["suabn"])) {
                $id = $_GET["id"];
                $img_path = $_FILES["img_path"]["name"];
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["img_path"]["name"]);
                move_uploaded_file($_FILES["img_path"]["tmp_name"], $target_file);
                $sql = "UPDATE `banner` SET `img_path`='$img_path' WHERE `id`='$id'";
                pdo_execute($sql);
                echo "<script>alert('Sửa thành công !')</script>";
                echo '<script>window.location.href="index.php?act=banner"</script>';
            }

            break;
        case 'thembaner':
            include "controllers/thembanner.php";
        case 'thembn':
            if (isset($_POST["them"])) {
                $img_path = $_FILES["img_path"]["name"];
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["img_path"]["name"]);
                move_uploaded_file($_FILES["img_path"]["tmp_name"], $target_file);
                $sql = "INSERT INTO `banner`( `img_path`) 
                        VALUES ('$img_path')";

                pdo_execute($sql);
                echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                echo "<script>window.location.href='../admin/index.php?act=banner';</script>";
            }
            break;
        case 'addbienthe':
            include "./modules/bienthe/addbienthe.php";
            break;
        case 'slbienthe':
            if (isset($_POST["them"])) {
                $id_sanPham = $_POST["id_sanPham"];
                $chip = $_POST["chip"];
                $ram = $_POST["ram"];
                $gb = $_POST["gb"]; 
                $display = $_POST["display"];
                $color = $_POST["color"];
                $price = $_POST["price"];
                $weight = $_POST["weight"];
                
                $sql = "INSERT INTO `bienthe_sanpham`(`id_sanPham`, `chip`, `ram`, `gb`, `display`, `color`, `price`, `weight`) 
                        VALUES ('$id_sanPham','$chip','$ram','$gb','$display','$color','$price','$weight')";
                
                pdo_execute($sql);
                echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                echo "<script>window.location.href='../admin/index.php?act=quanlybienthe';</script>";
            }
            
            break;
        default:
            include "./views/main.php";
            break;
    }
} else {
}
include "./views/footer.php";
include "./views/footer.php";
