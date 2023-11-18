<div id="comments">
    <div class="colums">
        <div class="username">Tên người dùng</div>
        <div class="content">Nội dung</div>
        <div class="date">Thời gian</div>
        <div class="prodID">Mã sản phẩm</div>
        <div class="change">Thao tác</div>
    </div>
    <?php
    $sql = "SELECT `id`, `content`, `prodID`, `username`, `time` FROM `comments` WHERE 1";
    try {
        include "models/database.php";
        $data = $conn->query($sql);
        if ($data->num_rows != 0) {
            while ($rows = $data->fetch_assoc()) {
                echo '<div class="rows">
                <div class="username">' . $rows["username"] . '</div>
                <div class="content">
                    <span>' . $rows["content"] . '</span>
                </div>
                <div class="date">' . $rows["time"] . '</div>
                <div class="prodID">' . $rows["prodID"] . '</div>
                <div class="change">
                    <form style="display: none;" action="index.php?act=commentChange&id=' . $rows["id"] . '" method="post">
                        <input type="submit" value="Sửa">
                    </form>
                    <form action="index.php?act=commentDel&id=' . $rows["id"] . '" method="post">
                        <input type="submit" value="Xoá ">
                    </form>
                </div>
            </div>';
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    ?>
</div>

</div>