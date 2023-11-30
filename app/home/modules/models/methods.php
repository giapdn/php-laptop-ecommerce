<?php
include "../models/pdo.php";

function showDonHang($sql)
{
    $result = pdo_query($sql);
    if (empty($result)) {
        echo "Trống !";
    } else {
        foreach ($result as $rows) {
            extract($rows);
            echo '
                <div class="checkout__order__products">
                    <div class="anh" style="display: flex;">
                        <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                        <div class="thongtin" style="font-size: small; color: gray; ">
                            <label style="color: green;" for="">Mã đơn: ' . $id_donHang . '</label><br>
                            <label style="color: green;" for="">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                            <label style="color: green;" for="">Trạng thái đơn hàng: ' . $trangThai . '</label>
                        </div>
                    </div>
                </div>
                <div class="checkout__order__total">Tổng: <span>' . $tongGiaDonHang . ' đ</span></div>
                <button type="submit" class="site-btn" style="width:170px;">Mua lại</button>
                <button type="submit" onclick="goToBill(' . $id_donHang . ')" class="site-btn" style="width:170px;">Chi tiết</button>
                <hr>
            ';
        }
    }
}

function getCartSum($id)
{
    $sql = "SELECT tongGiaDonHang FROM donhang WHERE id_donHang = '$id'";
    $data = pdo_query_one($sql);
    $x = $data["tongGiaDonHang"];
    return $x;
}
