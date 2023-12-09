 

<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form action="index.php?act=suabn&id=<?php  gettt() ?>" method="post"enctype="multipart/form-data">
                    <h3 class="title-page">
                        Sửa banner
                    </h3>
                    <label>ID banner </label><br>
                    <input type="text" name="id_tinTuc" class="btn btn-primary" readonly value="<?php  gettt() ?>"> <br> <br>

                    <label for="prodImg">Ảnh tin tức</label>
                    <input type="file" name="img_path" class="custom-file-input" id="exampleInputFile">
                    <br><br>

                    <input type="submit" name="list" class="btn btn-primary" value="Quay lại" onclick="goToList()">
                    <input type="submit" name="suabn" class="btn btn-primary" value="Sửa">
                </form>
            </div>

            <script>
                function goToList(params) {
                    event.preventDefault();
                    window.location.href = "index.php?act=banner";
                }
            </script>

            <?php
            function gettt()
            {
                if (isset($_GET["act"]) && $_GET["act"] == "sua") {
                    if (isset($_GET["id"])) {
                        $id = $_GET["id"];
                        echo $id;
                    }
                }
            }

            ?>
        </div>
    </div>
    </div>


</body>