<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form action="index.php?act=userChangeProcess&id=<?php getuser(); ?>" method="post">
                    <h3 class="title-page">
                        Sửa quyền đăng nhập
                    </h3>
                    <label>Tên đăng nhập</label><br>
                    <input type="text" name="userName" class="btn btn-primary" readonly value="<?php getuser(); ?>"> <br> <br>
                    <label>Quyền</label>
                    <select name="quyenHan" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <br><br>
                    <input type="submit" name="list" class="btn btn-primary" value="Danh sách" onclick="goToList()">
                    <input type="submit" name="userChange" class="btn btn-primary" value="Sửa">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function goToList(params) {
        event.preventDefault();
        window.location.href = "index.php?act=quanlythanhvien";
    }
</script>
<?php
function getuser()
{
    if (isset($_GET["act"]) && $_GET["act"] == "userChange") {
        if (isset($_GET["id"])) {
            echo $_GET["id"];
        } else {
            echo "!!!";
        }
    };
}
?>
</div>
</div>