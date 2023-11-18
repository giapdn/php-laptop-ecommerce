<div id="products" style="background-color: purple;">
    <form action="../admin/models/prodChange_process.php" method="post" enctype="multipart/form-data" style="background-color: purple;">
        <label for="">Mã sản phẩm: </label>
        <input type="text" readonly name="productCode" value="<?php getProdID(); ?>">
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
            <?php getCategories(); ?>
        </select>
        <br> <br>
        <input type="submit" name="prod-list" value="Danh sách" onclick="goToProdList()">
        <input type="submit" name="prod-data-change" value="Sửa">
    </form>
</div>

<?php
function getProdID()
{
    if (isset($_GET["act"]) && $_GET["act"] == "prodChange") {
        if (isset($_GET["prodID"])) {
            echo $_GET["prodID"];
        }
    }
}
function getCategories()
{
    $sql = "SELECT `category_id`, `category_name` FROM `categories`";
    include "models/database.php";
    $data = $conn->query($sql);
    while ($rows = $data->fetch_assoc()) {
        echo '<option value="' . $rows["category_id"] . '">' . $rows["category_name"] . '</option> ';
    }
    $conn->close();
}
?>

<script>
    function goToProdList() {
        event.preventDefault();
        window.location.href = "index.php?act=prodList";
    }
</script>