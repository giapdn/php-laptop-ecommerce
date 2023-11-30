<?php
session_start();
?>

<div class="container">
    <div class="hedderls" style="background-color: #c1c1c1;"> <!-- Checkout Section Begin -->
        <div class="row">
            <div class="col-lg-6">
                <nav class="header__menu" style="padding-left: 37px; ">
                    <ul style="display: flex; width:1000px;">
                        <li><a href="index.php?act=lichsu">Tất cả</a></li>
                        <li><a href="index.php?act=pending">Đang xử lý</a></li>
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
        <!-- <div class="row"></div> -->
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__order" style="width: 1140px;">
                            <div class="checkout__order__products" style="display: flex; justify-content: space-between;font-size: medium; color:black;">
                                <h4>Đơn hàng của bạn</h4>
                            </div>
                            <?php
                            $user = $_SESSION["username"];
                            include "./app/home/modules/models/methods.php";
                            if (isset($_GET["act"])) {
                                switch ($_GET["act"]) {
                                    case 'pending':
                                        $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'pending'";
                                        showDonHang($sql);
                                        break;
                                    case 'shipping':
                                        $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'shipping'";
                                        showDonHang($sql);
                                        break;
                                    case 'success':
                                        $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'success'";
                                        showDonHang($sql);
                                        break;
                                    case 'canceled':
                                        $sql = "SELECT * FROM donhang WHERE `userName` = '$user' AND trangThai = 'canceled'";
                                        showDonHang($sql);
                                        break;
                                    default:
                                        $sql = "SELECT * FROM donhang WHERE `userName` = '$user'";
                                        showDonHang($sql);
                                        break;
                                }
                            } else {
                                $sql = "SELECT * FROM donhang WHERE `userName` = '$user'";
                                showDonHang($sql);
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
    function goToBill(id) {
        event.preventDefault();
        window.location.href = "index.php?act=bill&id_donhang=" + id;
    }
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