<div id="users">
    <div style="background-color: brown !important;" class="colums">
        <div class="username">Tên người dùng</div>
        <div class="password">Mật khẩu</div>
        <div class="power">Quyền</div>
        <div class="change">Thao tác</div>
    </div>
    <?php



   




    $sql = "SELECT `username`, `password`, `power` FROM `users`";
    try {
        include "models/pdo.php";
        $result = $conn->query($sql);
        if ($result->num_rows != 0) {
            while ($rows = $result->fetch_assoc()) {
                echo '<div class="rows">
                    <div class="username">' . $rows["username"] . '</div>
                    <div class="password">' . $rows["password"] . '</div>
                    <div class="power">' . $rows["power"] . '</div>
                    <div class="change">
                        <form action="index.php?act=userChange&name=' . $rows["username"] . '" method="post">
                            <input type="submit" value="Sửa">
                        </form>
                        <form action="index.php?act=userDel&name=' . $rows["username"] . '" method="post">
                            <input type="submit" value="Xoá ">
                        </form>
                    </div>
                </div>';
            }
        } else {
            echo "Trống !";
        }
    } catch (\mysqli_sql_exception $th) {
        echo $th->getMessage();
    }
    ?>
</div>