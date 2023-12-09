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
                'title': 'Biểu đồ thống kê theo loại',
                'width': 1100,
                'height': 800
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</div>
