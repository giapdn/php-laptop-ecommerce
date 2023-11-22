<div id="products">
    <form action="index.php?act=addSp" method="post" enctype="multipart/form-data">
        <label>Mã sản phẩm: </label>
        <input type="text" name="prodID" readonly>
        <br> <br>
        <label>Tên sản phẩm: </label>
        <input type="text" name="prodName">
        <br> <br>
        <label>Giá: </label>
        <input type="text" name="prodPrice">
        <br> <br>
        <label>Mô tả: </label>
        <input type="text" name="prodDesc">
        <br> <br>
        <label>Ảnh: </label>
        <input type="file" name="prodImg">
        <br> <br>
        <label>Danh mục:</label>
        <select name="productCategory">
            <?php getCategory()?>
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