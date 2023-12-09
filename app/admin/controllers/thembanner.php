<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">

                <form action="index.php?act=thembn" method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Thêm banner
                    </h3>

                    <div class="form-group">
                        <label for="prodImg">Ảnh banner</label>
                        <div class="custom-file">
                            <input type="file" name="img_path" class="custom-file-input" id="exampleInputFile">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">

                        <button type="submit" name="list" class="btn btn-primary" onclick="goToList()">Danh sách</button>
                        <button type="submit" name="them" class="btn btn-primary">Thêm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
<script>
    function goToList(params) {
        event.preventDefault();
        window.location.href = "index.php?act=banner";
    }
</script>