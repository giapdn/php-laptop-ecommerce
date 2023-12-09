

<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">

                <form action="index.php?act=them" method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Thêm tin tức
                    </h3>
                    <div class="form-group">
                        <label>Nội dung tin tức</label>
                        <textarea class="form-control" name="noidung_tinTuc" rows="3"  style="height: 78px;"  placeholder="Nhập nội dung tin tức"></textarea>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="prodName">Tên tiêu đề</label>
                        <input type="text" class="form-control" name="tieude" placeholder="Nhập tên tiêu đề">
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="prodImg">Ảnh tin tức</label>
                        <div class="custom-file">
                            <input type="file" name="img_path" class="custom-file-input" id="exampleInputFile">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <button type="submit" name="list" class="btn btn-primary" onclick="goToList()">Danh sách</button>
                        <button type="submit" name="themtt" class="btn btn-primary">Thêm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function goToList(params) {
            event.preventDefault();
            window.location.href = "index.php?act=tintuc";
        }
    </script>

</body>