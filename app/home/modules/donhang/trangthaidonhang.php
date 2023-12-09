<?
session_start();
?>
<div class="container">
    <div class="hedderls" style="background-color: #7fad39;">
        <div class="row">
            <div class="col-lg-6">
                <nav class="header__menu" style="padding-left: 37px; ">
                    <ul style="display: flex; width:1000px;">
                        <!-- <li><a class="f g z" style="color: white;" href="index.php?act=lichsu">Tất cả</a></li> -->
                        <li><a class="f g z" style="color: white;" href="index.php?act=pending">Xử lý</a></li>
                        <li><a class="f g z" style="color: white;" href="index.php?act=shipping">Vận chuyển</a></li>
                        <li><a class="f g z" style="color: white;" href="index.php?act=shipped">Đã giao</a></li>
                        <li><a class="f g z" style="color: white;" href="index.php?act=success">Hoàn thành</a></li>
                        <li><a class="f g z" style="color: white;" href="index.php?act=cancelConfirming">Chờ xác nhận huỷ</a></li>
                        <li><a class="f g z" style="color: white;" href="index.php?act=canceled">Đã huỷ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="checkout spad" style="padding-top: 10px; padding-bottom: 10px;">
    <div class="container">
        <div class="checkout__form">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="checkout__order" style="width: 1140px;">
                        <div class="checkout__order__products" style="display: flex; justify-content: space-between;font-size: medium; color:black;">
                            <h4>Đơn hàng của bạn</h4>
                        </div>
                        <?php
                        $user = $_SESSION["username"];
                        if (isset($_GET["act"])) {
                            switch ($_GET["act"]) {
                                case 'pending':
                                    echo '<script>document.querySelectorAll(".f.g.z")[0].style.color="orangered"</script>';
                                    $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'pending' OR trangThai = 'confirmed'";
                                    showDonHang($sql);
                                    break;
                                case 'shipping':
                                    echo '<script>document.querySelectorAll(".f.g.z")[1].style.color="orangered"</script>';
                                    $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'shipping'";
                                    showDonHang($sql);
                                    break;
                                case 'shipped':
                                    echo '<script>document.querySelectorAll(".f.g")[2].style.color="orangered"</script>';
                                    $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'shipped'";
                                    showDonHang($sql);
                                    break;
                                case 'success':
                                    echo '<script>document.querySelectorAll(".f.g.z")[3].style.color="orangered"</script>';
                                    $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'success'";
                                    showDonHang($sql);
                                    break;
                                case 'cancelConfirming':
                                    echo '<script>document.querySelectorAll(".f.g.z")[4].style.color="orangered"</script>';
                                    $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'cancelConfirming'";
                                    showDonHang($sql);
                                    break;
                                case 'canceled':
                                    echo '<script>document.querySelectorAll(".f.g.z")[5].style.color="orangered"</script>';
                                    $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'canceled'";
                                    showDonHang($sql);
                                    break;
                                default:
                                    echo '<script>document.querySelectorAll(".f.g.z")[0].style.color="orangered"</script>';
                                    $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'pending'";
                                    // $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai != 'canceled' AND trangThai != 'success' AND trangThai != 'cancelConfirming' AND trangThai != 'shipped'";
                                    showDonHang($sql);
                                    break;
                            }
                        } else {
                            $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'pending'";
                            // $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai != 'canceled' AND trangThai != 'success' AND trangThai != 'cancelConfirming' AND trangThai != 'shipped'";
                            echo '<script>document.querySelectorAll(".f.g.z")[0].style.color="orangered"</script>';
                            showDonHang($sql);
                        }
                        ?>
                    </div>
                </div>
            </div>
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

    /* /* th {
        background-color: #f2f2f2;
    } */ */
</style>