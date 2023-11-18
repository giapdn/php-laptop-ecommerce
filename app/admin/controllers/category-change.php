<div id="categories" style="background-color: purple;">
    <form action="../admin/models/categoryChange_process.php" method="post" style="background-color: purple;">
        <label for="categoryID">ID: </label>
        <input type="text" name="categoryID" readonly value="<?php getCTGRYID(); ?>"> <br> <br>
        <label for="categoryName">Danh mục:</label>
        <input type="text" name="categoryName" placeholder="Nhập tên mới"> <br> <br>
        <input type="submit" name="list" value="Danh sách" onclick="goToList()">
        <input type="submit" name="data-change" value="Sửa">
    </form>
</div>

<script>
    function goToList(params) {
        event.preventDefault();
        window.location.href = "index.php?act=categories";
    }
</script>

<?php
function getCTGRYID()
{
    if (isset($_GET["act"]) && $_GET["act"] == "categoryChange") {
        if (isset($_GET["category_id"])) {
            echo $_GET["category_id"];
        }
        else {
            echo "Lỗi khi get ID !";
        }
    };
}
?>