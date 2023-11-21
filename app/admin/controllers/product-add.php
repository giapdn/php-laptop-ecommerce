<div id="products">
    <form action="index.php?act=addSp" method="post" enctype="multipart/form-data">
        <label for="">Mã sản phẩm: </label>
        <input type="text" name="productCode">
        <br> <br>
        <label for="">Tên sản phẩm: </label>
        <input type="text" name="productName">
        <br> <br>
        <label for="">Giá: </label>
        <input type="number" name="productPrice">
        <br> <br>
        <label for="">Mô tả: </label>
        <input type="text" name="productDescription">
        <br> <br>
        <label for="">Ảnh: </label>
        <input type="file" name="productImage">
        <br> <br>
        <label for="">Danh mục:</label>
        <select name="productCategory">
            <?php getCategory(); ?>
        </select>
        <br> <br>
        <input type="submit" name="prod-list" value="Danh sách" onclick="goToProdList()">
        <input type="submit" name="prod-data-send" value="Thêm">
    </form>
</div>

<script>
    function goToProdList() {
        event.preventDefault();
        window.location.href = "index.php?act=prodList";
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