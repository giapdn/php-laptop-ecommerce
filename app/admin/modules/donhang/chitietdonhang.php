<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form action="index.php?act=orderStateChange&orderID=" method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Cập nhật trạng thái đơn hàng
                    </h3>
                    <label for="categoryID">Mã đơn hàng</label><br>
                    <input name="__orderID" type="text" class="btn btn-primary" readonly value="<?php echo $_GET['id'] ?>"> <br> <br>
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
                    <label for="categoryName">Trạng thái giao hàng</label>
                ';
                    if (isset($_GET["flagg"]) && $_GET["flagg"] == 'capnhat') {
                        echo '
                        <select class="form-control" name="__orderState" id="" style="background-color: orangered; color: white;">
                            <option value="pending" selected>pending</option>
                            <option value="shipping">shipping</option>
                            <option value="shipped">shipped</option>
                        </select> <br>
                    ';
                    }
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
                    <input type="submit" name="__button" class="btn btn-primary" value="Cập nhật">
                </form>
            </div>
        </div>
    </div>
</body>