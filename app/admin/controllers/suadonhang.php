<body style="background-color: white;">
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <form action="index.php?act=suadonhang&id=<?php echo getid_donhang() ?>" method="post">
                    <h3 class="title-page">
                        Sửa đơn hàng
                    </h3>
                    <label>Mã dơn hàng </label><br>
                    <input type="text" name="id_donHang" class="btn btn-primary" readonly value="<?php echo getid_donhang() ?>"> <br> <br>

                    <label>Trạng thái</label>
                    <select name="trangThai" class="form-control">
                        <option value="<?php echo x() ?>"><?php echo x() ?></option>
                        <option value="shipping">shiping</option>
                        <option value="success">success</option>
                        <option value="canceled">canceled</option>
                        <option value="<?php echo x() ?>"><?php echo x() ?></option>
                        <option value="shipping">shiping</option>
                        <option value="success">success</option>
                        <option value="canceled">canceled</option>
                    </select>
                    <br><br>
                    <input type="submit" name="list" class="btn btn-primary" value="Danh sách" onclick="goToList()">
                    <input type="submit" name="sdonhang" class="btn btn-primary" value="Sửa">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function goToList(params) {
        event.preventDefault();
        window.location.href = "index.php?act=cart";
    }
</script>

<?php
function getid_donhang()
{
    if (isset($_GET["act"]) && $_GET["act"] == "suadonhang") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            return $id;
        }
    }
}

function x()
{
    if (isset($_GET["act"]) && $_GET["act"] == "suadonhang") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT trangThai FROM donhang WHERE id_donHang = '$id'";

            $data = pdo_query_one($sql);
            return $data["trangThai"];
        }
    }
}
?>
</div>
</div>