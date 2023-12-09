<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">


                <form action="models/categoryChange_process.php"  method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Sửa danh mục
                    </h3>
                    <label for="categoryID">ID: </label><br>
                    <input type="text" name="categoryID" class="btn btn-primary" readonly value="<?php getCTGRYID(); ?>"> <br> <br>
                    
                    <label for="categoryName">Danh mục:</label>
                    <input type="text" name="categoryName" class="form-control" placeholder="Nhập tên mới"> <br><br>
                    
                    <label for="prodImg">Ảnh danh mục</label>
                    <br>
                    <input type="file" name="img_danhmuc" class="custom-file-input" id="exampleInputFile">
                    <br><br>

                    <input type="submit" name="list" class="btn btn-primary" value="Danh sách" onclick="goToList()">
                    <input type="submit" name="data-change" class="btn btn-primary" value="Sửa">
                </form>
            </div>

        <script>
            function goToList(params) {
                event.preventDefault();
                window.location.href = "index.php?act=danhmuc";
            }
        </script>

            <?php
            function getCTGRYID()
            {
                if (isset($_GET["act"]) && $_GET["act"] == "categoryChange") {
                    if (isset($_GET["category_id"])) {
                        echo $_GET["category_id"];
                    } else {
                        echo "Lỗi khi get ID !";
                    }
                };
            }
            ?>


        </div>
    </div>
    </div>
</body>
