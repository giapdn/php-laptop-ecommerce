<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">Sản phẩm</h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?act=formadd" class="btn btn-primary mb-2">Thêm sản phẩm</a>
                </div>
                <table id="example" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Ảnh.</th>
                            <th>Views</th>
                            <th>Category</th>
                            <th>Date add</th>
                            <th>Thông số</th>
                            <th>Thao tác</th>
            <div class="main-content">
                <h3 class="title-page">Sản phẩm</h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?act=formadd" class="btn btn-primary mb-2">Thêm sản phẩm</a>
                </div>
                <table id="example" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Ảnh.</th>
                            <th>Views</th>
                            <th>Category</th>
                            <th>Date add</th>
                            <th>Thông số</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `sanpham` ORDER BY `id_sanPham` DESC";

                    $data = pdo_query($sql);
                    foreach ($data as $rows) {
                        echo '                          
                            <tbody>
                                <tr>
                                    <td>' . $rows["id_sanPham"] . '</td>
                                    <td>' . $rows["tenSanPham"] . '</td>
                                    <td>' . $rows["giaSanPham"] . '</td>
                                    <td>' . $rows["moTaSanPham"] . '</td>
                                    <td><img style="width: 90px;height: auto;" src="uploads/' . $rows["img_path"] . '" alt=Img"></td>
                                    <td>' . $rows["views"] . '</td>
                                    <td>' . $rows["id_danhmuc"] . '</td>
                                    <td>' . $rows["dateAdd"] . '</td>
                                ';

                        echo '
                        <td>
                            <select>
                                <option>' . $rows["chip"] . '</option>
                                <option>' . $rows["ram"] . '</option>
                                <option>' . $rows["store"] . '</option>
                                <option>' . $rows["display"] . '</option>
                                <option>' . $rows["card"] . '</option>
                                <option>' . $rows["color"] . '</option>
                                <option>' . $rows["weight"] . '</option>
                            </select>
                        </td>';

                        echo '
                                    <td class="moden">
                                        <div class="ok" style="display: flex; " >
                                            <form action="index.php?act=prodChange&prodID=' . $rows["id_sanPham"] . '" method="post" >
                                                <div class="btn btn-warning" style="margin-right: 10px; display: flex">
                                                <i class="fa-solid fa-pen-to-square" style="margin-top: 9px; "></i>
                                                <input name="prod-change-btn" class="btn btn-warning" type="submit" value="Sửa">
                                                </div>
                                            </form>
                                            
                                            <form action="../admin/index.php?act=prodDel&id=' . $rows["id_sanPham"] . '" method="post">
                                                <div class="btn btn-danger" style="margin-right: 10px; display: flex">
                                                <i class="fa-solid fa-trash" style="margin-top:9px ; "></i>
                                                <input name="prod-delete-btn" class="btn btn-danger" type="submit" value="Xoá">       
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        ';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>