<div id="comments">
    <div class="colums">
        <div class="username">Tên người dùng</div>
        <div class="content">Nội dung bình luận</div>
        <div class="date">Thời gian</div>
        <div class="prodID">ID sản phẩm</div>
        <div class="change">Thao tác</div>
    </div>
    <?php
    $sql = "SELECT * FROM `binhluan` WHERE 1";
    $data = pdo_query($sql);
    foreach ($data as $rows) {
        echo '
            <div class="rows">
            <div class="username">' . $rows["userName"] . '</div>
            <div class="content">
                <span>' . $rows["noidung_binhLuan"] . '</span>
            </div>
            <div class="date">' . $rows["ngay_binhLuan"] . '</div>
            <div class="prodID">' . $rows["id_sanPham"] . '</div>
            <div class="change">
                
                <form action="index.php?act=commentDel&id=' . $rows["id_binhLuan"] . '" method="post">
                    <input name="xoabl" type="submit"  value="Xoá ">
                </form>
            </div>
        </div>';
    }
    ?>
</div>

</div>