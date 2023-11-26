<section class="breadcrumb-section set-bg" data-setbg="app/home/public/img/banner/banner4.jpg">
	<div class="container">
		<div class="row">
			<div class="hero__item set-bg">
				<div class="hero__text">
					<span>SẢN PHẨM CÔNG NGHỆ</span>
					<h2>Laptop <br />100% Chính hãng</h2>
					<p>Miễn phí giao hàng toàn quốc</p>
					<a href="index.php?act=trangsanpham" class="primary-btn">MUA NGAY</a>
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
					echo '
						<div class="col-lg-3" onclick="goTo(' . $id_danhmuc . ')">
							<div class="categories__item set-bg" data-setbg="app/admin/uploads/' . $img_danhmuc . '">
								<h5><a href="#">' . $tendanhmuc . '</a></h5>
							</div>
						</div>
					';
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
			$sql = "SELECT * FROM `sanpham` order by id_sanPham desc limit 8";
			$data = pdo_query($sql);
			foreach ($data as $rows) {
				extract($rows);
				echo ' 
					<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
						<div class="featured__item">
							<div style="cursor: pointer;" class="featured__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '" onclick="chitietsp(' . $id_sanPham . ', ' . $id_danhmuc . ')">
								<ul class="featured__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="featured__item__text">
								<h6><a style="font-weight: bold;" href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '">' . $tenSanPham . '</a></h6>
								<h5 style="background-color: yellow;"><span style="color: red;">' . number_format($giaSanPham, 0, ',', '.') . ' Vnđ</span></h5>
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
					<img src="app/home/public/img/banner/banner3.avif">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="banner__pic">
					<img src="app/home/public/img/banner/banner5.webp">
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

<script>
	function goTo(params) {
		window.location.href = "index.php?act=listSPbyDM&id_danhmuc=" + params;
	}

	function chitietsp(params, id_danhmuc) {
		window.location.href = "index.php?act=chitietsanpham&idsp=" + params + "&id_danhmuc=" + id_danhmuc;
	}
</script>



<a href="http://zaloapp.com/qr/p/2u0gjeeh2pht" class="zalo-button">
	<img src="app/home/public/img/zaloicon.jpg" alt="Zalo Icon" class="zalo-icon" style="width: 70px; height: 70px;">
</a>

<!-- Blog Section End -->
<button onclick="topFunction()" id="myBtn" title="Go to top" style="width: 70px;
  height: 70px;">↑</button>



<script>
	// JavaScript để xử lý sự kiện khi cuộn trang và khi click nút
	window.onscroll = function() {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("myBtn").style.display = "block";
		} else {
			document.getElementById("myBtn").style.display = "none";
		}
	}

	function topFunction() {
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	}

	document.querySelector('.zalo-button').addEventListener('mouseenter', function() {
		// Thêm class active khi di chuột vào nút
		this.classList.add('active');
	});

	document.querySelector('.zalo-button').addEventListener('mouseleave', function() {
		// Loại bỏ class active khi di chuột ra khỏi nút
		this.classList.remove('active');
	});
</script>


<style>
	.zalo-button {
		position: fixed;
		/* Cố định vị trí trên trang */
		top: 94%;
		/* Điều chỉnh vị trí từ trên xuống */
		left: 20px;
		/* Khoảng cách từ viền trái của trang */
		transform: translateY(-50%);
		/* Dịch chuyển nút lên trên để căn giữa theo chiều dọc */
		z-index: 999;
		/* Đảm bảo nằm trên các phần khác của trang */
		display: flex;
		align-items: center;

		color: #fff;
		/* Màu của chữ */
		padding: 10px 20px;
		border-radius: 5px;
		text-decoration: none;
		/* Loại bỏ gạch chân khi hover */
		transition: 0.3s;
	}

	.zalo-icon {

		vertical-align: middle;
		transition: 0.3s;

	}


	.zalo-button:hover .zalo-icon {
		transform: translateX(10%);
	}




	/* CSS để tạo kiểu cho nút "quay trở lại đầu trang" */
	#myBtn {

		display: none;
		/* Ẩn ban đầu */
		position: fixed;
		/* Cố định vị trí */
		bottom: 1px;
		/* Khoảng cách từ bottom */
		right: 20px;
		/* Khoảng cách từ right */
		z-index: 99;
		/* Đảm bảo hiển thị trên cùng các phần tử bên dưới */
		font-size: 30px;
		/* Kích thước chữ */
		border: none;
		/* Không có viền */
		outline: none;
		/* Không có đường viền khi focus */
		background-color: #7fad39;
		/* Màu nền */
		color: white;
		/* Màu chữ */
		cursor: pointer;
		/* Con trỏ khi di chuột qua */
		padding: 15px;
		/* Khoảng cách giữa nút và vùng click */
		border-radius: 50%;
		/* Bo góc */
		transition: background-color 0.3s;
		/* Hiệu ứng chuyển đổi màu nền */
	}

	#myBtn:hover {
		background-color: #88d80f;
		/* Màu nền khi di chuột qua */
		color: black;
		/* Màu chữ khi di chuột qua */
	}
</style>