<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sanpham = $_POST['id_sp'];
    $sl = $_POST['sl'];
    $id = $_SESSION["username"];
    $sql = "UPDATE giohang SET soluong = '$sl' WHERE id_sanPham = '$id_sanpham' AND userName = '$id'";
    include "../models/pdo.php";
    pdo_execute($sql);
    $sql = "SELECT giohang.*, sanpham.*
        FROM giohang
        JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
        WHERE giohang.userName = '$id';
    ";
    $data = pdo_query($sql);
    if (empty($data)) {
        // echo '<script>alert("Giỏ hàng của bạn đang trống !")</script>';
    } else {
        foreach ($data as $rows) {
            extract($rows);
            echo '
                <tr>
                    <td class="shoping__cart__item">
                        <img src="app/admin/uploads/' . $img_path . '" style="height: 200px;width: auto;">
                        <h5>' . $tenSanPham . '</h5>
                    </td>
                    <td class="shoping__cart__price"">' . number_format($giaSanPham, 0, ',', '.') . ' ₫</td>                                            
                    <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <input style="width: 30px;border: 0px;" type="number" min="1" step="1" value="' . $soluong . '" id="soluong" oninput="changeSL(' . $id_sanPham . ')">                                                                   
                    </div>
                    </td>
                    <td class="shoping__cart__total"><div style="background-color: yellow;"><span style="color: red;">' . number_format($giaSanPham * $soluong, 0, ',', '.') . ' ₫</span></div></td>                                                                              
                    <td class="shoping__cart__item__close">
                        <a href="index.php?act=delFromCart&id_sanpham=' . $id_sanPham . '"><span class="icon_close"></span></a>                           
                    </td>
                </tr>
        ';
        }
    }

    // Send a response (you can customize this based on your needs)
    // echo json_encode(['status' => 'success', 'message' => 'Quantity updated successfully']);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
<script>
    var input = document.getElementById("soluong");

    function changeSL(id) {
        $.ajax({
            url: 'app/home/modules/giohang/process.php',
            type: 'POST',
            data: {
                id_sp: id,
                sl: input.value
            },
            success: function(response) {
                console.log("ok");
                $('#cart').html(response);
                $.ajax({
                    url: 'app/home/modules/giohang/total.php',
                    type: 'POST',
                    success: function(params) {
                        $('#g').html(params);
                    }
                });
            },
            error: function(error) {
                console.error('Lỗi yêu cầu:', error);
            }
        });
    }
</script>