<body style="background-color: white;">
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
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>