<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form action="index.php?act=variantChange_Process" method="post">
                    <h3 class="title-page">Sửa Biến Thể</h3>
                    <?php
                    if (isset($_GET["ID"])) {
                        $ID = $_GET["ID"];
                        $sql = "SELECT * FROM bienthe_sanpham WHERE ID = '$ID'";
                        $result = pdo_query_one($sql);
                        extract($result);
                        echo '
                        <label>ID biến thể: </label><br>
                        <input type="text" name="ID" class="btn btn-primary" readonly value="' . $ID . '"> <br>
                        <label>ID sản phẩm chứa biến thể: </label><br>
                        <input type="text" name="prodID" class="btn btn-primary" readonly value="' . $id_sanPham . '"> <br> <br>
                        <label>Chip: </label>
                        <input type="text" name="chip" class="form-control" value="' . $chip . '" placeholder="Enter new values"> <br>
                        <label>Ram: </label>
                        <input type="text" name="ram" class="form-control" value="' . $ram . '" placeholder="Enter new values"> <br>
                        <label>Dung lượng lưu trữ: </label>
                        <input type="text" name="gb" class="form-control" value="' . $gb . '" placeholder="Enter new values"> <br>
                        <label>Màn hình: </label>
                        <input type="text" name="display" class="form-control" value="' . $display . '" placeholder="Enter new values"> <br>
                        <label>Màu: </label>
                        <input type="text" name="color" class="form-control" value="' . $color . '" placeholder="Enter new values"> <br>
                        <label>Cân nặng: </label>
                        <input type="text" name="weight" class="form-control" value="' . $weight . '" placeholder="Enter new values"> <br>
                        <label>Giá: </label>
                        <input type="text" name="price" class="form-control" value="' . $price . '" placeholder="Enter new values"> <br>
                        <input type="submit" name="list" class="btn btn-primary" value="Danh sách" onclick="goToList()">

                        <input type="submit" name="data-change" class="btn btn-primary" value="Sửa">
                    ';
                    } else {
                        echo 'Fatal err bitch !';
                    }
                    ?>
                </form>
            </div>

            <script>
                function goToList() {
                    event.preventDefault();
                    window.location.href = "index.php?act=quanlybienthe";
                }
            </script>
        </div>
    </div>
</body>