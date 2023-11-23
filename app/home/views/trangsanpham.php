<!-- Breadcrumb Section Begin -->
<section style="display: none;" class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

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
                                echo '<li><a href="index.php?act=listSPbyDM&id_danhmuc=' . $id_danhmuc . '">' . $tendanhmuc . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Chức năng đang ẩn (chưa cần tới) -->
                    <div class="sidebar__item" style="display:none;">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option" style="display:none;">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item" style="display:none;">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Large
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                    <!-- Chức năng đang ẩn (chưa cần tới) -->
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    $sql = "SELECT * FROM `sanpham` LIMIT 8";
                                    $data = pdo_query($sql);
                                    foreach ($data as $key) {
                                        extract($key);
                                        echo '
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="app/admin/uploads/' . $img_path . '" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>' . $tenSanPham . '</h6>
                                                    <span>' . $giaSanPham . '</span>
                                                </div>
                                            </a>
                                        ';
                                    }
                                    ?>
                                </div>
                                <!-- <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Ưu đãi</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php
                            $sql = "SELECT * FROM `sanpham` LIMIT 7";
                            $data = pdo_query($sql);
                            foreach ($data as $key) {
                                extract($key);
                                echo '
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '">
                                                <div class="product__discount__percent">-20%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>' . $tendanhmuc . '</span>
                                                <h5><a href="#">' . $tenSanPham . '</a></h5>
                                                <div class="product__item__price">$30.00 <span>' . $giaSanPham . '</span></div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
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
                <div class="row">
                    <?php
                    if (isset($_GET["act"]) && $_GET["act"] == "listSPbyDM") {
                        $id_danhmuc = $_GET["id_danhmuc"];
                        $sql = "SELECT * FROM `sanpham` WHERE `id_danhmuc` = '$id_danhmuc' LIMIT 6";
                        $data = pdo_query($sql);
                        foreach ($data as $rows) {
                            extract($rows);
                            echo ' 
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">' . $tenSanPham . '</a></h6>
                                <h5>' . $giaSanPham . '</h5>
                            </div>
                            
                            </div>
                            </div>       
                        ';
                        }
                    } else {
                        $hotSearch = $_POST["hotSearchData"];
                        $sql = "SELECT * FROM `sanpham` WHERE `tenSanPham` Like '%$hotSearch%' LIMIT 6";
                        $data = pdo_query($sql);
                        foreach ($data as $rows) {
                            extract($rows);
                            echo ' 
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">' . $tenSanPham . '</a></h6>
                                <h5>' . $giaSanPham . '</h5>
                            </div>
                            
                            </div>
                            </div>       
                        ';
                        }
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