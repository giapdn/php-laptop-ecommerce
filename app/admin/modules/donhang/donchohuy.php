<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <h3 class="title-page">
                    Đơn chờ xác nhận huỷ
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng giá đơn hàng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <?php
                    if ($_GET["act"] == "searchOrder") {
                        $data = $_POST["dataOrder"];
                        $sql = "SELECT * FROM `donhang` WHERE id_donHang = '$data'";
                        $result = pdo_query_one($sql);
                        if (empty($result)) {
                            echo "<script>alert('Không tìm thấy đơn hàng')</script>";
                            $sql = "SELECT * FROM `donhang` WHERE trangThai = 'cancelConfirming'";
                            $result = pdo_query($sql);
                            foreach ($result as $re) {
                                echo '
                                <tbody>
                                    <tr>
                                        <td>' . $re["id_donHang"] . '</td>
                                        <td>' . $re["userName"] . '</td>
                                        <td>' . $re["ngayDatHang"] . '</td>
                                        <td>' . $re["tongGiaDonHang"] . '</td>
                                        <td>' . $re["trangThai"] . '</td>
                                        <td>
                                        <div class="ok" style="display: flex; " >
                                            <form action="index.php?act=suadonhang&id=' . $re["id_donHang"] . '" method="post" style="margin-right: 10px;">
                                                <div class="btn btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <input name="suadonhang"  class="btn btn-warning" type="submit" value="Sửa">
                                                </div>
                                            </form>
                                            <form action="index.php?act=donhangxoa&id_donHang=' . $re["id_donHang"] . '" method="post">
                                                <div class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                    <input name="xoaudonhang" type="submit" class="btn btn-danger"  value="Xoá ">
                                                </div>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            ';
                            }
                        } else {
                            echo '
                                    <tbody>
                                        <tr>
                                            <td>' . $result["id_donHang"] . '</td>
                                            <td>' . $result["userName"] . '</td>
                                            <td>' . $result["ngayDatHang"] . '</td>
                                            <td>' . $result["tongGiaDonHang"] . '</td>
                                            <td>' . $result["trangThai"] . '</td>
                                            <td>
                                            <div class="ok" style="display: flex; " >
                                                <form action="index.php?act=suadonhang&id=' . $result["id_donHang"] . '" method="post" style="margin-right: 10px;">
                                                    <div class="btn btn-warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                        <input name="suadonhang"  class="btn btn-warning" type="submit" value="Sửa">
                                                    </div>
                                                </form>
                                                <form action="index.php?act=donhangxoa&id_donHang=' . $result["id_donHang"] . '" method="post">
                                                    <div class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                        <input name="xoaudonhang" type="submit" class="btn btn-danger"  value="Xoá ">
                                                    </div>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                ';
                        }
                    } else if ($_GET["act"] == 'donchohuy') {
                        $sql = "SELECT * FROM `donhang` WHERE trangThai = 'cancelConfirming'";
                        $result = pdo_query($sql);
                        foreach ($result as $re) {
                            echo '
                        <tbody>
                            <tr>
                                <td>' . $re["id_donHang"] . '</td>
                                <td>' . $re["userName"] . '</td>
                                <td>' . $re["ngayDatHang"] . '</td>
                                <td>' . $re["tongGiaDonHang"] . '</td>
                                <td>' . $re["trangThai"] . '</td>
                                <td>
                                    <div class="ok" style="display: flex; " >
                                        <form action="index.php?act=xemdon&id=' . $re["id_donHang"] . '&user=' . $re["userName"] . '" method="post" style="margin-right: 10px;">
                                            <div class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                <input name="suadonhang"  class="btn btn-warning" type="submit" value="Xem đơn">
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>';
                        }
                    }
                    ?>
                    <form action="index.php?act=searchOrder" method="post">
                        <div class="d-flex justify-content-end" style="margin-bottom: 10px;">
                            <input class="p o v" type="text" name="dataOrder" placeholder="nhập mã đơn hàng" style="border-radius: 5px;">
                            <input class="btn btn-primary p o v" type="submit" name="list" value="Tìm kiếm">
                        </div>
                    </form>
                </table>
            </div>
        </div>
    </div>
</body>