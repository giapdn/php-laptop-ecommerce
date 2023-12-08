<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Document</title>
</head>

<body>
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

                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `sanpham` ORDER BY `dateAdd` DESC";

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
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable("#example");
    </script>
</body>

</html>