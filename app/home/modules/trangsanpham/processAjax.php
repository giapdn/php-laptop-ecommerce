<?php
include "../models/pdo.php";
include "../models/methods.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["min"])) {
        $min = $_POST["min"];
        $max = $_POST["max"];
        $sql = "SELECT * FROM sanpham WHERE giaSanPham >= '$min' AND giaSanPham <= '$max'";
        $result = pdo_query($sql);
        if (empty($result)) {
            echo 'Không tìm thấy sản phẩm nào ?';
        } else {
            showProd($sql);
        }
    } elseif (isset($_POST["color"])) {
        $color = $_POST["color"];
        if ($color == 'Khác') {
            $sql = "SELECT * FROM sanpham WHERE 1";
            showProd($sql);
        } else {
            $sql = "SELECT * FROM sanpham WHERE color = '$color'";
            showProd($sql);
        }
    } elseif (isset($_POST["ram"])) {
        $ram = $_POST["ram"];
        $hardware = $_POST["hardware"];
        if ($ram == 0 || $hardware == 0) {
            $sql = "SELECT * FROM sanpham WHERE 1";
            showProd($sql);
        } else {
            $sql = "SELECT * FROM sanpham WHERE ram = '$ram' AND store = '$hardware'";
            showProd($sql);
        }
    }
}


function showProd($sql)
{
    $data = pdo_query($sql);
    if (empty($data)) {
        echo 'Không có sản phẩm nào !';
    } else {
        foreach ($data as $rows) {
            extract($rows);
            echo ' 
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" style="background-image: url(app/admin/uploads/' . $img_path . ')">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a style="font-weight: bold; href="#">' . $tenSanPham . '</a></h6>
                            <h5 style="background-color: yellow;"><span style="color: red !important;">' . number_format($giaSanPham, 0, ',', '.') . ' ₫</span></h5>
                        </div>
                    </div>
                </div>       
            ';
        }
    }
}
