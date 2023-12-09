<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form action="index.php?act=suatintuc&id=<?php gettt() ?>" method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Sửa tin tức
                    </h3>
                    <label>ID tin tức </label><br>
                    <input type="text" name="id_tinTuc" class="btn btn-primary" readonly value="<?php gettt() ?>"> <br> <br>

                    <label>Nội dung tin tức</label>
                    <textarea class="form-control" name="noidung_tinTuc" rows="3" value="<?php echo getnoidung() ?>" style="height: 78px;"></textarea>
                    <br><br>

                    <label>Tên tiêu đề</label><br>
                    <input type="text" name="tieude" class="form-control" value="<?php gettieude() ?>"> <br> <br>

                    <label for="prodImg">Ảnh tin tức</label>
                    <input type="file" name="img_path" class="custom-file-input" id="exampleInputFile">
                    <br><br>

                    <input type="submit" name="list" class="btn btn-primary" value="Quay lại" onclick="goToList()">
                    <input type="submit" name="suatintuc" class="btn btn-primary" value="Sửa">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function goToList(params) {
        event.preventDefault();
        window.location.href = "index.php?act=tintuc";
    }
</script>

<?php
function gettt()
{
    if (isset($_GET["act"]) && $_GET["act"] == "suatt") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            echo $id;
        }
    }
}

function getnoidung()
{
    $id = gettt();
    $sql = "SELECT * FROM `tintuc` WHERE `id_tinTuc` = '$id'";
    $data = pdo_query_one($sql);
    return $data["noidung_tinTuc"];
}

function gettieude()
{
    $id = gettt();
    $sql = "SELECT * FROM `tintuc` WHERE `id_tinTuc` = '$id'";
    $data = pdo_query_one($sql);
    return $data["tieude"];
}
?>
</div>
</div>
</div>