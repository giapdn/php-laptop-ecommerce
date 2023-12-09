<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    THỐNG KÊ DANH SÁCH THEO DANH MỤC
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Số lượng</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá cao nhất</th>
                            <th>Giá trung bình</th>
                        </tr>
                    </thead>

                    <?php


                        $sql="select danhmuc.id_danhmuc as madm,danhmuc.tendanhmuc as tendm,count(sanpham.id_sanPham) as countsp,min(sanpham.giaSanPham) as mingia,max(sanpham.giaSanPham) as maxgia,avg(sanpham.giaSanPham) as avggia";
                        $sql.= " from sanpham left join danhmuc on danhmuc.id_danhmuc =sanpham.id_danhmuc  ";
                        $sql.= " group by danhmuc.id_danhmuc  order by danhmuc.id_danhmuc  desc";
                        $listtk = pdo_query($sql);
                        // return $listtk;
                        foreach ($listtk as $lis) {
                            // extract($lis);
                            echo '
                                <tbody>
                                    <tr>
                                        <td>' . $lis["madm"] . '</td>
                                        <td>' . $lis["tendm"]. '</td>
                                        <td>' . $lis["countsp"] . '</td>
                                        <td>' . $lis["mingia"] . '</td>
                                        <td>' . $lis["maxgia"] . '</td>
                                        <td>' . $lis["avggia"] . '</td>
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