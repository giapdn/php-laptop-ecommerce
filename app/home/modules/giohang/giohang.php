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
                                $data = pdo_query($sql);
                                foreach ($data as $rows) {
                                    extract($rows);
                                    echo '
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="app/admin/uploads/' . $img_path . '" style="height: 150px;width: auto;">
                                                <br>
                                                <img src="app/admin/uploads/' . $img_path . '" style="height: 150px;width: auto;">
                                                <br>
                                                <h5>' . $tenSanPham . '</h5>
                                                <h6 style="color: #85929e;">Chip:'.$chip.', Ram:'.$chip.', Store:'.$store.', Màu:'.$color.', Card:'.$card.'</h6>
                                            </td>
                                            <td class="shoping__cart__price"">' . number_format($giaSanPham, 0, ',', '.') . ' ₫</td>                                            
                                            <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <input style="width: 40px;border: 0px;" type="number" min="1" max="5" step="1" value="' . $soluong . '" oninput="ajaxSL(' . $id_sanPham . ', this.value)">                                                 
                                            </div>
                                            </td>
                                            <td class="shoping__cart__total"><div ><span id="' . $id_sanPham . '" style="color: red;">' . number_format($giaSanPham * $soluong, 0, ',', '.') . ' ₫</span></div></td>                                                                              
                                            <td class="shoping__cart__item__close">
                                            <a href="index.php?act=delFromCart&id_sanpham=' . $id_sanPham . '" class="jj"><i class="fas fa-times-circle"></i></a>                           
                                        </td>
                                        </tr>
                                    ';
                                }
                            }
                            ?>
                        </tbody>
                        <!-- <div class="pro-qty">
                            <input min="1" value="' . $soluong . '" oninput="ajaxSL(' . $id_sanPham . ', this.value)">
                        </div> -->
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
                    <?php
                    if (isset($_SESSION["username"])) {
                        $sql = "SELECT giohang.*, sanpham.*
                                FROM giohang
                                JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                WHERE giohang.userName = '$username';
                        ";
                        $result = pdo_query($sql);
                        if (empty($result)) {
                            echo '<h5>Giỏ hàng của bạn đang trống !</h5>';
                        } else {
                            echo '<h5>Thanh toán</h5>';
                        }
                    }
                    ?>
                    <ul>
                        <?php
                        if (isset($_SESSION["username"])) {
                            $id = $_SESSION["username"];
                            $sql = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS sumCart
                                FROM giohang
                                JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                WHERE giohang.userName = '$id';
                            ";
                            $data = pdo_query_one($sql);
                            if ($data["sumCart"] != null) {
                                echo '<li>Tổng <span id="totalCart" style="background-color: yellow;color: red;">' . number_format($data["sumCart"], 0, ',', '.') . ' ₫</span></li>';
                            } else {
                                echo '<li>Tổng <span id="totalCart" style="background-color: yellow;color: red;">' . number_format(0, 0, ',', '.') . ' ₫</span></li>';
                            }
                        }
                        ?>
                    </ul>
                    <a href="index.php?act=thanhtoan&payCart=5" class="primary-btn">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<style>
    a.jj:hover {
        color: red;
        font-size: 30px;
    }

    a.jj {
        color: #7fad39;
    }
</style>