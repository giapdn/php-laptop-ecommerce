<div id="productList">

<a href="index.php?act=products"><input type="submit" name="prod-add-btn" value="Thêm"></a>
    <div style="background-color: brown !important;border-bottom: 1px solid gray;" class="prodTittle">
        <div class="prodID x">Id</div>
        <div class="prodName x">Tên</div>
        <div class="prodPrice x">Giá</div>
        <div class="prodDescription x">Mô tả</div>
        <div class="prodImg x">Ảnh</div>
        <div class="prodView x">Views</div>


        
        <div style="background-color: brown;border-bottom: 1px solid gray;" class="category_id x">Danh mục</div>
        <div style="background-color: brown;border-bottom: 1px solid gray;" class="prodInStock x">Thao tác</div>
    </div>
    <?php
    $sql = "SELECT * FROM `sanpham` ORDER BY `dateAdd` DESC";
  


       



        include "models/pdo.php";
       
        $data = pdo_query($sql);
        foreach ($data as $rows) {
            extract($rows);
            $pathID = "index.php?act=prodChange&prodID=" . $rows["id_sanPham"];
            echo '
            <div class="prodRows">
                <div class="prodID y">' . $rows["id_sanPham"] . '</div>
                <div class="prodName y">' . $rows["tenSanPham"] . '</div>
                <div class="prodPrice y">' . $rows["giaSanPham"] . '</div>
                <div class="prodDescription y">' . $rows["moTaSanPham"] . '</div>
                <div class="prodImg y">
                    <img src="uploads/' . $rows["img_path"] . '" alt="">
                </div>
                <div class="prodView y">' . $rows["views"] . '</div>
                <div class="category_id y">' . $rows["id_danhmuc"] . '</div>
                <div class="button y">
                    <form action="' . $pathID . '" method="post">
                        <input name="prod-change-btn" type="submit" value="Sửa">
                    </form>
                    <form action="../admin/models/prodDel_process.php" method="post">
                        <input name="prodID" type="hidden" value="' . $rows["id_sanPham"] . '">
                        <input name="prod-delete-btn" type="submit" value="Xoá">
                    </form>
                </div>
            </div>
        ';
        }
    
   
    ?>
    

    <script>
        function goToProdChange() {
            event.preventDefault();
            window.location.href = "index.php?act=prodChange";
        }
    </script>
</div>