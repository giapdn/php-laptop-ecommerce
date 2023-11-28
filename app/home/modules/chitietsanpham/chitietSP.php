  <!-- Breadcrumb Section Begin -->
  <!-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
  <!-- Breadcrumb Section End -->


  <!-- Product Details Section Begin -->
  <section class="product-details spad">
  	<div class="container">
  		<div class="row">
  			<?php
				$id = $_GET["idsp"];
				$sql = "SELECT * FROM `sanpham` where id_sanPham = '$id'";
				$data = pdo_query_one($sql);
				extract($data);
				echo ' 
            		<div class="col-lg-6 col-md-6">
						<div class="product__details__pic">
							<div class="product__details__pic__item">
								<img class="product__details__pic__item--large"
									src="app/admin/uploads/' . $img_path . '" alt="">
							</div>
							<div class="product__details__pic__slider owl-carousel">
								<img data-imgbigurl="app/home/public/img/danhmuc/images.png"
									src="app/home/public/img/danhmuc/images.png" alt="">
								<img data-imgbigurl="app/home/public/img/danhmuc/images.png"
									src="app/home/public/img/danhmuc/images.png" alt="">
								<img data-imgbigurl="app/home/public/img/danhmuc/images.png"
									src="app/home/public/img/danhmuc/images.png" alt="">
								<img data-imgbigurl="app/home/public/img/danhmuc/images.png"
									src="app/home/public/img/danhmuc/images.png" alt="">
							</div>
						</div>
       				</div>
					<div class="col-lg-6 col-md-6">
						<div class="product__details__text">
							<h3>' . $tenSanPham . '</h3>
							<div class="product__details__rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<span>(18 reviews)</span>
							</div>
							<div class="product__details__price">' . number_format($giaSanPham, 0, ',', '.') . ' Vnđ</div>
							<p>' . $moTaSanPham . '</p>
							<div class="product__details__quantity">
								<div class="quantity">
									<div class="pro-qty">
										<input type="text" value="1">
									</div>
								</div>
							</div>
							<a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '" class="primary-btn">Thêm vào giỏ hàng</a>
							<a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
							<ul>
								<li><b>Số lượng</b> <span>' . $soLuong . '</span></li>
								<li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
								<li><b>Weight</b> <span>0.5 kg</span></li>
								<li><b>Share on</b>
									<div class="share">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-instagram"></i></a>
										<a href="#"><i class="fa fa-pinterest"></i></a>
									</div>
								</li>
							</ul>
						</div>
					</div>
                ';
				?>
  			<div class="col-lg-12">
  				<div class="product__details__tab">
  					<ul class="nav nav-tabs" role="tablist">
  						<li class="nav-item">
  							<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Bình luận</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>(1)</span></a>
  						</li>
  					</ul>
  					<div class="tab-content">
  						<div class="tab-pane active" id="tabs-1" role="tabpanel">
  							<?php
								$id = $_GET["idsp"];
								$sql = "SELECT * FROM `binhluan` where id_sanPham = '$id'";
								$data = pdo_query($sql);
								foreach ($data as $rows) {
									extract($rows);
									echo '
										<div class="product__details__tab__desc ff">
											<h6>' . $userName . '</h6>
											<p>' . $ngay_binhLuan . '</p>
											<p>' . $noidung_binhLuan . '</p>
										</div>
									';
								}
								?>
  							<div class="hero__search__form">
  								<?php
									if (isset($_SESSION["username"])) {
										echo '
										<form action="app/home/modules/chitietsanpham/main.php" method="post">
											<input type="hidden" value="' . $id . '" name="id_sp">
											<input type="text" name="hotSearchData" placeholder="Ý kiến của bạn về sản phaarm" style="background-color: #dfdfdf;">
											<button type="submit" class="site-btn">Gửi bình luận</button>
										</form>
									';
									} else {
										echo 'Đăng nhập để có thể bình luận !';
									}
									?>
  							</div>
  						</div>
  						<div class="tab-pane" id="tabs-2" role="tabpanel">
  							<div class="product__details__tab__desc">
  								<h6>Products Infomation</h6>
  								<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
  									Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
  								</p>
  								<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
  									ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
  									elit,
  								</p>
  							</div>
  						</div>
  						<div class="tab-pane" id="tabs-3" role="tabpanel">
  							<div class="product__details__tab__desc">
  								<h6>Products Infomation</h6>
  								<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
  									Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
  									Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
  								</p>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  </section>
  <!-- Product Details Section End -->

  <!-- Related Product Section Begin -->
  <section class="related-product">
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-12">
  				<div class="section-title related__product__title">
  					<h2>Có thể bạn cũng thích</h2>
  				</div>
  			</div>
  		</div>
  		<div class="row">
  			<?php
				$id_danhmuc = $_GET["id_danhmuc"];
				$sql = "SELECT * FROM `sanpham` WHERE `id_danhmuc` = '$id_danhmuc' LIMIT 8";
				$data = pdo_query($sql);
				foreach ($data as $key) {
					extract($key);
					echo '
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="product__item">
								<div class="product__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '">
									<ul class="product__item__pic__hover">
										<li><a href="#"><i class="fa fa-heart"></i></a></li>
										<li><a href="#"><i class="fa fa-retweet"></i></a></li>
										<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="product__item__text">
									<h6><a href="#">' . $tenSanPham . '</a></h6>
									<h5>' . number_format($giaSanPham, 0, ',', '.') . '</h5>
								</div>
							</div>
						</div>
					';
				}
				?>
  		</div>
  	</div>
  </section>
  <!-- Related Product Section End -->