<!-- Page Preloder -->


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="app/home/public/img/banner/banner15.jpg" style="height:200px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Blog</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Thương hiệu</h4>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM `danhmuc`";
                            $data = pdo_query($sql);
                            foreach ($data as $rows) {
                                extract($rows);
                                echo '<li><a href="index.php?act=listSPbyDM&id_danhmuc=' . $id_danhmuc . '">' . $tendanhmuc . '</a></li>';
                            }
                            ?>
                        </ul>

                    </div>
                    
                    <div class="blog__sidebar__item">
                        <h4>Sản phẩm mới</h4>

                        <?php
                        $sql = "SELECT * FROM `sanpham` LIMIT 10";
                        $data = pdo_query($sql);
                        foreach ($data as $key) {
                            extract($key);
                            echo '
                                                <div class="blog__sidebar__item__tags">
                                                    <a href="index.php?act=trangsanpham">' . $tenSanPham . '</a>
                                                </div>
                                        ';
                        }
                        ?>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Bài viết mới nhất</h4>

                        <?php
                        $sql = "select * from tintuc ";
                        $data = pdo_query($sql);
                        foreach ($data as $rows) {
                            extract($rows);
                            echo '               
					

                    
                        <div class="blog__sidebar__recent">
                            <a href="index.php" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="app/admin/uploads/' . $img_path . '" alt="" width="80px" >
                                 
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>' . $tieude . '</h6>
                                    <span><i class="fa fa-calendar-o"></i>' . $ngaydang_tinTuc . '</span>
                                </div>
                            </a>
                            <br>
                        </div>
              
               
               	        ';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">






                    <?php
                    $sql = "select * from tintuc ";
                    $data = pdo_query($sql);
                    foreach ($data as $rows) {
                        extract($rows);
                        echo '               
					

                    <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="app/admin/uploads/' . $img_path . '" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>' . $ngaydang_tinTuc . '</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">' . $id_tinTuc . '</a></h5>
                            <p>' . $noidung_tinTuc . '</p>
                            <a href="index.php" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
               
               	';
                    }
                    ?>

                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->