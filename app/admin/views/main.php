
<body style="background-color: white;">
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
                                    $sql = "SELECT count(count) AS tong FROM sanpham ";
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
                                    $sql = "SELECT count(userName) AS tong FROM users ";
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
                                    $sql = "SELECT count(id_danhmuc) AS tong FROM danhmuc ";
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
                                    $sql = "SELECT COUNT(id_donHang) AS tong FROM donhang ";
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
                            <h4>Biểu đồ thống kê sản phẩm bán chạy</h4>
                            <div id="myChart" style="padding-left: 100px;"></div>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);
                                // Draw the chart and set the chart values
                                function drawChart() {
                                    const data = google.visualization.arrayToDataTable([
                                        ['Task', 'Hours per Day'],
                                        <?php
                                        $sql = "select sanpham.id_sanPham as madm,sanpham.tenSanPham as tendm,count(chitietdonhang.id_sanPham) as countsp,min(chitietdonhang.tongGia) as mingia,max(chitietdonhang.tongGia) as maxgia,avg(chitietdonhang.tongGia) as avggia";
                                        $sql .= " from chitietdonhang left join sanpham on sanpham.id_sanPham  =chitietdonhang.id_sanPham   ";
                                        $sql .= " group by sanpham.id_sanPham  order by sanpham.id_sanPham   desc";
                                        $listtk = pdo_query($sql);

                                        $tongdm = count($listtk);
                                        $i = 1;
                                        foreach ($listtk as $thongke) {
                                            extract($thongke);
                                            if ($i == $tongdm) $dauphay = "";
                                            else $dauphay = ",";
                                            echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                                            $i += 1;
                                        }
                                        ?>
                                    ]);
                                    // Optional; add a title and set the width and height of the chart
                                    const options = {
                                       
                                        'width': 300,
                                        'height': 300,
                                        is3D: true
                                    };
                                    // Display the chart inside the <div> element with id="piechart"
                                    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                                    chart.draw(data, options);
                                }
                            </script>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col xl-6">
                        <div div class="card chart">
                        <h4>Biểu đồ thống kê theo loại</h4>
                            <div id="piechart" style="padding-left: 150px;"></div>

                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                            <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Task', 'Hours per Day'],

                                        <?php
                                        $sql = "select danhmuc.id_danhmuc as madm,danhmuc.tendanhmuc as tendm,count(sanpham.id_sanPham) as countsp,min(sanpham.giaSanPham) as mingia,max(sanpham.giaSanPham) as maxgia,avg(sanpham.giaSanPham) as avggia";
                                        $sql .= " from sanpham left join danhmuc on danhmuc.id_danhmuc =sanpham.id_danhmuc  ";
                                        $sql .= " group by danhmuc.id_danhmuc  order by danhmuc.id_danhmuc  desc";
                                        $listtk = pdo_query($sql);

                                        $tongdm = count($listtk);
                                        $i = 1;
                                        foreach ($listtk as $thongke) {
                                            extract($thongke);
                                            if ($i == $tongdm) $dauphay = "";
                                            else $dauphay = ",";
                                            echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                                            $i += 1;
                                        }
                                        ?>


                                    ]);

                                    // Optional; add a title and set the width and height of the chart
                                    var options = {
                                        
                                        'width': 300,
                                        'height': 300,
                                    };

                                    // Display the chart inside the <div> element with id="piechart"
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                    chart.draw(data, options);
                                }
                            </script>
                        </div>
                    </div>
                </section>
                <br>
                <section class="row">
                    <div class="col-sm-12 col-md-6 col xl-6">
                        <div class="card chart">
                            <form action="#" method="post">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" placeholder="Username" aria-label="Username">
                                    <span class="input-group-text">Đến ngày</span>
                                    <input type="date" class="form-control" placeholder="Server" aria-label="Server">
                                    <button type="button" class="btn btn-primary">Xem</button>
                                </div>
                            </form>
                            <p style="font-weight: bold; font-size:25.5px;">Tổng doanh thu:
                                <?php
                                $sql = "SELECT SUM(tongGiaDonHang) AS tong FROM donhang ";
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
                                $sql = "SELECT * FROM `donhang`  ORDER BY id_donHang DESC LIMIT 10";
                                $data = pdo_query($sql);
                                foreach ($data as $a) {
                                    echo '
                                        <tbody>
                                        <tr>
                                            <td>' . $a["id_donHang"] . '</td>
                                            <td>' . $a["ngayDatHang"] . '</td>
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
                                $sql = "SELECT * FROM `donhang`  ORDER BY ngayDatHang DESC LIMIT 4";
                                $data = pdo_query($sql);
                                foreach ($data as $a) {
                                    echo '
                                        <tbody>
                                        <tr>
                                            <td>' . $a["id_donHang"] . '</td>
                                            <td>' . $a["trangThai"] . '</td>
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
                                $sql = "SELECT * FROM `users` ORDER BY userName DESC LIMIT 4";
                                $data = pdo_query($sql);
                                foreach ($data as $a) {
                                    echo '
                                        <tbody>
                                        <tr>
                                            <td>' . $a["userName"] . '</td>
                                            <td>' . $a["sdt"] . '</td>
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
</body>