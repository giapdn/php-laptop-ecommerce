<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    Quản lí bình luận
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tên người dùng</th>
                            <th>Nội dung bình luận</th>
                            <th>Thời gian</th>
                            <th>ID sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <?php
                    $sql = "SELECT * FROM `binhluan` WHERE 1";
                    $data = pdo_query($sql);
                    foreach ($data as $rows) {
                        echo '
                        <tbody>
                            <tr>
                                <td>'. $rows["userName"] .'</td>
                                <td>'. $rows["noidung_binhLuan"] .'</td>
                                <td>'. $rows["ngay_binhLuan"] .'</td>
                                <td>'. $rows["id_sanPham"] .'</td>
                                <td>
                                    <form action="index.php?act=commentDel&id=' . $rows["id_binhLuan"] . '" method="post">
                                        <div class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                            <input name="xoabl" type="submit" class="btn btn-danger"  value="Xoá ">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>