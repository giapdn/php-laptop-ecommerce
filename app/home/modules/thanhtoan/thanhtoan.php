<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <!-- <div class="row"></div> -->
        <!-- <div class="row"></div> -->
        <div class="checkout__form">
            <h4>Thông tin đơn hàng</h4>
            <form action="app/home/modules/thanhtoan/momo.php" method="post">
            <h4>Thông tin đơn hàng</h4>
            <form action="app/home/modules/thanhtoan/momo.php" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Họ và tên người nhận<span>*</span></p>
                            <input type="text" name="name" id="name" placeholder="Hãy nhập chính xác tên của người nhận nhé !">
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ người nhận<span>*</span></p>
                            <input type="text" name="location" id="location" placeholder="Địa chỉ là thứ rất quan trọng để đơn hàng có thể đến được với bạn !">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone" id="phone" placeholder="Chúng tôi có thể liên hệ với bạn qua số này">
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" placeholder="Chưa cần điền">
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Unknow<span>*</span></p>
                                    <input type="text" placeholder="Chưa cần điền">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Mã giảm giá<span>*</span></p>
                                    <select>
                                        <option value="">Chưa cần điền</option>
                                        <option value="">x</option>
                                        <option value="">x</option>
                                        <option value="">x</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Lời nhắn nhủ cho shop<span>*</span></p>
                            <input type="text" id="" placeholder="Bạn có lưu ý gì cho đơn hàng này không ?">
                        </div> -->
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Họ và tên người nhận<span>*</span></p>
                            <input type="text" name="name" id="name" placeholder="Hãy nhập chính xác tên của người nhận nhé !">
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ người nhận<span>*</span></p>
                            <input type="text" name="location" id="location" placeholder="Địa chỉ là thứ rất quan trọng để đơn hàng có thể đến được với bạn !">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone" id="phone" placeholder="Chúng tôi có thể liên hệ với bạn qua số này">
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" placeholder="Chưa cần điền">
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Unknow<span>*</span></p>
                                    <input type="text" placeholder="Chưa cần điền">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Mã giảm giá<span>*</span></p>
                                    <select>
                                        <option value="">Chưa cần điền</option>
                                        <option value="">x</option>
                                        <option value="">x</option>
                                        <option value="">x</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Lời nhắn nhủ cho shop<span>*</span></p>
                            <input type="text" id="" placeholder="Bạn có lưu ý gì cho đơn hàng này không ?">
                        </div> -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Các sản phẩm<span>Tổng cộng</span></div>
                            <ul>
                            <ul>
                                <?php
                                #đơn hàng
                                if (isset($_GET["paynow"])) {
                                    #mua ngay 1 sản phẩm
                                    $prodID = $_GET["paynow"];
                                    $soluong = $_GET["soluong"];
                                    if (isset($_GET["gb"])) {
                                        #nếu có chọn biến thể gb
                                        $gb = $_GET["gb"];
                                        $getPrice = "SELECT price FROM bienthe_sanpham WHERE gb = '$gb' AND id_sanPham = '$prodID'";
                                        $gb = pdo_query_one($getPrice);
                                        $sql = "SELECT sanpham.tenSanPham, sanpham.giaSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                        $result = pdo_query_one($sql);
                                        extract($result);
                                        echo '
                                        <li>' . $tenSanPham . ' <span>' . number_format($gb["price"] * $soluong, 0, ',', '.') . ' đ</span></li>
                                        ';
                                    } else {
                                        #ko chọn thì lấy giá mặc định của sp
                                        $getPrice = "SELECT giaSanPham, tenSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                        $result = pdo_query_one($getPrice);
                                        extract($result);
                                        echo '<li>' . $tenSanPham . ' <span>' . number_format($giaSanPham * $soluong, 0, ',', '.') . ' đ</span></li>';
                                    }
                                } else {
                                    #thanh toán giỏ hàng
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
                                                <li>' . $tenSanPham . ' <span>' . number_format($giaSanPham, 0, ',', '.') . ' đ</span></li>
                                            ';
                                        }
                                    }
                                }
                                ?>
                            </ul>
                            <?php
                            #chọn phương thức thanh toán
                            if (isset($_GET["paynow"])) {
                                $prodID = $_GET["paynow"];
                                $soluong = $_GET["soluong"];
                                if (isset($_GET["gb"])) {
                                    #nếu có biến thể
                                    $gb = $_GET["gb"];
                                    $getPrice = "SELECT price FROM bienthe_sanpham WHERE gb = '$gb' AND id_sanPham = '$prodID'";
                                    $gb = pdo_query_one($getPrice);
                                    $sql = "SELECT sanpham.tenSanPham, sanpham.giaSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                    $result = pdo_query_one($sql);
                                    extract($result);
                                    echo '<div class="checkout__order__total">Tổng: <span id="cartPrice" style="background-color: yellow;">' . $gb["price"] * $soluong . '</span></div>';
                                } else {
                                    #nếu không có
                                    $getPrice = "SELECT giaSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                    $result = pdo_query_one($getPrice);
                                    extract($result);
                                    echo '<div class="checkout__order__total">Tổng: <span id="cartPrice" style="background-color: yellow;">' . $giaSanPham * $soluong . '</span></div>';
                                }
                            } else {
                                $id = $_SESSION["username"];
                                $sumSQL = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS cartPrice
                                    FROM giohang
                                    JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                    WHERE giohang.userName = '$id';
                                ";
                                $result = pdo_query_one($sumSQL);
                                echo '
                                    <div class="checkout__order__total">Tổng: <span id="cartPrice" style="background-color: yellow;">' . $result["cartPrice"] . '</span></div>
                                ';
                            }
                            ?>
                            <div class="checkout__input__checkbox">
                                <span style="font-weight: bold;" class="checkmark">Chọn phương thức thanh toán: </span>
                            </div>
                            <div class="checkout__input__checkbo">
                                <label id="checkbox" style="cursor: pointer; font-weight: bold;">
                                    <input type="checkbox">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <div class="checkout__input__checkbo">
                            <div class="checkout__input__checkbo">
                                <label style="cursor: pointer;">
                                    <?php
                                    #momo
                                    if (isset($_GET["paynow"])) {
                                        $prodID = $_GET["paynow"];
                                        $soluong = $_GET["soluong"];
                                        if (isset($_GET["gb"])) {
                                            $gb = $_GET["gb"];
                                            $getPrice = "SELECT price FROM bienthe_sanpham WHERE gb = '$gb' AND id_sanPham = '$prodID'";
                                            $x = pdo_query_one($getPrice);
                                            $sql = "SELECT sanpham.tenSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                            $result = pdo_query_one($sql);
                                            echo '<input type="hidden" name="prodID" value=' . $prodID . '>';
                                            echo '<input type="hidden" name="prodVariantPrice" value=' . $x["price"] * $soluong . '>';
                                            echo '<input type="hidden" name="gb" value=' . $gb . '>';
                                            echo '<input type="hidden" name="soluong" value=' . $soluong . '>';
                                        } else {
                                            $getPrice = "SELECT giaSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                            $result = pdo_query_one($getPrice);
                                            echo '<input type="hidden" name="prodID" value=' . $prodID . '>';
                                            echo '<input type="hidden" name="prodDefaultPrice" value=' . $result["giaSanPham"] * $soluong . '>';
                                            echo '<input type="hidden" name="soluong" value=' . $soluong . '>';
                                        }
                                    } else if (isset($_GET["payCart"])) {
                                        $id = $_SESSION["username"];
                                        $sumSQL = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS cartTotal
                                            FROM giohang
                                            JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                            WHERE giohang.userName = '$id';";
                                        $result = pdo_query_one($sumSQL);
                                        echo '<input type="hidden" name="cartTotal" value=' . $result["cartTotal"] . '>';
                                    }
                                    ?>
                                    <button name="payUrl" style="width: 70px;height: 29px;background-color: purple; color: white;border: 0px; border-radius: 5px;">Momo</button>
                                    <!-- <input type="submit" name="x" style="width: 70px;height: 29px;background-color: purple; color: white;border: 0px; border-radius: 5px;" value="Mono"> -->
                                </label>
                            </div>

                            <div class="checkout__input__checkbo">
                                <label style="cursor: pointer;">
                                    <?php
                                    #vnpay mua ngay 1 sản phẩm
                                    if (isset($_GET["paynow"])) {
                                        $prodID = $_GET["paynow"];
                                        $soluong = $_GET["soluong"];
                                        if (isset($_GET["gb"])) {
                                            $gb = $_GET["gb"];
                                            $getPrice = "SELECT price FROM bienthe_sanpham WHERE gb = '$gb' AND id_sanPham = '$prodID'";
                                            $x = pdo_query_one($getPrice);
                                            $sql = "SELECT sanpham.tenSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                            $result = pdo_query_one($sql);
                                            extract($result);
                                            echo '
                                            <Button type="button" style="background: linear-gradient(to right, blue, red); color: white;border: 0px; border-radius: 5px;" onclick="vnpay(' . (int)$x["price"] * $soluong . ', ' . $prodID . ', ' . $gb . ', ' . $soluong . ');">Vnpay</Button>
                                            ';
                                        } else {
                                            $getPrice = "SELECT giaSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                            $result = pdo_query_one($getPrice);
                                            extract($result);
                                            echo '
                                                <Button type="button" style="background: linear-gradient(to right, blue, red); color: white;border: 0px; border-radius: 5px;" onclick="vnpay(' . (int)$giaSanPham * $soluong . ', ' . $prodID . ', 0, ' . $soluong . ');">Vnpay</Button>
                                            ';
                                        }
                                    } else {
                                        #vnpay giỏ hàng
                                        if (isset($_SESSION["username"])) {
                                            $id = $_SESSION["username"];
                                            $sumSQL = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS cartSum
                                                FROM giohang
                                                JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                                WHERE giohang.userName = '$id';";
                                            $result = pdo_query_one($sumSQL);
                                            echo '
                                                <Button type="button" style="background: linear-gradient(to right, blue, red); color: white;border: 0px; border-radius: 5px;" onclick="vnpay(' . (int)$result["cartSum"] . ', 1, 1, 1);">Vnpay</Button>
                                            ';
                                        }
                                    }
                                    ?>
                                </label>
                            </div>
                            <?php
                            #nút mua
                            if (isset($_GET["paynow"])) {
                                $prodID = $_GET["paynow"];
                                $soluong = $_GET["soluong"];
                                if (isset($_GET["gb"])) {
                                    $gb = $_GET["gb"];
                                    $getPrice = "SELECT price FROM bienthe_sanpham WHERE gb = '$gb' AND id_sanPham = '$prodID'";
                                    $x = pdo_query_one($getPrice);
                                    echo '<button onclick="letPayNow(' . $x["price"] * $soluong . ', ' . $prodID . ', ' . $gb . ', ' . $soluong . ');" class="site-btn">ĐẶT HÀNG</button>';
                                } else {
                                    $getPrice = "SELECT giaSanPham FROM sanpham WHERE id_sanPham = '$prodID'";
                                    $result = pdo_query_one($getPrice);
                                    extract($result);
                                    echo '<button onclick="letPayNow(' . $giaSanPham * $soluong . ', ' . $prodID . ', 1, ' . $soluong . ');" class="site-btn">ĐẶT HÀNG</button>';
                                }
                            } else {
                                echo '<button onclick="letPay();" class="site-btn">ĐẶT HÀNG</button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->