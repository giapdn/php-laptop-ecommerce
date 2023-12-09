<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid main-page">

        <div class="app-main">
         
            <div class="main-content">
                <h3 class="title-page">
                    Tổng Quan
                </h3>
                <section class="statistics row">
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="products.html">
                            <div class="card mb-3 widget-chart">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng sản phẩm
                                    </h5>
                                </div>
                                <span class="widget-numbers">
                                <?php
                               $sql ="SELECT SUM(count) AS tong FROM sanpham ";
                                $lis = pdo_query($sql);
                                foreach ($lis as $a) {
                                    echo '
                                    ' . number_format($a["tong"], 0, ',', '.') . '
                                    ';
                                }

                            ?>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="user.html">
                            <div class="card mb-3 widget-chart">

                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng thành viên
                                    </h5>
                                </div>
                                <span class="widget-numbers">
                                <?php
                               $sql ="SELECT count(userName) AS tong FROM users ";
                                $lis = pdo_query($sql);
                                foreach ($lis as $a) {
                                    echo '
                                    ' . number_format($a["tong"], 0, ',', '.') . '
                                    ';
                                }

                            ?>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="caterogies.html">
                            <div class="card mb-3 widget-chart">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng doanh mục
                                    </h5>
                                </div>
                                <span class="widget-numbers">
                                <?php
                               $sql ="SELECT count(id_danhmuc) AS tong FROM danhmuc ";
                                $lis = pdo_query($sql);
                                foreach ($lis as $a) {
                                    echo '
                                    ' . number_format($a["tong"], 0, ',', '.') . '
                                    ';
                                }

                            ?>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="#">
                            <div class="card mb-3 widget-chart">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng đơn hàng
                                    </h5>
                                </div>
                                <span class="widget-numbers">
                                <?php
                               $sql ="SELECT COUNT(id_donHang) AS tong FROM donhang ";
                                $lis = pdo_query($sql);
                                foreach ($lis as $a) {
                                    echo '
                                    ' . number_format($a["tong"], 0, ',', '.') . '
                                    ';
                                }

                            ?>
                                </span>
                            </div>
                        </a>
                    </div>
                </section>
                <section class="row">
                    <div class="col-sm-12 col-md-6 col xl-6">
                        <div class="card chart">
                            <form action="#" method="post">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" placeholder="Username"
                                        aria-label="Username">
                                    <span class="input-group-text">Đến ngày</span>
                                    <input type="date" class="form-control" placeholder="Server" aria-label="Server">
                                    <button type="button" class="btn btn-primary">Xem</button>
                                </div>
                            </form>
                            <p style="font-weight: bold; font-size:25.5px;">Tổng doanh thu: 
                            <?php
                               $sql ="SELECT SUM(tongGiaDonHang) AS tong FROM donhang ";
                                $lis = pdo_query($sql);
                                foreach ($lis as $a) {
                                    echo '
                                    ' . number_format($a["tong"], 0, ',', '.') . ' Vnđ
                                    ';
                                }

                            ?>
                            </p>
                            <!-- <td>' . number_format($a["tongGiaDonHang"], 0, ',', '.') . ' Vnđ</td> -->
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Doanh thu đơn hàng</th>
                                </thead>
                                <?php
                                    $sql ="SELECT * FROM `donhang`  ORDER BY id_donHang DESC LIMIT 10";
                                    $data = pdo_query($sql);
                                    foreach($data as $a){
                                        echo'
                                        <tbody>
                                        <tr>
                                            <td>'. $a["id_donHang"] .'</td>
                                            <td>'. $a["ngayDatHang"] .'</td>
                                            <td>' . $a["tongGiaDonHang"] . ' Vnđ</td>
                                       
                                        </tr
                                        ';
                                    }
                                ?>
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card chart">
                            <h4>Đơn hàng mới</h4>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái</th>
                                </thead>
                                <?php
                                    $sql ="SELECT * FROM `donhang`  ORDER BY ngayDatHang DESC LIMIT 4";
                                    $data = pdo_query($sql);
                                    foreach($data as $a){
                                        echo'
                                        <tbody>
                                        <tr>
                                            <td>'. $a["id_donHang"] .'</td>
                                            <td>'. $a["trangThai"] .'</td>
                                        </tr
                                        ';
                                    }
                                ?>
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card chart">
                            <h4>Khách hàng mới</h4>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>Username</th>
                                    <th>Số điện thoại</th>
                                </thead>
                                <?php
                                    $sql ="SELECT * FROM `users` ORDER BY userName DESC LIMIT 4";
                                    $data = pdo_query($sql);
                                    foreach($data as $a){
                                        echo'
                                        <tbody>
                                        <tr>
                                            <td>'. $a["userName"] .'</td>
                                            <td>'. $a["sdt"] .'</td>
                                        </tr
                                        ';
                                    }
                                ?>
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>