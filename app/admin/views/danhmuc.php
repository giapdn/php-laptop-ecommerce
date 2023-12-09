<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    Danh mục
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?act=ctgryAddForm" class="btn btn-primary mb-2">Thêm danh mục</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                <div class="categoryID">ID</div>
                            </th>
                            <th>
                                <div class="categoryName">Tên danh mục</div>
                            </th>
                            <th>
                                <div class="img_danhmuc">Ảnh</div>
                            </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM danhmuc";
                    $data = pdo_query($sql);
                    foreach ($data as $rows) {
                        extract($rows);
                        $path = "index.php?act=categoryChange&category_id=" . $id_danhmuc;
                        // $xoa = "index.php?act=categoryDel&category_id=" . $id_danhmuc;
                        echo '
                        <tbody>
                            <tr>
                                <td>
                                    <div class="categoryID">' . $id_danhmuc . '</div>
                                </td>
                                <td>
                                    <div class="categoryName">' . $tendanhmuc . '</div>
                                </td>
                                <td>
                                <img style="width: 70px;height: auto;" src="uploads/' . $img_danhmuc . '" alt="">
                                </td>
                                <td>
                                <div class="ok" style="display: flex; " >
                                    <form action="' . $path . '" method="post">   
                                        <div class="btn btn-warning" style="margin-right: 10px;">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input type="submit" name="data-change" class="btn btn-warning" value="Sửa">
                                        </div>
                                    </form>

                                    <form action="index.php?act=categoryDel" method="post">
                                        <input type="hidden" name="categoryID" value="' . $id_danhmuc . '">
                                        <div class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                            <input type="submit" name="data-delete" class="btn btn-danger" value="Xoá">
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