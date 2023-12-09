<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">

                <form action="index.php?act=themdanhmuc" method="post" enctype="multipart/form-data">
                <form action="index.php?act=themdanhmuc" method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Thêm danh mục
                        Thêm danh mục
                    </h3>
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control" name="categoryName" id="name" placeholder="Nhập tên danh mục">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="prodImg">Ảnh danh mục</label>
                        <div class="custom-file">
                            <input type="file" name="img_danhmuc" class="custom-file-input" id="exampleInputFile">
                        </div>
                    </div>
                    <br>

                    <div class="form-group">

                        <button type="submit" name="list" class="btn btn-primary" onclick="goToList()">Danh sách</button>
                        <button type="submit" name="data-send" class="btn btn-primary">Thêm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body> 