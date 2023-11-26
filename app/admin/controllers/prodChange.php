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
                <h3 class="title-page">
                    Thêm sản phẩm
                </h3>

                <form class="addPro" action="index.php?act=prodChangeProcess&id=<?php echo getID() ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="prodID">Mã sản phẩm:</label>
                        <input type="text" class="form-control" name="prodID" readonly value="<?php echo getID(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="prodName">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="prodName" value="<?php echo getProdName() ?>">
                    </div>

                    <div class="form-group">
                        <label for="prodPrice">Giá </label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="prodPrice" class="form-control" value="<?php echo getProdPrice() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="prodDesc" rows="3" value="<?php echo getProdDesc() ?>" style="height: 78px;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="prodImg">Ảnh sản phẩm</label>
                        <div class="custom-file">
                            <input type="file" name="prodImg" class="custom-file-input" id="exampleInputFile">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="productCategory">Danh mục:</label>
                        <select class="form-select" name="productCategory" aria-label="Default select example">
                            <?php getDanhMuc(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="prod-list" class="btn btn-primary" value="Danh sách" onclick="goToProdList()">
                        <input type="submit" name="prod-data-change" class="btn btn-primary" value="Sửa">
                    </div>
                </form>
            </div>

            <?php
            function getID()
            {
                if (isset($_GET["act"]) && $_GET["act"] == "prodChange") {
                    if (isset($_GET["prodID"])) {
                        $id = $_GET["prodID"];
                        return $id;
                    }
                }
            }
            function getProdName()
            {
                $id = getID();
                $sql = "SELECT * FROM `sanpham` WHERE `id_sanPham` = '$id'";
                $data = pdo_query_one($sql);
                return $data["tenSanPham"];
            }
            function getProdPrice()
            {
                $id = getID();
                $sql = "SELECT * FROM `sanpham` WHERE `id_sanPham` = '$id'";
                $data = pdo_query_one($sql);
                return $data["giaSanPham"];
            }
            function getProdDesc()
            {
                $id = getID();
                $sql = "SELECT * FROM `sanpham` WHERE `id_sanPham` = '$id'";
                $data = pdo_query_one($sql);
                if ($data["moTaSanPham"] == "") {
                    return "Chưa có mô tả";
                } else {
                    return $data["moTaSanPham"];
                }
            }
            function getDanhMuc()
            {
                $sql = "SELECT * FROM `danhmuc`";
                $data = pdo_query($sql);
                foreach ($data as $rows) {
                    echo '<option value="' . $rows["id_danhmuc"] . '">' . $rows["tendanhmuc"] . '</option> ';
                }
            }
            ?>

            <script>
                function goToProdList() {
                    event.preventDefault();
                    window.location.href = "index.php?act=quanlysp";
                }
            </script>
</body>

</html>
