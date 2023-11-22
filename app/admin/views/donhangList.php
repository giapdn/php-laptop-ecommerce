<div id="donhang">
   <div style="background-color: brown !important;" class="colums">
        <div class="id_donHang">Mã đơn hàng</div>
        <div class="userName">Tên khách hàng</div>
        <div class="ngayDatHang">Ngày đặt hàng</div>
        <div class="soLuong">Số lượng</div>
        <div class="tongGiaDonHang">Tổng giá đơn hàng</div>
        <div class="trangThai">Trạng thái</div>
        <div class="change">Thao tác</div>
    </div>

    <?php   
        $sql = "SELECT `id_donHang`, `userName`, `ngayDatHang`, `soLuong`,`tongGiaDonHang`, `trangThai` FROM `donhang`" ;
        $result = pdo_query($sql);
        foreach($result as $re){
            echo '<div class="rows">
            <div class="id_donHang">' . $re["id_donHang"] . '</div>
            <div class="userName">' . $re["userName"] . '</div>
            <div class="ngayDatHang">' . $re["ngayDatHang"] . '</div>
            <div class="soLuong">' . $re["soLuong"] . '</div>
            <div class="tongGiaDonHang">' . $re["tongGiaDonHang"] . '</div>
            <div class="trangThai">' . $re["trangThai"] . '</div>
            <div class="change">
                <form action="index.php?act=donhangsua&id_donHang=' . $re["id_donHang"] . '" method="post">
                    <input name="suadonhang" type="submit" value="Sửa">
                </form>
                <form action="index.php?act=donhangxoa&id_donHang=' . $re["id_donHang"] . '" method="post">
                    <input name="xoaudonhang" type="submit"  value="Xoá ">
                </form>
            </div>
        </div>';
        }
    ?>
    <form action="index.php?timdonhang&id_donHang=' " method="post">
        <input type="text" name="timdonhang" placeholder="nhập mã đơn hàng">
        <input type="submit" name="list" value="tìm kiếm">
    </form>

</div>