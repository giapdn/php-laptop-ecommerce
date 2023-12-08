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
                    THỐNG KÊ DANH SÁCH SẢN PHẨM BÁN CHẠY
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                        <tr>
                            <th>ID sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng đã bán</th>
                            <th>Giá sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá trung bình</th>
                        </tr>
                    </thead>

                    <?php
                    $sql = "select sanpham.id_sanPham as madm,sanpham.giaSanPham as giaSanPham,sanpham.tenSanPham as tendm,count(chitietdonhang.id_sanPham) as countsp,sanpham.img_path as img";
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
                                        <td>' . $lis["countsp"] . '</td>
                                        <td>' . $lis["giaSanPham"] . '</td>
                                        <td><img src="uploads/' .  $lis["img"] . '" alt="" width="40%" ></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            ';
                    }
                    ?>
                    <div class="d-flex justify-content-end">
                        <a href="index.php?act=bieudosp" class="btn btn-primary mb-2">Xem biểu đồ</a>
                    </div>
                </table>

            </div>
        </div>
    </div>
</body>

</html>