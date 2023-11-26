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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    Quản lí bình luận
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tên người dùng</th>
                            <th>Nội dung bình luận</th>
                            <th>Thời gian</th>
                            <th>ID sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <?php
                    $sql = "SELECT * FROM `binhluan` WHERE 1";
                    $data = pdo_query($sql);
                    foreach ($data as $rows) {
                        echo '
                        <tbody>
                            <tr>
                                <td>'. $rows["userName"] .'</td>
                                <td>'. $rows["noidung_binhLuan"] .'</td>
                                <td>'. $rows["ngay_binhLuan"] .'</td>
                                <td>'. $rows["id_sanPham"] .'</td>
                                <td>
                                    <form action="index.php?act=commentDel&id=' . $rows["id_binhLuan"] . '" method="post">
                                        <div class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                            <input name="xoabl" type="submit" class="btn btn-danger"  value="Xoá ">
                                        </div>
                                    </form>
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

</html>
