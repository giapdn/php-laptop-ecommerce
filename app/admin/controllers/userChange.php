<div id="userChange" style="background-color: purple;">
    <form action="../admin/models/userChange_process.php?x=<?php echo $_GET["name"]?>" method="post" style="background-color: purple;">
        <label for="categoryID">Tên người dùng </label>
        <input type="text" name="username" style="background-color: greenyellow;" readonly value="<?php getName();?>"> <br> <br>
        <label for="categoryName">Mật khẩu</label>
        <input type="text" name="password" style="background-color: greenyellow;" readonly value="<?php getPassword(); ?>"> <br> <br>
        <label for="categoryName">Quyền </label>
        <input type="text" name="power" placeholder="<?php getPower();?>"> <br> <br>


        <input type="submit" name="list" value="Danh sách" onclick="goToLi();">
        <input type="submit" name="powerChange" value="Sửa">
    </form>
</div>
<script>
    function goToLi(params) {
        event.preventDefault();
        window.location.href="index.php?act=customers";
    }
</script>
<?php
function getName()
{
    if (isset($_GET["act"]) && $_GET["act"] == "userChange") {
        if (isset($_GET["name"])) {
            echo $_GET["name"];
        }
        else {
            echo "!!!";
        }
    };
}
function getPassword()
{
    if (isset($_GET["act"]) && $_GET["act"] == "userChange") {
        if (isset($_GET["name"])) {
            $name = $_GET["name"];
            $sql = "SELECT `password` FROM `users` WHERE `username` = '$name' LIMIT 1";
            include "models/database.php";
            $data = $conn->query($sql);
            while ($rows = $data->fetch_assoc()) {
                echo $rows["password"];
            }
        }
        else {
            echo "!!!";
        }
    };
}
function getPower()
{
    if (isset($_GET["act"]) && $_GET["act"] == "userChange") {
        if (isset($_GET["name"])) {
            $name = $_GET["name"];
            $sql = "SELECT `power` FROM `users` WHERE `username` = '$name' LIMIT 1";
            include "models/database.php";
            $data = $conn->query($sql);
            while ($rows = $data->fetch_assoc()) {
                echo $rows["power"];
            }
        }
        else {
            echo "!!!";
        }
    };
}
?>