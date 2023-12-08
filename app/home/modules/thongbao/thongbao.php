<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông báo</h4>
        </div>
        <?php
        $user = $_SESSION["username"];
        $sql = "SELECT noidung, id_donHang, dateCreate, checked FROM thongbao WHERE userName = '$user' ORDER BY dateCreate DESC";
        $result = pdo_query($sql);
        if (!empty($result)) {
            foreach ($result as $key) {
                extract($key);
                if ($checked == 1) {
                    echo '
                    <div><span style="color: gray;">Đã xem</span> - ' . $noidung . ' <a href="../duan1/index.php?act=bill&orderID=' . $id_donHang . '&">Xem chi tiết</a></div> <hr>
                ';
                } else {
                    echo '
                    <div><span style="color: red;">Mới</span> - ' . $noidung . ' <a href="../duan1/index.php?act=bill&orderID=' . $id_donHang . '&checked=1">Xem chi tiết</a></div> <hr>
                ';
                }
            }
        } else {
            echo '<div>Bạn chưa có thông báo nào.</div>';
        }
        ?>
    </div>
</section>