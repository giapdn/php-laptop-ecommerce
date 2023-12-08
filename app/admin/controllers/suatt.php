<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form action="index.php?act=suatintuc&id=<?php  gettt() ?>" method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Sửa tin tức
                    </h3>
                    <label>ID tin tức </label><br>
                    <input type="text" name="id_tinTuc" class="btn btn-primary" readonly value="<?php  gettt() ?>"> <br> <br>

                    <label>Nội dung tin tức</label>
                    <textarea class="form-control" name="noidung_tinTuc" rows="3" value="<?php echo getnoidung() ?>" style="height: 78px;"></textarea>
                    <br><br>

                    <label>Tên tiêu đề</label><br>
                    <input type="text" name="tieude" class="form-control"  value="<?php  gettieude() ?>"> <br> <br>

                    <label for="prodImg">Ảnh tin tức</label>
                    <input type="file" name="img_path" class="custom-file-input" id="exampleInputFile">
                    <br><br>

                    <input type="submit" name="list" class="btn btn-primary" value="Quay lại" onclick="goToList()">
                    <input type="submit" name="suatintuc" class="btn btn-primary" value="Sửa">
                </form>
            </div>

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


</body>

</html>