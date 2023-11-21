<div id="categories">
    <form action="index.php?act=themdanhmuc" method="post">
        <label for="categoryName">Danh mục:</label>
        <input type="text" name="categoryName"> <br> <br>
        <input type="submit" name="list" value="Danh sách" onclick="goToList()">
        <input type="submit" name="data-send" value="Thêm">
    </form>
</div>

<script>
    function goToList(params) {
        event.preventDefault();
        window.location.href = "index.php?act=listDanhMuc";
    }
</script>

