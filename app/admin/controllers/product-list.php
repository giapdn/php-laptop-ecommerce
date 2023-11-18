<div id="productList">
    <div style="background-color: brown !important;border-bottom: 1px solid gray;" class="prodTittle">
        <div class="prodID x">Id</div>
        <div class="prodName x">Tên</div>
        <div class="prodPrice x">Giá</div>
        <div class="prodDescription x">Mô tả</div>
        <div class="prodImg x">Ảnh</div>
        <div class="prodView x">Views</div>
        <div class="category_id x">Danh mục</div>
        <div class="prodInStock x">Thao tác</div>
    </div>
    <?php
    $sql = "SELECT * FROM `products` ORDER BY `dateAdd` DESC";
    try {
        include "models/database.php";
        $result = $conn->query($sql);
        while ($rows = $result->fetch_assoc()) {
            $pathID = "index.php?act=prodChange&prodID=" . $rows["prodID"];
            echo '
            <div class="prodRows">
                <div class="prodID y">' . $rows["prodID"] . '</div>
                <div class="prodName y">' . $rows["prodName"] . '</div>
                <div class="prodPrice y">' . $rows["prodPrice"] . '</div>
                <div class="prodDescription y">' . $rows["prodDescription"] . '</div>
                <div class="prodImg y">
                    <img src="uploads/' . $rows["prodImg"] . '" alt="">
                </div>
                <div class="prodView y">' . $rows["prodView"] . '</div>
                <div class="category_id y">' . $rows["category_id"] . '</div>
                <div class="button y">
                    <form action="' . $pathID . '" method="post">
                        <input name="prod-change-btn" type="submit" value="Sửa">
                    </form>
                    <form action="../admin/models/prodDel_process.php" method="post">
                        <input name="prodID" type="hidden" value="' . $rows["prodID"] . '">
                        <input name="prod-delete-btn" type="submit" value="Xoá">
                    </form>
                </div>
            </div>
        ';
        }
    } catch (\mysqli_sql_exception $th) {
        echo "oop !: " . $th->getMessage();
    } finally {
        $conn->close();
    }
    ?>
    <a href="index.php?act=products"><input type="submit" name="prod-add-btn" value="Thêm"></a>

    <script>
        function goToProdChange() {
            event.preventDefault();
            window.location.href = "index.php?act=prodChange";
        }
    </script>
</div>