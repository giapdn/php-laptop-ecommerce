<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
        </div>
        <div class="checkout__form">
            <?php
            if (isset($_GET["act"])) {
                switch ($_GET["act"]) {
                    case 'defaultPay':
                        echo '<h4>Thanh toán khi nhận hàng</h4>';
                        break;
                    case 'momo':
                        echo '<h4>Thanh toán qua Momo</h4>';
                        break;
                    case 'vnpay':
                        echo '<h4>Thanh toán qua Vnpay</h4>';
                        break;
                    default:
                        echo '<h4>Thanh toán khi nhận hàng</h4>';
                        break;
                }
            } else {
                echo '<h4>Thanh toán khi nhận hàng</h4>';
            }
            ?>
            <form action="#">
                <div class="row">
                    <?php
                    if (isset($_GET["act"])) {
                        switch ($_GET["act"]) {
                            case 'ttknh':
                                include "ttknh.php";
                                break;
                            case 'momo':
                                include "momo.php";
                                break;
                            case 'vnpay':

                                break;
                            default:
                                include "ttknh.php";
                                break;
                        }
                    } else {
                        include "ttknh.php";
                    }
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Các sản phẩm<span>Tổng cộng</span></div>
                            <ul style="overflow-y: scroll;">
                                <?php
                                if (isset($_SESSION["username"])) {
                                    $id_customer = $_SESSION["username"];
                                    $sql = "SELECT giohang.*, sanpham.* FROM
                                    giohang
                                    JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                    WHERE userName = '$id_customer'";
                                    $result = pdo_query($sql);
                                    foreach ($result as $rows) {
                                        extract($rows);
                                        echo '
                                            <li>' . $tenSanPham . ' <span>' . number_format($giaSanPham, 0, ',', '.') . '</span></li>
                                        ';
                                    }
                                }
                                ?>
                            </ul>
                            <?php
                            if (isset($_SESSION["username"])) {
                                $id = $_SESSION["username"];
                                $sumSQL = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS cartSum
                                FROM giohang
                                JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                WHERE giohang.userName = '$id';";
                                $result = pdo_query_one($sumSQL);
                                echo '
                                    <div class="checkout__order__total">Tổng: <span id="sumCart" style="background-color: yellow;">' . number_format($result["cartSum"], 0, ',', '.') . '</span></div>
                                ';
                            }
                            ?>
                            <div class="checkout__input__checkbox">
                                <span style="font-weight: bold;" class="checkmark">Chọn phương thức thanh toán</span>
                            </div>
                            <div class="checkout__input__checkbo" onclick="defaultPay()">
                                <label style="cursor: pointer;">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <div class="checkout__input__checkbo" onclick="momo()">
                                <label style="cursor: pointer;">
                                    <img style="width: 20px; height: 20px;" src="/duan1/app/home/public/img/zaloicon.jpg" alt="">
                                    Momo
                                </label>
                            </div>
                            <div class="checkout__input__checkbo">
                                <label style="cursor: pointer;">
                                    <!-- <img style="width: 20px; height: 20px;" src="/duan1/app/home/public/img/zaloicon.jpg" alt=""> -->
                                    <?php
                                    if (isset($_SESSION["username"])) {
                                        $id = $_SESSION["username"];
                                        $sumSQL = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS cartSum
                                            FROM giohang
                                            JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                            WHERE giohang.userName = '$id';";
                                        $result = pdo_query_one($sumSQL);
                                        echo '
                                            <Button type="button" onclick="vnpay(' . $result["cartSum"] . ')">Vnpay</Button>
                                        ';
                                    }
                                    ?>
                                </label>
                            </div>
                            <button onclick="letPay()" class="site-btn">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->