<div class="container">

    <div class="hedderls" style="background-color: #c1c1c1;"> <!-- Checkout Section Begin -->

        <div class="row">
            <div class="col-lg-6">
                <nav class="header__menu" style="padding-left: 37px; ">
                    <ul style="display: flex; width:1000px;">
                        <li><a href="index.php?act=all">Tất cả</a></li>
                        <li><a href="index.php?act=processing">Đang chờ xử lý</a></li>
                        <li><a href="index.php?act=shipping">Đang vận chuyển</a></li>
                        <li><a href="index.php?act=success">Hoàn thành</a></li>
                        <li><a href="index.php?act=canceled">Đã huỷ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="checkout spad" style="padding-top: 10px; padding-bottom: 10px;">
    <div class="container">
        <div class="row">
        </div>
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__order" style="width: 1140px;">
                            <div class="checkout__order__products" style="display: flex; justify-content: space-between;font-size: medium; color:black;">
                                <h4>Đơn hàng của bạn</h4>
                                <!-- <p>Trạng thái:</p> -->
                            </div>
                            <?php
                            if (isset($_GET["act"])) {
                                $username = $_SESSION["username"];
                                switch ($_GET["act"]) {
                                        // case 'all':
                                        //     $sql = "SELECT trangThai FROM donhang WHERE trangThai = 'Chờ xác nhận' AND userName = '$username'";
                                        //     if (isset($_SESSION["username"])) {
                                        //         $user = $_SESSION["username"];
                                        //         $result = pdo_query($query);
                                        //         foreach ($result as $rows) {
                                        //             extract($rows);
                                        //             echo '
                                        //             <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                        //                 <div class="anh" style="display: flex;">
                                        //                     <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                        //                     <div class="thongtin" style="font-size: small; color: gray; ">
                                        //                         <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                        //                         <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                        //                         <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //             <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . '</span></div>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                        //         <hr>
                                        //     ';
                                        //         }
                                        //     }
                                        //     break;
                                        // case 'processing':
                                        //     $sql = "SELECT trangThai FROM donhang WHERE trangThai = 'Giao cho ĐVVC' AND userName = '$username'";
                                        //     if (isset($_SESSION["username"])) {
                                        //         $user = $_SESSION["username"];
                                        //         $result = pdo_query($query);
                                        //         foreach ($result as $rows) {
                                        //             extract($rows);
                                        //             echo '
                                        //             <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                        //                 <div class="anh" style="display: flex;">
                                        //                     <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                        //                     <div class="thongtin" style="font-size: small; color: gray; ">
                                        //                         <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                        //                         <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                        //                         <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //             <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . '</span></div>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                        //         <hr>
                                        //     ';
                                        //         }
                                        //     }
                                        //     break;
                                        // case 'pending':
                                        //     $sql = "SELECT trangThai FROM donhang WHERE trangThai = 'Đóng gosi' AND userName = '$username'";
                                        //     if (isset($_SESSION["username"])) {
                                        //         $user = $_SESSION["username"];
                                        //         $result = pdo_query($query);
                                        //         foreach ($result as $rows) {
                                        //             extract($rows);
                                        //             echo '
                                        //             <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                        //                 <div class="anh" style="display: flex;">
                                        //                     <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                        //                     <div class="thongtin" style="font-size: small; color: gray; ">
                                        //                         <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                        //                         <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                        //                         <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //             <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . '</span></div>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                        //         <hr>
                                        //     ';
                                        //         }
                                        //     }
                                        //     break;
                                        // case 'shipping':
                                        //     $sql = "SELECT trangThai FROM donhang WHERE trangThai = 'Đang giao hàng' AND userName = '$username'";
                                        //     if (isset($_SESSION["username"])) {
                                        //         $user = $_SESSION["username"];
                                        //         $result = pdo_query($query);
                                        //         foreach ($result as $rows) {
                                        //             extract($rows);
                                        //             echo '
                                        //             <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                        //                 <div class="anh" style="display: flex;">
                                        //                     <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                        //                     <div class="thongtin" style="font-size: small; color: gray; ">
                                        //                         <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                        //                         <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                        //                         <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //             <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . '</span></div>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                        //         <hr>
                                        //     ';
                                        //         }
                                        //     }
                                        //     break;
                                        // case 'success':
                                        //     $sql = "SELECT trangThai FROM donhang WHERE trangThai = 'Hoàn tất' AND userName = '$username'";
                                        //     if (isset($_SESSION["username"])) {
                                        //         $user = $_SESSION["username"];
                                        //         $result = pdo_query($query);
                                        //         foreach ($result as $rows) {
                                        //             extract($rows);
                                        //             echo '
                                        //             <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                        //                 <div class="anh" style="display: flex;">
                                        //                     <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                        //                     <div class="thongtin" style="font-size: small; color: gray; ">
                                        //                         <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                        //                         <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                        //                         <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //             <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . '</span></div>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                        //         <hr>
                                        //     ';
                                        //         }
                                        //     }
                                        //     break;
                                        // case 'canceled':
                                        //     $sql = "SELECT trangThai FROM donhang WHERE trangThai = 'Đã Huỷ' AND userName = '$username'";
                                        //     if (isset($_SESSION["username"])) {
                                        //         $user = $_SESSION["username"];
                                        //         $result = pdo_query($query);
                                        //         foreach ($result as $rows) {
                                        //             extract($rows);
                                        //             echo '
                                        //             <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                        //                 <div class="anh" style="display: flex;">
                                        //                     <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                        //                     <div class="thongtin" style="font-size: small; color: gray; ">
                                        //                         <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                        //                         <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                        //                         <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //             <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . '</span></div>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                        //             <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                        //         <hr>
                                        //     ';
                                        //         }
                                        //     }
                                        //     break;
                                    default:
                                        if (isset($_SESSION["username"])) {
                                            $user = $_SESSION["username"];
                                            $query = "SELECT * FROM donhang WHERE `userName` = '$user'";
                                            $result = pdo_query($query);
                                            foreach ($result as $rows) {
                                                extract($rows);
                                                echo '
                                                <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                                    <div class="anh" style="display: flex;">
                                                        <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                                        <div class="thongtin" style="font-size: small; color: gray; ">
                                                            <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                                            <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                                            <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label> <br>
                                                            <label style="color: green;" for="">Người nhận: ' . $tenNguoiNhan . '</label> <br>
                                                            <label style="color: green;" for="">Phương thức thanh toán: ' . $pttt . '</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . ' đ</span></div>
                                                <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                                <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                            <hr>
                                        ';
                                            }
                                        }
                                        break;
                                }
                            } else {
                                if (isset($_SESSION["username"])) {
                                    $user = $_SESSION["username"];
                                    $query = "SELECT * FROM donhang WHERE `userName` = '$user'";
                                    $result = pdo_query($query);
                                    foreach ($result as $rows) {
                                        extract($rows);
                                        echo '
                                            <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                                                <div class="anh" style="display: flex;">
                                                    <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                                    <div class="thongtin" style="font-size: small; color: gray; ">
                                                        <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                                                        <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                                                        <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label> <br>
                                                        <label style="color: green;" for="">Người nhận: ' . $tenNguoiNhan . '</label> <br>
                                                        <label style="color: green;" for="">Phương thức thanh toán: ' . $pttt . '</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . ' đ</span></div>
                                            <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                                            <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                                        <hr>
                                    ';
                                    }
                                }
                            }

                            // if (isset($_SESSION["username"])) {
                            //     $user = $_SESSION["username"];
                            //     $query = "SELECT * FROM donhang WHERE `userName` = '$user'";
                            //     $result = pdo_query($query);
                            //     foreach ($result as $rows) {
                            //         extract($rows);
                            //         echo '
                            //             <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; "></span>
                            //                 <div class="anh" style="display: flex;">
                            //                     <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                            //                     <div class="thongtin" style="font-size: small; color: gray; ">
                            //                         <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                            //                         <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                            //                         <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                            //                     </div>
                            //                 </div>
                            //             </div>
                            //             <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . '</span></div>
                            //             <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                            //             <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                            //         <hr>
                            //     ';
                            //     }
                            // }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Checkout Section End -->
<style>
    /* .header__menu ul li {
        cursor: pointer;

    }

    .header__menu ul li.active {} */

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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll(".header__menu ul li");

        menuItems.forEach(item => {
            item.addEventListener("click", function() {
                // Remove "active" class from all items
                menuItems.forEach(item => item.classList.remove("active"));
                // Add "active" class to the clicked item
                this.classList.add("active");
            });
        });
    });
</script>