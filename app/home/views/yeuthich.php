<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Thêm vào giỏ hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            if (isset($_SESSION["username"])) {
                                $username = $_SESSION["username"];
                                $sql = "SELECT yeuthich.*, sanpham.*
                                FROM yeuthich
                                JOIN sanpham ON yeuthich.id_sanPham = sanpham.id_sanPham
                                WHERE yeuthich.userName = '$username';
                                ";
                                $data = pdo_query($sql);
                                if (empty($data)) {
                                    echo '
                                        <tr>
                                            <td>
                                                <h5>Bạn chưa thêm sản phẩm nào vào mục yêu thích !</h5>
                                            </td>
                                        </tr>
                                    ';
                                    echo '
                                        <tr>
                                            <td>
                                                <h5>Bạn chưa thêm sản phẩm nào vào mục yêu thích !</h5>
                                            </td>
                                        </tr>
                                    ';
                                } else {
                                    foreach ($data as $rows) {
                                        extract($rows);
                                        echo '
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="app/admin/uploads/' . $img_path . '" style="height: 200px;width: auto;">
                                                <h5>' . $tenSanPham . '</h5>
                                            </td>
                                            <td class="shoping__cart__price"" style="color: red;">' . number_format($giaSanPham, 0, ',', '.') . ' ₫</td>                                            
                                           
                                            <td class="shoping__cart__item__quantity">
                                            <a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '" class="aa"><i class="fas fa-check-circle"></i></a>
                                            
                                            <td class="shoping__cart__item__close">
                                            <a href="index.php?act=delyeuthich&id_sanPham=' . $id_sanPham . '" class="jj"><i class="fas fa-times-circle"></i></a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }
                            }
                            ?>
                        </tbody>
                        <!-- <div class="pro-qty">
                            <input min="1" step="1" data-id-sp=' . $id_sanPham . ' value="' . $soluong . '" class="quantity-input" id="x">
                        </div> -->
                    </table>

                </div>
            </div>
        </div>


    </div>
</section>
<!-- Shoping Cart Section End -->
<style>
    a.jj:hover {
        color: red;
        font-size: 30px;

    }

    a.jj {
        color: #7fad39;
    }

    a.aa:hover {
        color: blue;
        font-size: 30px;

    }

    a.aa {
        color: #7fad39;
    }
</style>