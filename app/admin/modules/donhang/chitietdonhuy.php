<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Xác nhận huỷ đơn
                    </h3>
                    <label for="categoryID">Mã đơn hàng</label><br>
                    <input type="text" class="btn btn-primary" readonly value="<?php echo $_GET['id'] ?>"> <br> <br>
                    <?php
                    $prodID = $_GET["id"];
                    $sql = "SELECT * FROM donhang WHERE id_donHang = '$prodID'";
                    $result = pdo_query_one($sql);
                    extract($result);
                    echo '
                    <label for="categoryName">Tài khoản</label>
                    <input type="text" value="' . $userName . '" class="form-control" readonly> <br>
                    <label for="categoryName">Người nhận</label>
                    <input type="text" value="' . $tenNguoiNhan . '" class="form-control" readonly> <br>
                    <label for="categoryName">Số điện thoại</label>
                    <input type="text" value="' . $SDT . '" class="form-control" readonly> <br>
                    <label for="categoryName">Ngày đặt</label>
                    <input type="text" value="' . $ngayDatHang . '" class="form-control" readonly> <br>
                    <label for="categoryName">Tổng giá đơn hàng</label>
                    <input type="text" value="' . $tongGiaDonHang . '" class="form-control" readonly> <br>
                    <label for="categoryName">Phương thức thanh toán</label>
                    <input type="text" value="' . $pttt . '" class="form-control" readonly> <br>
                    <label for="categoryName">Địa chị nhận:</label>
                    <input type="text" value="' . $diaChi . '" class="form-control" readonly> <br>
                ';
                    ?>
                    <label for="categoryID">Sản phẩm đã mua</label><br>
                    <table id="example" class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ổ cứng</th>
                                <th>Giá</th>
                                <th>Mô tả</th>
                                <th>Ảnh.</th>
                                <th>Số lượng</th>
                                <th>Thông số</th>
                            </tr>
                        </thead>
                        <?php
                        $orderID = $_GET["id"];
                        $sql = "SELECT sanpham.*, chitietdonhang.* 
                        FROM `chitietdonhang`
                        JOIN sanpham ON chitietdonhang.id_sanpham = sanpham.id_sanPham
                        WHERE chitietdonhang.id_donHang = '$orderID'
                    ";
                        $data = pdo_query($sql);
                        foreach ($data as $rows) {
                            echo '                          
                        <tbody>
                            <tr>
                                <td>' . $rows["id_sanPham"] . '</td>
                                <td>' . $rows["tenSanPham"] . '</td>
                                <td>' . $rows["GB"] . ' gb</td>
                                <td>' . $rows["giaSanPham"] . '</td>
                                <td>' . $rows["moTaSanPham"] . '</td>
                                <td><img style="width: 90px;height: auto;" src="uploads/' . $rows["img_path"] . '" alt=Img"></td>
                                <td>' . $rows["soLuong"] . '</td>
                            ';
                            echo '
                            <td>
                                <select>
                                    <option>' . $rows["chip"] . '</option>
                                    <option>' . $rows["ram"] . ' gb</option>
                                    <option>' . $rows["display"] . ' inch</option>
                                    <option>' . $rows["card"] . '</option>
                                    <option>' . $rows["color"] . '</option>
                                    <option>' . $rows["weight"] . ' kg</option>
                                </select>
                            </td> 
                        <tbody>';
                        }
                        ?>
                    </table>
                    <input type="button" class="btn btn-primary" value="Xác nhận huỷ đơn" onclick="acceptCancel(`<?php echo $_GET['id'] ?>`,`<?php echo $_GET['user'] ?>`, event)">
                    <input type="button" class="btn btn-primary" value="Từ chối huỷ đơn" onclick="rejectCancel(`<?php echo $_GET['id'] ?>`,`<?php echo $_GET['user'] ?>`, event)">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function acceptCancel(orderID, user, event) {
        event.preventDefault();
        var x = confirm("Xác nhận huỷ đơn này ?");
        if (x) {
            console.log(orderID);
            $.ajax({
                type: "POST",
                url: "modules/donhang/accept.php",
                data: {
                    orderID: Number(orderID),
                    user: user
                },
                success: function(response) {
                    alert('Xong !');
                    window.location.href = "index.php?act=donchohuy";
                },
                error: function(error) {
                    console.log('Lỗi');
                }
            })
        }
    }

    function rejectCancel(orderID, user, event) {
        event.preventDefault();
        var y = confirm("Từ chối huỷ đơn này ?");
        if (y) {
            $.ajax({
                type: "POST",
                url: "modules/donhang/reject.php",
                data: {
                    orderID: Number(orderID),
                    user: user
                },
                success: function(response) {
                    alert('Xong !');
                    window.location.href = "index.php?act=donchohuy";
                },
                error: function(error) {
                    console.log(error);
                }
            })
        } else {
            console.log(0);
        }
    }
</script>
</div>