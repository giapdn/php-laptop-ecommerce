<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <h3 class="title-page">
                    Sửa sản phẩm
                </h3>
                <form class="addPro" action="index.php?act=prodChangeProcess&id=<?php echo getID() ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="prodID">Mã sản phẩm:</label>
                        <input type="text" class="form-control" name="prodID" readonly value="<?php echo getID(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="prodName">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="prodName" value="<?php echo getProdName() ?>">
                    </div>
                    <div class="form-group">
                        <label for="prodPrice">Giá </label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="prodPrice" class="form-control" value="<?php echo getProdPrice() ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="prodDesc" rows="3" style="height: 78px;"><?php echo getProdDesc() ?></textarea>
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
                            <?php getDanhMuc(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thông số kỹ thuật: </label> <br>
                        <?php
                        if (isset($_GET["prodID"])) {
                            $ID = $_GET["prodID"];
                            $sql = "SELECT * FROM sanpham WHERE id_sanPham = '$ID'";
                            $result = pdo_query_one($sql);
                            extract($result);
                            echo '
                            <label>Chip: </label>
                            <input type="text" name="chip" class="form-control" value="' . $chip . '" placeholder="Enter new values"> <br>
                            <label>Ram: </label>
                            <input type="text" name="ram" class="form-control" value="' . $ram . '" placeholder="Enter new values"> <br>
                            <label>Dung lượng lưu trữ: </label>
                            <input type="text" name="gb" class="form-control" value="' . $store . '" placeholder="Enter new values"> <br>
                            <label>Màn hình: </label>
                            <input type="text" name="display" class="form-control" value="' . $display . '" placeholder="Enter new values"> <br>
                            <label>Màu: </label>
                            <input type="text" name="color" class="form-control" value="' . $color . '" placeholder="Enter new values"> <br>
                            <label>Cân nặng: </label>
                            <input type="text" name="weight" class="form-control" value="' . $weight . '" placeholder="Enter new values"> <br>
                        ';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="prod-list" class="btn btn-primary" value="Danh sách" onclick="goToProdList()">
                        <input type="submit" name="prod-data-change" class="btn btn-primary" value="Sửa">
                    </div>
                </form>
            </div>
</body>
<?php
function getID()
{
    if (isset($_GET["act"]) && $_GET["act"] == "prodChange") {
        if (isset($_GET["prodID"])) {
            $id = $_GET["prodID"];
            return $id;
        }
    }
}
function getProdName()
{
    $id = getID();
    $sql = "SELECT * FROM `sanpham` WHERE `id_sanPham` = '$id'";
    $data = pdo_query_one($sql);
    return $data["tenSanPham"];
}
function getProdPrice()
{
    $id = getID();
    $sql = "SELECT * FROM `sanpham` WHERE `id_sanPham` = '$id'";
    $data = pdo_query_one($sql);
    return $data["giaSanPham"];
}
function getProdDesc()
{
    $id = getID();
    $sql = "SELECT * FROM `sanpham` WHERE `id_sanPham` = '$id'";
    $data = pdo_query_one($sql);
    if ($data["moTaSanPham"] == "") {
        return "Chưa có mô tả";
    } else {
        return $data["moTaSanPham"];
    }
}
function getDanhMuc()
{
    $sql = "SELECT * FROM `danhmuc`";
    $data = pdo_query($sql);
    foreach ($data as $rows) {
        echo '<option value="' . $rows["id_danhmuc"] . '">' . $rows["tendanhmuc"] . '</option> ';
    }
}
?>

<script>
    function goToProdList() {
        event.preventDefault();
        window.location.href = "index.php?act=quanlysp";
    }
</script>