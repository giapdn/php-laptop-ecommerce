<section class="breadcrumb-section set-bg" data-setbg="app/home/img/hero/istockphoto-1180178312-170667a.jpg">
	<div class="container">
		<div class="row">
			<div class="hero__item set-bg">
				<div class="hero__text">
					<span>SẢN PHẨM CÔNG NGHỆ</span>
					<h2>Laptop <br />100% Chính hãng</h2>
					<p>Miễn phí giao hàng toàn quốc</p>
					<a href="#" class="primary-btn">MUA NGAY</a>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<br>
<!-- Categories Section Begin -->
<section class="categories">
	<div class="container">
		<div class="row">
			<div class="categories__slider owl-carousel">
				<?php
				$sql = "SELECT * FROM `danhmuc` LIMIT 7";
				$data = pdo_query($sql);
				foreach ($data as $key) {
					extract($key);
					echo '<div class="col-lg-3">
						<div class="categories__item set-bg" data-setbg="app/admin/uploads/' . $img_danhmuc . '">
							<h5><a href="#">' . $tendanhmuc . '</a></h5>
						</div>
					</div>';
				}
				$data
				?>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Sản phẩm của chúng tôi</h2>
				</div>
				<div class="featured__controls">
					<ul>
						<li class="active" data-filter="*">Tất cả</li>
						<li data-filter=".oranges">Oranges</li>
						<li data-filter=".fresh-meat">Fresh Meat</li>
						<li data-filter=".vegetables">Vegetables</li>
						<li data-filter=".fastfood">Fastfood</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row featured__filter">
			<?php
			$sql = "SELECT * FROM `sanpham` order by id_sanpham desc limit 8";
			$data = pdo_query($sql);
			foreach ($data as $rows) {
				extract($rows);
				$img = "index.php?act=chitietsanpham&idsp=" . $id_sanPham;
				echo ' 
					<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
						<div class="featured__item">
							<div class="featured__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '">
								<ul class="featured__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="index.php?act=giohang"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="featured__item__text">
								<h6><a href="' . $img . '">' . $tenSanPham . '</a></h6>
								<h5>' . $giaSanPham . '</h5>
							</div>
						</div>
					</div> 
                	';
			}
			?>
		</div>
	</div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="banner__pic">
					<img src="app/home/img/hero/detailed-laptop-rotated-position-mockup-gradient-banner-template-vector-illustration_541075-615.avif" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="banner__pic">
					<img src="app/home/img/hero/laptops-prime.webp" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Top Lượt Xem</h4>
					<div class="latest-product__slider owl-carousel">
						<div class="latest-prdouct__slider__item">
							<?php
							$sql = "SELECT * FROM `sanpham`where 1 order by views desc limit 0,3";
							$data = pdo_query($sql);
							foreach ($data as $rows) {
								extract($rows);
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
						<div class="latest-prdouct__slider__item">
							<?php
							$sql = "SELECT * FROM `sanpham` ORDER BY views DESC LIMIT 3 OFFSET 3";
							$data = pdo_query($sql);
							foreach ($data as $rows) {
								extract($rows);
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
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>SẢN PHẨM MỚI NHẤT</h4>
					<div class="latest-product__slider owl-carousel">
						<div class="latest-prdouct__slider__item">
							<?php
							$sql = "SELECT * FROM `sanpham` ORDER BY dateAdd DESC LIMIT 3";
							$data = pdo_query($sql);
							foreach ($data as $rows) {
								extract($rows);
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
						<div class="latest-prdouct__slider__item">
							<?php
							$sql = "SELECT * FROM `sanpham` ORDER BY dateAdd DESC LIMIT 3 OFFSET 3";
							$data = pdo_query($sql);
							foreach ($data as $rows) {
								extract($rows);
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
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>TOP BÁN CHẠY</h4>
					<div class="latest-product__slider owl-carousel">
						<div class="latest-prdouct__slider__item">
							<?php
							$sql = "SELECT * FROM `sanpham` ORDER BY giaSanPham DESC LIMIT 3";
							$data = pdo_query($sql);
							foreach ($data as $rows) {
								extract($rows);
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
						<div class="latest-prdouct__slider__item">
							<?php
							$sql = "SELECT * FROM `sanpham` ORDER BY giaSanPham DESC LIMIT 3 OFFSET 3";
							$data = pdo_query($sql);
							foreach ($data as $rows) {
								extract($rows);
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
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title from-blog__title">
					<h2>Tin Tức</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$sql = "select * from tintuc where 1 order by id_tinTuc desc limit 0,3";
			$data = pdo_query($sql);
			foreach ($data as $rows) {
				extract($rows);
				echo '               
                         <div class="col-lg-4 col-md-4 col-sm-6">
						<div class="blog__item">
							<div class="blog__item__pic">
								<img src="app/admin/uploads/' . $img_path . '" alt="">
							</div>
							<div class="blog__item__text">
								<ul>
									<li><i class="fa fa-calendar-o"></i>' . $ngaydang_tinTuc . '</li>
									<li><i class="fa fa-comment-o"></i> 5</li>
								</ul>
								<h5><a href="#">' . $tieude . '</a></h5>
								<p>' . $noidung_tinTuc . '</p>
							</div>
						</div>
                    	</div>
               	';
			}
			?>
		</div>
	</div>
</section>
<!-- Blog Section End -->