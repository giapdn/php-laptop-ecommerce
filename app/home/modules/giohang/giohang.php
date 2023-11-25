<!-- Breadcrumb Section Begin -->
<!-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Breadcrumb Section End -->
<?php
session_start();
?>

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION["username"])) {
                                $username = $_SESSION["username"];
                                $sql = "SELECT giohang.*, sanpham.*
                                FROM giohang
                                JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                WHERE giohang.userName = '$username';
                                ";
                                include "../models/pdo.php";
                                $data = pdo_query($sql);
                                if (empty($data)) {
                                    echo '<script>alert("Giỏ hàng của bạn đang trống !")</script>';
                                } else {
                                    foreach ($data as $rows) {
                                        extract($rows);
                                        echo '
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="app/admin/uploads/' . $img_path . '" style="height: 200px;width: auto;">
                                                <h5>' . $tenSanPham . '</h5>
                                            </td>
                                            <td class="shoping__cart__price"">' . number_format($giaSanPham, 0, ',', '.') . '</td>                                            
                                            <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input name="soluong" value="' . $soluong . '">
                                                </div>
                                            </div>
                                            </td>
                                            <td class="shoping__cart__total"><div style="background-color: yellow;"><span style="color: red;">' . number_format($giaSanPham * $soluong, 0, ',', '.') . '</span></div></td>                                                                              
                                            <td class="shoping__cart__item__close">
                                                <a href="index.php?act=delFromCart&id_sanpham=' . $id_sanPham . '"><span class="icon_close"></span></a>                           
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Thanh toán</h5>
                    <ul>
                        <?php
                        if (isset($_SESSION["username"])) {
                            $id = $_SESSION["username"];
                            $sql = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS sumCart
                            FROM giohang
                            JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                            GROUP BY giohang.userName;
                            WHERE giohang.userName = '$id';";
                            $data = pdo_query_one($sql);
                            if ($data["sumCart"] === 0) {
                                echo '<li>Tổng <span style="background-color: yellow;color: red;">' . 0 . ' Vnđ</span></li>';
                            } else {
                                echo '<li>Tổng <span style="background-color: yellow;color: red;">' . number_format($data["sumCart"], 0, ',', '.') . ' Vnđ</span></li>';
                            }
                        }
                        ?>
                    </ul>
                    <a href="index.php?act=thanhtoan" class="primary-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<script>
    function up(params) {

    }
</script>