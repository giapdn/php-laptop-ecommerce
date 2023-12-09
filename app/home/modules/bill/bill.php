<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row"></div>
        <div class="checkout__form">
            <h4>Chi tiết đơn hàng</h4>
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <?php
                            #thông tin người nhận
                            if (isset($_GET["orderID"])) {
                                $orderID = $_GET["orderID"];
                                if (isset($_GET["checked"])) {
                                    $flag = $_GET["checked"];
                                    $checked_push = "UPDATE thongbao SET checked = '$flag' WHERE id_donHang = '$orderID'";
                                    pdo_execute($checked_push);
                                }
                                $sql = "SELECT * FROM donhang WHERE id_donHang = '$orderID'";
                                showBill($sql);
                            } else if (isset($_GET["vnp_TxnRef"])) {
                                $orderID = getOrderID();
                                $sql = "SELECT * FROM donhang WHERE id_donHang = '$orderID'";
                                showBill($sql);
                            } elseif (isset($_GET["orderType"]) && $_GET["orderType"] == 'momo_wallet') {
                                $orderID = getOrderID();
                                $sql = "SELECT * FROM donhang WHERE id_donHang = '$orderID'";
                                showBill($sql);
                            }
                            ?>
                            <div class="checkout__order__products">
                                <?php
                                # sản phẩm đã mua
                                if (isset($_GET["orderID"])) {
                                    $orderID = $_GET["orderID"];
                                    $sql = "SELECT chitietdonhang.soLuong, sanpham.*
                                        FROM chitietdonhang
                                        JOIN sanpham ON chitietdonhang.id_sanPham = sanpham.id_sanPham
                                        WHERE chitietdonhang.id_donHang = '$orderID';
                                    ";
                                    showBillProd($sql);
                                } elseif (isset($_GET["vnp_TxnRef"])) {
                                    $orderID = getOrderID();
                                    $sql = "SELECT chitietdonhang.soLuong, sanpham.*
                                        FROM chitietdonhang
                                        JOIN sanpham ON chitietdonhang.id_sanPham = sanpham.id_sanPham
                                        WHERE chitietdonhang.id_donHang = '$orderID';
                                    ";
                                    showBillProd($sql);
                                } elseif (isset($_GET["orderType"]) && $_GET["orderType"] == 'momo_wallet') {
                                    $orderID = getOrderID();
                                    $sql = "SELECT chitietdonhang.soLuong, sanpham.*
                                    FROM chitietdonhang
                                    JOIN sanpham ON chitietdonhang.id_sanPham = sanpham.id_sanPham
                                    WHERE chitietdonhang.id_donHang = '$orderID';
                                ";
                                    showBillProd($sql);
                                }
                                ?>
                            </div>
                            <div class="checkout__order__total">
                                Tổng giá trị đơn hàng:
                                <span>
                                    <?php
                                    # tổng giá đơn hàng
                                    if (isset($_GET["orderID"])) {
                                        echo getCartSum($_GET["orderID"]);
                                    } else if (isset($_GET["vnp_TxnRef"])) {
                                        echo getCartSum(getOrderID());
                                    } else if (isset($_GET["orderType"]) && $_GET["orderType"] == 'momo_wallet') {
                                        echo getCartSum(getOrderID());
                                    }
                                    ?>
                                </span>
                            </div>
                            <?php
                            #nút huỷ
                            if (isset($_GET["orderID"])) {
                                $orderID = $_GET["orderID"];
                                $sql = "SELECT pttt, trangThai FROM donhang WHERE id_donHang = '$orderID'";
                                $result = pdo_query_one($sql);
                                extract($result);
                                if (isset($_GET["flag"]) && $_GET["flag"] == 'noNeedDelBtn') {
                                    # code...
                                } else if ($trangThai != "canceled" && $trangThai != "success" && $trangThai != "shipping" && $trangThai != "cancelConfirming" && $pttt != "Vnpay" && $pttt != "momo_wallet" && $pttt != "TTKNH-paid") {
                                    echo '<button onclick="cancelOrder(' . $orderID . ')" type="submit" class="site-btn del-order-btn" style="background-color: red;">Huỷ đơn hàng</button>';
                                }
                            }
                            ?>

                            <script>
                                function cancelOrder(orderID) {
                                    event.preventDefault();
                                    var xacNhan = confirm("Bạn có chắc sẽ huỷ đơn này ?");
                                    if (xacNhan) {
                                        $.ajax({
                                            type: "POST",
                                            url: "app/home/modules/bill/ajaxBill.php",
                                            data: {
                                                orderID: Number(orderID)
                                            },
                                            success: function(response) {
                                                if (response.accept == "no") {
                                                    alert(`Đơn hàng ${orderID} đã được tạm huỷ và sẽ phải chờ xác nhận nó thể huỷ hay không, hãy chờ thông báo từ shop.`)
                                                    window.location.href = `../duan1/index.php?act=cancelConfirming`;
                                                } else {
                                                    alert(`Đơn hàng ${orderID} đã được huỷ thành công.`)
                                                    window.location.href = `../duan1/index.php?act=canceled`;
                                                }
                                            },
                                            error: function(error) {
                                                console.log(error);
                                            }
                                        })
                                    }
                                }
                            </script>
                            <button type="submit" onclick="backToPage()" class="site-btn">Quay lại trang chủ</button> <br>
                            <span style="font-size: x-small;">Cảm ơn bạn đã mua sắm ở LSG Laptop!</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn mua</h4>
                            <button type="submit" onclick="goToMyOrder('lichsu''lichsu')" class="site-btn">Theo dõi đơn hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>