<div class="row" style="background-color: white;">
    <div id="piechart" style="padding-left: 235px;"></div>

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
            var options = {
                'title': 'Biểu đồ thống kê sản phẩm bán chạy',
                'width': 1100,
                'height': 800
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</div>
