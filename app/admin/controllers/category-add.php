<div id="categories">
    <form action="../admin/models/categoryAdd_process.php" method="post">
        <label for="categoryID">ID: </label>
        <input type="text" name="categoryID" readonly> <br> <br>
        <label for="categoryName">Danh mục:</label>
        <input type="text" name="categoryName"> <br> <br>
        <input type="submit" name="list" value="Danh sách" onclick="goToList()">
        <input type="submit" name="data-send" value="Thêm">
    </form>
</div>

<script>
    function goToList(params) {
        event.preventDefault();
        window.location.href = "index.php?act=categories";
    }
</script>

