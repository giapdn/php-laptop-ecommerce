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
// session_start();
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
                        <tbody id="cart">
                            <?php
                            if (isset($_SESSION["username"])) {
                                $username = $_SESSION["username"];
                                $sql = "SELECT giohang.*, sanpham.*
                                FROM giohang
                                JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                WHERE giohang.userName = '$username';
                                ";
                                $data = pdo_query($sql);
                                if (empty($data)) {
                                    // echo '<script>alert("Giỏ hàng của bạn đang trống !")</script>';
                                } else {
                                    foreach ($data as $rows) {
                                        extract($rows);
                                        echo '
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="app/admin/uploads/' . $img_path . '" style="height: 200px;width: auto;">
                                                <h5>' . $tenSanPham . '</h5>
                                            </td>
                                            <td class="shoping__cart__price"">' . number_format($giaSanPham, 0, ',', '.') . ' ₫</td>                                            
                                            <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <input style="width: 30px;border: 0px;" type="number" min="1" step="1" value="' . $soluong . '" id="soluong" oninput="changeSL(' . $id_sanPham . ')">                                                                   
                                            </div>
                                            </td>
                                            <td class="shoping__cart__total"><div style="background-color: yellow;"><span style="color: red;">' . number_format($giaSanPham * $soluong, 0, ',', '.') . ' ₫</span></div></td>                                                                              
                                            <td class="shoping__cart__item__close">
                                            <a href="index.php?act=delFromCart&id_sanpham=' . $id_sanPham . '" class="jj"><i class="fas fa-times-circle"></i></a>                           
                                        </td>
                                        </tr>
                                        ';
                                    }
                                }
                            }
                            ?>
                        </tbody>
                        <!-- <div class="pro-qty">
                            <input min="1" step="1" data-id-sp=' . $id_sanPham . ' value="' . $soluong . '" class="quantity-input" id="x">
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
                    <ul id="g">
                        <?php
                        if (isset($_SESSION["username"])) {
                            $id = $_SESSION["username"];
                            $sql = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS sumCart
                            FROM giohang
                            JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                            -- GROUP BY giohang.userName;
                            WHERE giohang.userName = '$id';";
                            $data = pdo_query_one($sql);
                            echo '<li>Tổng <span style="background-color: yellow;color: red;">' . number_format($data["sumCart"], 0, ',', '.') . ' ₫</span></li>';
                        }
                        ?>
                    </ul>
                    <a href="index.php?act=thanhtoan" class="primary-btn">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<script>
    var input = document.getElementById("soluong");

    function changeSL(id) {
        $.ajax({
            url: 'app/home/modules/giohang/process.php',
            type: 'POST',
            data: {
                id_sp: id,
                sl: input.value
            },
            success: function(response) {
                console.log("ok");
                $('#cart').html(response);
                $.ajax({
                    url: 'app/home/modules/giohang/total.php',
                    type: 'POST',
                    success: function(params) {
                        $('#g').html(params);
                    }
                });
            },
            error: function(error) {
                console.error('Lỗi yêu cầu:', error);
            }
        });
    }
</script>


<style>
    a.jj:hover {
        color: red;
        font-size: 20px;
     
    }
    a.jj{
        color: #7fad39;
    }
</style>