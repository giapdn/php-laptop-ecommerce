<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <h3 class="title-page">
                    Thêm biến thể cho sản phẩm
                </h3>

                <form class="addsp" action="index.php?act=slbienthe" method="POST">
                    <div class="form-group">
                        <label for="id_sanPham">Tên sản phẩm:</label>
                        <select class="form-select" name="id_sanPham" aria-label="Default select example">
                            <?php getsp() ?>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for="chip">Chip: </label>
                        <input type="text" name="chip" class="form-control" placeholder="Nhập thông số"> <br>

                        <label for="ram">Ram: </label>
                        <input type="text" name="ram" class="form-control" placeholder="Nhập thông số"> <br>

                        <label for="gb">Dung lượng lưu trữ: </label>
                        <input type="text" name="gb" class="form-control" placeholder="Nhập thông số"> <br>

                        <label for="display">Màn hình: </label>
                        <input type="text" name="display" class="form-control" placeholder="Nhập thông số"> <br>

                        <label for="color">Màu: </label>
                        <input type="text" name="color" class="form-control" placeholder="Nhập thông số"> <br>

                        <label for="weight">Cân nặng: </label>
                        <input type="text" name="weight" class="form-control" placeholder="Nhập thông số"> <br>


                        <label for="price">Giá </label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="price" class="form-control" placeholder="Nhập giá biến thể">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="prod-list" class="btn btn-primary" value="Danh sách" onclick="goToProdList()">
                        <input type="submit" name="them" class="btn btn-primary" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function goToProdList() {
        event.preventDefault();
        window.location.href = "index.php?act=quanlybienthe";
    }
</script>

<?php
function getsp()
{
    $sql = "SELECT * FROM `sanpham`";
    include "../models/pdo.php";
    $data = pdo_query($sql);
    foreach ($data as $rows) {
        echo '<option value="' . $rows["id_sanPham"] . '">' . $rows["tenSanPham"] . '</option>';
    }
}
?>