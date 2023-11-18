<div id="ctgryList">
    <div style="background-color: brown !important;" class="rows">
        <div class="categoryID" style="color: white !important">
            ID
        </div>
        <div class="categoryName" style="color: white !important">
            Danh mục
        </div>
        <div class="change" style="color: white !important">
            Thao tác
        </div>
    </div>
    
    <?php

    include "models/database.php";
    $sql = "SELECT `category_id`, `category_name` FROM `categories` WHERE 1";
    $result = $conn->query($sql);
    while ($data = $result->fetch_assoc()) {
        $path = "index.php?act=categoryChange&category_id=" . $data["category_id"];
        echo '
            <div class="rows">
                <div class="categoryID">' . $data["category_id"] . '</div>
                <div class="categoryName">' . $data["category_name"] . ' </div>
                <div class="change">
                    <form action="' . $path . '" method="post">                      
                        <input type="submit" name="data-change" value="Sửa">
                    </form>
                    <form action="../admin/models/categoryDel_process.php" method="post">
                        <input type="hidden" name="categoryID" value="' . $data["category_id"] . '">
                        <input type="submit" name="data-delete" value="Xoá">
                    </form>
                </div>
            </div>
        ';
    }
    $conn->close();
    ?>
    <a href="index.php?act=categoryAdd"><input type="submit" name="data-add" value="Thêm"></a>

</div>
