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


                <form action="index.php?act=suadonhang&id=<?php echo getid_donhang()?>" method="post">
                    <h3 class="title-page">
                        Sửa đơn hàng
                    </h3>
                    <label >Mã dơn hàng </label><br>
                    <input type="text" name="id_donHang" class="btn btn-primary" readonly value="<?php echo getid_donhang() ?>"> <br> <br>
                    
                    <label >Trạng thái</label>
                    <select name="trangThai" class="form-control">
                        <option value="completed">completed</option>
                        <option value="pending">pending</option>
                        <option value="shipped">shipped</option>
                        <option value="completed">completed</option>
                        <option value="cancelled">cancelled</option>
                    </select>
                    <br><br>
                    
                    <input type="submit" name="list" class="btn btn-primary" value="Danh sách" onclick="goToList()">
                    <input type="submit" name="sdonhang" class="btn btn-primary" value="Sửa">
                </form>
            </div>

            <script>
                function goToList(params) {
                    event.preventDefault();
                    window.location.href = "index.php?act=cart";
                }
            </script>

            <?php
                function getid_donhang(){
                    if (isset($_GET["act"]) && $_GET["act"] == "suadonhang"){
                        if(isset($_GET["id"])){
                            $id = $_GET["id"];
                            return $id;
                        }
                    }
                }

            ?>


        </div>
    </div>
    </div>


</body>

</html>


