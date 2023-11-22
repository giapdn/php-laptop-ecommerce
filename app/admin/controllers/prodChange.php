<div id="products" style="background-color: purple;">
    <form action="index.php?act=prodChangeProcess&id=<?php echo getID()?>" method="post" enctype="multipart/form-data" style="background-color: purple;">
        <label>Mã sản phẩm: </label>
        <input type="text" readonly name="prodID" value="<?php echo getID(); ?>">
        <br> <br>
        <label>Tên sản phẩm: </label>
        <input type="text" name="prodName" value="<?php echo getProdName() ?>">
        <br> <br>
        <label>Giá: </label>
        <input type="number" name="prodPrice" value="<?php echo getProdPrice() ?>">
        <br> <br>
        <label>Mô tả: </label>
        <input type="text" name="prodDesc" value="<?php echo getProdDesc() ?>">
        <br> <br>
        <label>Ảnh: </label>
        <input type="file" name="prodImg">
        <br> <br>
        <label>Danh mục:</label>
        <select name="productCategory">
            <?php getDanhMuc(); ?>
        </select>
        <br> <br>
        <input type="submit" name="prod-list" value="Danh sách" onclick="goToProdList()">
        <input type="submit" name="prod-data-change" value="Sửa">
    </form>
</div>

<?php
include "models/pdo.php";
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
        window.location.href = "index.php?act=prodList";
    }
</script>