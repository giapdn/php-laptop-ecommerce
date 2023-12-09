<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    Biến thể sản phẩm
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?act=addbienthe" class="btn btn-primary mb-2">Thêm biến thể</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID sản phẩm</th>
                            <th>Chip</th>
                            <th>Ram</th>
                            <th>GB</th>
                            <th>Màn hình</th>
                            <th>Màu</th>
                            <th>Cân nặng</th>
                            <th>Giá biến theer</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `bienthe_sanpham` ORDER BY ID DESC ";
                    $result = pdo_query($sql);
                    foreach ($result as $a) {
                        echo '
                        <tbody>
                            <tr>
                                <td>' . $a["id_sanPham"] . '</td>
                                <td>' . $a["chip"] . '</td>
                                <td>' . $a["ram"] . '</td>
                                <td>' . $a["gb"] . '</td>
                                <td>' . $a["display"] . '</td>
                                <td>' . $a["color"] . '</td>
                                <td>' . $a["weight"] . '</td>
                                <td>' . $a["price"] . '</td>
                                <td>
                                <div class="ok" style="display: flex; " >
                                    <form action="index.php?act=variantChange_Form&ID=' . $a["ID"] . '" method="post" style="margin-right: 10px; display: flex">
                                        <div class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square" ></i>
                                            <input type="submit" class="btn btn-warning" value="Sửa">
                                        </div>
                                    </form>
                                    <form action="index.php?act=variantDel&ID=' . $a["ID"] . '" method="post">
                                        <div class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>    
                                            <input name="xoauser" type="submit" class="btn btn-danger" value="Xoá">
                                        </div>        
                                    </form>
                                    </div>
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