<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <title>Document</title>
</head>

<body>
    <!-- <div class="container-fluid main-page">
        <div class="app-main">
            
            <div class="main-content">
                <h3 class="title-page">
                    Danh mục
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-primary mb-2">Thêm danh mục</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>
                                <a href="#" class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="#" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div> -->

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
                            <th>Ảnh</th>
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
                                        <td></td>
                                        <td>
                                            
                                            <form action="' . $path . '" method="post">   
                                                <div class="btn btn-warning">
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

</body>

</html>