<body style="background-color: white;">
    <div id="ctgryList">
        <a href="index.php?act=ctgryAddForm"><input type="submit" name="data-add" value="Thêm"></a>

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

        $sql = "SELECT * FROM danhmuc";
        $data = pdo_query($sql);
        foreach ($data as $rows) {
            extract($rows);
            $path = "index.php?act=categoryChange&category_id=" . $id_danhmuc;
            echo '
            <div class="rows">
                <div class="categoryID">' . $id_danhmuc . '</div>
                <div class="categoryName">' . $tendanhmuc . ' </div>
                <div class="change">
                    <form action="' . $path . '" method="post">  
                        <input type="submit" name="data-change" value="Sửa">
                    </form>
                    <form action="index.php?act=categoryDel" method="post">
                        <input type="hidden" name="categoryID" value="' . $id_danhmuc . '">
                        <input type="submit" name="data-delete" value="Xoá">
                    </form>
                </div>
            </div>
        ';
        }
        ?>
    </div>
</body>