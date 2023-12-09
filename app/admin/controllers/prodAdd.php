<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <h3 class="title-page">
                    Thêm sản phẩm
                </h3>

                <form class="addPro" action="index.php?act=addSp" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="prodID">Mã sản phẩm:</label>
                        <input type="text" class="form-control" name="prodID" readonly>
                    </div>

                <div class="form-group">
                    <label for="prodName">Tên sản phẩm:</label>
                    <input type="text" class="form-control" name="prodName" id="name" placeholder="Nhập tên sả phẩm">
                </div>

                <div class="form-group">
                    <label for="prodPrice">Giá </label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="prodPrice" id="price" class="form-control" placeholder="Nhập giá sản phẩm">
                    </div>
                </div>

                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="prodDesc" rows="3" placeholder="Nhập mô tả ngắn về sản phẩm" style="height: 78px;"></textarea>
                </div>

                <div class="form-group">
                    <label for="prodImg">Ảnh sản phẩm</label>
                    <div class="custom-file">
                        <input type="file" name="prodImg" class="custom-file-input" id="exampleInputFile">
                    </div>
                </div>

                    <div class="form-group">
                        <label for="productCategory">Danh mục:</label>
                        <select class="form-select" name="productCategory" aria-label="Default select example">
                            <?php getCategory() ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Thông số kỹ thuật: </label> <br>

                        <label for="chip">Chip: </label>
                        <input type="text" name="chip" class="form-control" placeholder="Nhập thông số"> <br>
                        <label for="ram">Ram: </label>
                        <input type="text" name="ram" class="form-control" placeholder="Nhập thông số"> <br>
                        <label for="store">Dung lượng lưu trữ: </label>
                        <input type="text" name="store" class="form-control" placeholder="Nhập thông số"> <br>
                        <label for="display">Màn hình: </label>
                        <input type="text" name="display" class="form-control" placeholder="Nhập thông số"> <br>
                        <label for="color">Màu: </label>
                        <input type="text" name="color" class="form-control" placeholder="Nhập thông số"> <br>
                        <label for="weight">Cân nặng: </label>
                        <input type="text" name="weight" class="form-control" placeholder="Nhập thông số"> <br>
                        <label for="card">card: </label>
                        <input type="text" name="card" class="form-control" placeholder="Nhập thông số"> <br>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="prod-list" class="btn btn-primary" value="Danh sách" onclick="goToProdList()">
                        <input type="submit" name="prod-data-send" class="btn btn-primary" value="Thêm">
                    </div>
                </form>
            </div>
</body>
<script>
    function goToProdList() {
        event.preventDefault();
        window.location.href = "index.php?act=quanlysp";
    }
</script>

<?php
function getCategory()
{
    $sql = "SELECT * FROM `danhmuc`";
    include "../models/pdo.php";
    $data = pdo_query($sql);
    foreach ($data as $rows) {
        echo '<option value="' . $rows["id_danhmuc"] . '">' . $rows["tendanhmuc"] . '</option>';
    }
}
?>