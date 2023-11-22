<div id="users">
    <div style="background-color: brown !important;" class="colums">
        <div class="userName">Tên đăng nhập</div>
        <div class="password">Mật khẩu</div>
        <div class="sdt">số điện thoại</div>
        <div class="name">tên người dùng</div>
        <div class="email">Email</div>
        <div class="quyenHan">Quyền</div>
        <div class="change">Thao tác</div>
    </div>
<?php
$sql = "SELECT * FROM `users`";
$result = pdo_query($sql);
foreach ($result as $a){
    echo '<div class="rows">
            <div class="userName">' . $a["userName"] . '</div>
            <div class="password">' . $a["password"] . '</div>
            <div class="sdt">' . $a["sdt"] . '</div>
            <div class="name">' . $a["name"] . '</div>
            <div class="email">' . $a["email"] . '</div>
            <div class="quyenHan">' . $a["quyenHan"] . '</div>
            <div class="change">
                <form action="index.php?act=userChange&name=' . $a["userName"] . '" method="post">
                    <input type="submit" value="Sửa">
                </form>
                <form action="index.php?act=userDel&name=' . $a["userName"] . '" method="post">
                    <input name="xoauser" type="submit"  value="Xoá ">
                </form>
            </div>
        </div>';
}  
?>
</div>