<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->
    <!-- <title>Document</title>
</head>

<body> -->
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    Khách hàng
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <?php
                    $sql = "SELECT * FROM `users`";
                    $result = pdo_query($sql);
                    foreach ($result as $a) {
                        echo '
                        <tbody>
                            <tr>
                                <td>' . $a["userName"] . '</td>
                                <td>' . $a["password"] . '</td>
                                <td>' . $a["sdt"] . '</td>
                                <td>' . $a["name"] . '</td>
                                <td>' . $a["email"] . '</td>
                                <td>' . $a["author"] . '</td>
                                <td>
                                <div class="ok" style="display: flex; " >
                                    <form action="index.php?act=userChange&id=' . $a["userName"] . '" method="post" style="margin-right: 10px; display: flex">
                                        <div class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square" ></i>
                                            <input type="submit" class="btn btn-warning" value="Sửa">
                                        </div>
                                    </form>
                                    <form action="index.php?act=userDel&name=' . $a["userName"] . '" method="post">
                                        <div class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>    
                                            <input name="xoauser" type="submit" class="btn btn-danger" value="Xoá ">
                                        </div>        
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>