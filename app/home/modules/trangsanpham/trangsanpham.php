<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item" style="height: 500px;border: 0.5px solid gray;padding: 15px;">
                        <h4>Danh mục</h4>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM `danhmuc` LIMIT 10";
                            $data = pdo_query($sql);
                            foreach ($data as $key) {
                                extract($key);
                                echo '<li><a style="font-weight: bold;border-bottom: 0.5px solid gray;" href="index.php?act=listSPbyDM&id_danhmuc=' . $id_danhmuc . '">' . $tendanhmuc . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Lọc theo giá</h4>
                        <input type="number" min="7000000" step="1000000" class="form-control rounded mb-1 min" placeholder="Giá thấp nhất bạn có thể trả">
                        <input type="number" min="17000000" step="1000000" class="form-control rounded mb-1 max" placeholder="Giá cao nhất bạn có thể trả">
                        <button class="btn btn-primary" onclick="ajaxFilter(document.querySelector('.form-control.rounded.mb-1.min').value, document.querySelector('.form-control.rounded.mb-1.max').value)">Lọc</button>
                    <div class="sidebar__item">
                        <h4>Lọc theo giá</h4>
                        <input type="number" min="7000000" step="1000000" class="form-control rounded mb-1 min" placeholder="Giá thấp nhất bạn có thể trả">
                        <input type="number" min="17000000" step="1000000" class="form-control rounded mb-1 max" placeholder="Giá cao nhất bạn có thể trả">
                        <button class="btn btn-primary" onclick="ajaxFilter(document.querySelector('.form-control.rounded.mb-1.min').value, document.querySelector('.form-control.rounded.mb-1.max').value)">Lọc</button>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Bạn thích màu nào ?</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                Trắng
                                <input type="radio" id="white" value="Trắng" onclick="ajaxColor(this.value)">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Đen
                                <input type="radio" id="black" value="Đen" onclick="ajaxColor(this.value)">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                All !
                                <input type="radio" id="green" value="Tất cả !" onclick="ajaxColor(this.value)">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Nhu cầu Ram/Bộ nhớ của bạn ?</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                256gb/8gb
                                <input type="radio" id="large" onclick="ajaxOption(8, 256)">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                512/16gb
                                <input type="radio" id="medium" onclick="ajaxOption(16, 512)">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                All !
                                <input type="radio" id="small" onclick="ajaxOption(0, 0)">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    $sql = "SELECT * FROM `sanpham` LIMIT 5";
                                    $data = pdo_query($sql);
                                    foreach ($data as $key) {
                                        extract($key);
                                        echo '
                                            <a href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '&id_danhmuc=' . $id_danhmuc . '" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="app/admin/uploads/' . $img_path . '" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>' . $tenSanPham . '</h6>
                                                    <span style="color: red;">' . number_format($giaSanPham, 0, ',', '.') . ' ₫</span>
                                                </div>
                                            </a>
                                        ';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Top sản phẩm</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php
                            $sql = "SELECT * FROM `sanpham` ORDER BY views DESC LIMIT 5";
                            showTopViewsProd($sql);
                            $sql = "SELECT * FROM `sanpham` LIMIT 8";
                            showUuDai($sql);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p o v p o v">
                    <?php
                    if (isset($_GET["act"]) && $_GET["act"] == "listSPbyDM") {
                        $id_danhmuc = $_GET["id_danhmuc"];
                        $sql = "SELECT * FROM `sanpham` WHERE `id_danhmuc` = '$id_danhmuc' LIMIT 15";
                        showSanPham($sql);
                    } else if ($_GET["act"] == 'hotSearch') {
                        $sql = "SELECT * FROM `sanpham` WHERE `id_danhmuc` = '$id_danhmuc' LIMIT 15";
                        showSanPham($sql);
                    } else if ($_GET["act"] == 'hotSearch') {
                        $hotSearch = $_POST["hotSearchData"];
                        $sql = "SELECT * FROM `sanpham` WHERE `tenSanPham` Like '%$hotSearch%' LIMIT 15";
                        showSanPham($sql);
                    } else {
                        $sql = "SELECT * FROM `sanpham` LIMIT 15";
                        showSanPham($sql);
                        $sql = "SELECT * FROM `sanpham` WHERE `tenSanPham` Like '%$hotSearch%' LIMIT 15";
                        showSanPham($sql);
                    } else {
                        $sql = "SELECT * FROM `sanpham` LIMIT 15";
                        showSanPham($sql);
                    }
                    ?>
                </div>
                <div class="product__pagination" style="display: none;">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>


</section>
<!-- Product Section End -->