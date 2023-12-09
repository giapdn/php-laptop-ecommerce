<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">Tin tức</h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?act=themtt" class="btn btn-primary mb-2">Thêm tin tức</a>
                </div>
                <table id="example" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nội dung tin tức</th>
                            <th>Ngày đăng</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `tintuc` ";

                    $data = pdo_query($sql);
                    foreach ($data as $rows) {
                        echo '
                            <tbody>
                                <tr>
                                    <td>' . $rows["id_tinTuc"] . '</td>
                                    <td><textarea readonly name="" id="" cols="25" rows="2">' . $rows["noidung_tinTuc"] . '</textarea></td>
                                    <td>' . $rows["ngaydang_tinTuc"] . '</td>
                                    <td>' . $rows["tieude"] . '</td>
                                    <td><img style="width: 70px;height: auto;" src="uploads/' . $rows["img_path"] . '" alt=""></td>
                                    <td>
                                        <div class="ok" style="display: flex; " >
                                                <form action="index.php?act=suatt&id=' . $rows["id_tinTuc"] . '" method="post" >
                                                    <div class="btn btn-warning" style="margin-right: 10px; display: flex">
                                                    <i class="fa-solid fa-pen-to-square" style="margin-top: 9px; "></i>
                                                    <input name="suatt" class="btn btn-warning" type="submit" value="Sửa">
                                                    </div>
                                                </form>
                                                
                                                <form action="../admin/index.php?act=deltintuc&id=' . $rows["id_tinTuc"] . '" method="post">
                                                    <div class="btn btn-danger" style="margin-right: 10px; display: flex">
                                                    <i class="fa-solid fa-trash" style="margin-top:9px ; "></i>
                                                    <input class="btn btn-danger" name="xoatt" type="submit" value="Xoá">       
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
