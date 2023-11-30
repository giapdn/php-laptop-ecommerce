<!-- Checkout Section Begin -->
<?php
session_start();
include "app/home/modules/models/methods.php";
?>
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
                            // if (isset($_GET["act"])) {
                            //     switch ($_GET["act"]) {
                            //         case 'bill':
                            //             $id_donhang = $_GET["vnp_TxnRef"];
                            //             $sql = "SELECT * FROM donhang WHERE id_donHang = '$id_donhang'";
                            //             $result = pdo_query_one($sql);
                            //             extract($result);
                            //             echo '
                            //                 <div class="checkout__order__products">Mã đơn hàng: <span style="color: green;">' . $id_donHang . '</span></div>
                            //                 <hr>
                            //                 <div class="checkout__order__products">Tên người nhận: <span <span style="color: green;">' . $tenNguoiNhan . '</span></div>
                            //                 <hr>
                            //                 <div class="checkout__order__products">Ngày đặt hàng: <span <span style="color: green;">' . $ngayDatHang . '</span></div>
                            //                 <hr>
                            //                 <div class="checkout__order__products">Địa chỉ: <span <span style="color: green;">' . $diaChi . '</span></div>
                            //                 <hr>
                            //                 <div class="checkout__order__products">Số điện thoại: <span <span style="color: green;">' . $SDT . '</span></div>
                            //                 <hr>
                            //                 <div class="checkout__order__products">Phương thức thanh toán: <span <span style="color: green;">' . $pttt . '</span></div>
                            //                 <hr>
                            //             ';
                            //             break;
                            //     }
                            // }
                            ?>
                            <div class="checkout__order__products">
                                <?php
                                // $id = $_GET["vnp_TxnRef"];
                                // $sql = "SELECT chitietdonhang.soLuong, sanpham.*
                                //     FROM chitietdonhang
                                //     JOIN sanpham ON chitietdonhang.id_sanPham = sanpham.id_sanPham
                                //     WHERE chitietdonhang.id_donHang = '$id';
                                // ";
                                // $result = pdo_query($sql);
                                // foreach ($result as $key) {
                                //     extract($key);
                                //     echo '
                                //         <div class="anh" style="display: flex;">
                                //             <img src="app/admin/uploads/' . $img_path . '" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                //             <div class="thongtin" style="font-size: small; color: gray; ">
                                //                 <label>Sản phẩm: ' . $tenSanPham . '</label><br>
                                //                 <label>Giá: ' . number_format($giaSanPham, 0, ',', '.') . '</label><br>
                                //                 <label>Số lượng: ' . $soLuong . '</label><br>
                                //                 <label>Mô tả: ' . $moTaSanPham . '</label>
                                //             </div>
                                //         </div>
                                //         <hr>
                                //     ';
                                // }
                                ?>
                            </div>
                            <div class="checkout__order__total">Tổng giá trị đơn hàng: <span><?php #getCartSum($_GET["getCartSum"]) ?></span></div>


                            <button type="submit" onclick="backToPage()" class="site-btn">Quay lại trang chủ</button> <br>
                            <span style="font-size: x-small;">Cảm ơn bạn đã mua sắm ở LSG Laptop!</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn mua</h4>
                            <button type="submit" onclick="goToMyOrder()" class="site-btn">Theo dõi đơn hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function goToMyOrder() {
        event.preventDefault();
        window.location.href = "../duan1/index.php?act=lichsu";
    }

    function backToPage() {
        event.preventDefault();
        window.location.href = "../duan1/index.php";
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