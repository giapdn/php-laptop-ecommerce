<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">Banner</h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?act=thembaner" class="btn btn-primary mb-2">Thêm banner</a>
                </div>
                <table id="example" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Img banner</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `banner`";

                    $data = pdo_query($sql);
                    foreach ($data as $rows) {
                        echo '
                            <tbody>
                                <tr>
                                    <td>' . $rows["id"] . '</td>
                                    <td><img style="width: 70px;height: auto;" src="uploads/' . $rows["img_path"] . '" alt=""></td>
                                    <td>
                                        <div class="ok" style="display: flex; " >
                                                <form action="index.php?act=sua&id=' . $rows["id"] . '" method="post" >
                                                    <div class="btn btn-warning" style="margin-right: 10px; display: flex">
                                                    <i class="fa-solid fa-pen-to-square" style="margin-top: 9px; "></i>
                                                    <input name="sua" class="btn btn-warning" type="submit" value="Sửa">
                                                    </div>
                                                </form>
                                                
                                                <form action="../admin/index.php?act=xoabn&id=' . $rows["id"] . '" method="post">
                                                    <div class="btn btn-danger" style="margin-right: 10px; display: flex">
                                                    <i class="fa-solid fa-trash" style="margin-top:9px ; "></i>
                                                    <input class="btn btn-danger" name="xoabn" type="submit" value="Xoá">       
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