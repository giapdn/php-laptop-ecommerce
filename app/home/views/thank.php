<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">

        </div>
        <div class="checkout__form">
            <h4>Chi tiết đơn hàng</h4>
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">

                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <?php
                            $x = "SELECT MAX(id_donHang) AS maxID FROM donhang";
                            $id = pdo_query_one($x);
                            extract($id);
                            $sql = "SELECT * FROM donhang WHERE id_donHang = '$maxID'";
                            $result = pdo_query_one($sql);
                            extract($result);
                            echo '
                                <div class="checkout__order__products">Mã đơn hàng<span>' . $id_donHang . '</span></div>
                                <hr>
                                <div class="checkout__order__products">Tên người nhận<span>' . $tenNguoiNhan . '</span></div>
                                <hr>
                                <div class="checkout__order__products">Ngày đặt hàng<span>' . $ngayDatHang . '</span></div>
                                <hr>
                                <div class="checkout__order__products">Địa chỉ<span>' . $diaChi . '</span></div>
                                <hr>
                                <div class="checkout__order__products">Số điện thoại<span>' . $SDT . '</span></div>
                                <hr>
                                <div class="checkout__order__products">Phương thức thanh toán<span>' . $pttt . '</span></div>
                                <hr>
                            ';
                            ?>
                            <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; ">5.000.000</span>
                                <div class="anh" style="display: flex;">
                                    <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                    <div class="thongtin" style="font-size: small; color: gray; ">

                                        <label for="">laptop1</label><br>
                                        <label for="">Phân loại:</label><br>
                                        <label for="">x1</label>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="checkout__order__total">Tổng giá trị đơn hàng<span>5.000.000</span></div>
                            <button type="submit" class="site-btn">Quay lại trang chủ</button>
                            <br>
                            <span style="font-size: x-small;">Cảm ơn bạn đã mua sắm ở LSG Laptop!</span>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn mua</h4>
                            <button type="submit" onclick="goT()" class="site-btn">Lịch sử mua hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function goT(params) {
        window.location.href = "../duan1/index.php?act=lichsu";
    }
</script>
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