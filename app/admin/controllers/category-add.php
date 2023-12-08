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

                <form action="index.php?act=themdanhmuc" method="post" enctype="multipart/form-data">
                    <h3 class="title-page">
                        Thêm danh mục
                    </h3>
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control" name="categoryName" id="name" placeholder="Nhập tên danh mục">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="prodImg">Ảnh banner</label>
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
    <script>
        function goToList(params) {
            event.preventDefault();
            window.location.href = "index.php?act=danhmuc";
        }
    </script>

</body>

</html>