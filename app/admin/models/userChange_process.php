<?php
if (isset($_POST["power"])) {
    $power = $_POST["power"];
    $name = $_GET["x"];
    if ($power == "" && $power != "admin" && $power != "user" ) {
        echo "<script>alert('Không được bỏ trống và chỉ có thể đặt quyền là admin hoặc user !')</script>";
        echo "<script>window.location.href='../index.php?act=customers'</script>";
    }
    else {
        try {
            include "database.php";
            $conn->query("UPDATE `users` SET `power` = '$power' WHERE `username` = '$name'");
            echo "<script>alert('Sửa thành công !')</script>";
            echo "<script>window.location.href='../index.php?act=customers'</script>";
        } catch (\Throwable $th) {
            echo "oop !";
        } finally {
            $conn->close();
        }
    }
}
