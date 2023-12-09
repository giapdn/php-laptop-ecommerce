<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    THỐNG KÊ DANH SÁCH SẢN PHẨM BÁN CHẠY
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                        <tr>
                        <tr>
                            <th>ID sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng đã bán</th>
                            <th>Giá sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Thông số</th>
                        </tr>
                    </thead>

                    <?php
                    $sql = "select sanpham.id_sanPham as madm,sanpham.giaSanPham as giaSanPham,sanpham.tenSanPham as tendm,count(chitietdonhang.id_sanPham) as countsp,sanpham.img_path as img,
                    sanpham.chip as chip, sanpham.ram as ram, sanpham.store as store, sanpham.display as display , sanpham.card as card, sanpham.color as color, sanpham.weight as weight";
                    $sql .= " from chitietdonhang left join sanpham on sanpham.id_sanPham  =chitietdonhang.id_sanPham   ";
                    $sql .= " group by sanpham.id_sanPham  order by sanpham.id_sanPham   desc";
                    $listtk = pdo_query($sql);
                    // return $listtk;
                    foreach ($listtk as $lis) {
                        // extract($lis);
                        echo '
                                <tbody>
                                    <tr>
                                        <td>' . $lis["madm"] . '</td>
                                        <td>' . $lis["tendm"] . '</td>
                                        <td>' . $lis["tendm"] . '</td>
                                        <td>' . $lis["countsp"] . '</td>
                                        <td>' . $lis["giaSanPham"] . '</td>
                                        <td><img src="uploads/' .  $lis["img"] . '" alt="" width="40%" ></td>
                                        ';

                        echo '
                        <td>
                            <select>
                                <option>' . $lis["chip"] . '</option>
                                <option>' . $lis["ram"] . '</option>
                                <option>' . $lis["store"] . '</option>
                                <option>' . $lis["display"] . '</option>
                                <option>' . $lis["card"] . '</option>
                                <option>' . $lis["color"] . '</option>
                                <option>' . $lis["weight"] . '</option>
                            </select>
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