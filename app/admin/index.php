<?php
include "app/admin/models/pdo.php";
include "views/header.php";
if (isset($_GET["act"])) {
    $action = $_GET["act"];
    switch ($action) {
        case 'home':
            echo "<script>window.location.href = '/duan1/index.php';</script>";
            break;
        case 'categories':
            include "controllers/category-list.php";
            break;
        case 'categoryAdd':
            include "controllers/category-add.php";
            break;
        case 'categoryChange':
            include "controllers/category-change.php";
            break;
        case 'products':
            include "controllers/product-add.php";
            break;
        case 'prodList':
            include "controllers/product-list.php";
            break;
        case 'prodChange':
            include "controllers/product-change.php";
            break;
        case 'customers':
            include "controllers/users.php";
            break;
        case 'comments':
            include "controllers/comments.php";
            break;
        case 'userDel':
            if (isset($_GET["name"])) {
                $name = $_GET["name"];
                $sql = "DELETE FROM `users` WHERE `username` = '$name'";
                include "models/database.php";
                if ($conn->query($sql)) {
                    echo '<script>alert("Xoá thành công");</script>';
                    echo '<script>window.location.href="index.php?act=customers"</script>';
                }
            }
            break;
        case 'userChange':
            include "controllers/userChange.php";
            break;
        case 'commentDel':
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "DELETE FROM `comments` WHERE `id` = '$id'";
                include "models/database.php";
                if ($conn->query($sql)) {
                    echo '<script>alert("Xoá thành công");</script>';
                    echo '<script>window.location.href="index.php?act=comments"</script>';
                }
            }
            break;
        case 'report':
            include "views/static.php";
            break;
        default:
            include "views/static.php";
            break;
    }
} else {
    include "views/static.php";
}
include "views/footer.php";
