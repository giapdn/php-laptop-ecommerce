<section class="categories">
<section class="categories">
	<div class="container">
		<div class="banner" style="background-color: #014e01; ">
			<?php
			$sql = "SELECT * FROM `banner`";
			$data = pdo_query($sql);
			foreach ($data as $rows) {
				extract($rows);
				echo '
					<div class="slide">
						<img class="tt" src="app/admin/uploads/' . $img_path . '" alt="">
					</div>				
				';
			}
			?>
			<?php
			$sql = "SELECT * FROM `banner`";
			$data = pdo_query($sql);
			foreach ($data as $rows) {
				extract($rows);
				echo '
					<div class="slide">
						<img class="tt" src="app/admin/uploads/' . $img_path . '" alt="">
					</div>				
				';
			}
			?>
		</div>
	</div>
</section>
</section>


<!-- <section class="categories">
	<div class="container">
		<div class="banner" style="background-color: #014e01; ">
			<div class="slide">

				<img class="tt" src="app/home/public/img/banner/banner13.avif" alt="">
			</div>
			<div class="slide">

				<img class="tt" src="app/home/public/img/banner/banner6.jpg" alt="">
			</div>
			<div class="slide">

				<img class="tt" src="app/home/public/img/banner/banner7.jpg" alt="">
			</div>
			<div class="slide">

				<img class="tt" src="app/home/public/img/banner/banner13.avif" alt="">
			</div>
			<div class="slide">

				<img class="tt" src="app/home/public/img/banner/banner6.jpg" alt="">
			</div>
		</div>
	</div>
	</section> -->


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
							<div class="categories__item set-bg" data-setbg="app/admin/uploads/' . $img_danhmuc . '" >
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
						<!-- <li data-filter=".oranges">Oranges</li>
						<li data-filter=".fresh-meat">Fresh Meat</li>
						<li data-filter=".vegetables">Vegetables</li>
						<li data-filter=".fastfood">Fastfood</li> -->
					</ul>
				</div>
			</div>
		</div>
		<div class="row featured__filter">
			<?php
			$sql = "SELECT * FROM `sanpham` order by id_sanPham desc limit 12";
			$data = pdo_query($sql);
			foreach ($data as $rows) {
				extract($rows);
				echo ' 
					<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
						<div class="featured__item">
							<div style="cursor: pointer;" class="featured__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '" onclick="chitietsp(' . $id_sanPham . ', ' . $id_danhmuc . ')">
								<ul class="featured__item__pic__hover">
								<li><a href="index.php?act=addyeuthich&id_sanPham=' . $id_sanPham . '"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i onlick="flyToYou("' . $id_sanPham . '")" onlick="flyToYou("' . $id_sanPham . '")" class="fa fa-shopping-cart x y z x y z"></i></a></li>
								</ul>
							</div>
							<div class="featured__item__text">
								<h6><a style="font-weight: bold;" href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '">' . $tenSanPham . '</a></h6>
								<h5 ><span style="color: red;">' . number_format($giaSanPham, 0, ',', '.') . ' Vnđ</span></h5>
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
	<div class="container" style="background-color: #7fad39;   border-radius: 10px;   border: 2px solid #d1d1d1; padding-top:20px;background-image: url(app/home/public/img/banner/bannerxanh.jpg);">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Top Lượt Xem</h4>
					<div class="latest-product__slider owl-carousel">
						<div class="latest-prdouct__slider__item">
							<?php
							$sql = "SELECT * FROM `sanpham` ORDER BY views LIMIT 3";
							$data = pdo_query($sql);
							foreach ($data as $rows) {
								extract($rows);
								echo ' 
									<a href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '&id_danhmuc=' . $id_danhmuc . '" class="latest-product__item">
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
									<a href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '&id_danhmuc=' . $id_danhmuc . '" class="latest-product__item">
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
									<a href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '&id_danhmuc=' . $id_danhmuc . '" class="latest-product__item">
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
									<a href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '&id_danhmuc=' . $id_danhmuc . '" class="latest-product__item">
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
									<a href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '&id_danhmuc=' . $id_danhmuc . '" class="latest-product__item">
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
									<a href="index.php?act=chitietsanpham&idsp=' . $id_sanPham . '&id_danhmuc=' . $id_danhmuc . '" class="latest-product__item">
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


<section class="from-blog spad">
	<div class="container" style=" display: flex;
<section class="from-blog spad">
	<div class="container" style=" display: flex;
    align-items: center;
    overflow: hidden;
	">
		<div class="product-content">
			<h3>ƯU ĐÃI ĐỘC QUYỀN</h3>
			<p>
				"Một chiếc laptop hoàn hảo chỉ cách bạn vài cú click, cùng nhận ngay những ưu đãi giày độc quyền dành riêng cho những khách hàng thân thiết của chúng tôi!"
			</p>
			<button id="blue">Nhận ưu đãi ngay</button>
		</div>
		<div class="product-img">
			<img id="hoveranh" src="app\home\public\img\Image-ExtractWord-0-Out-7288-1640840203-removebg-preview.png" alt="">
		</div>
	</div>
</section>
		<div class="product-content">
			<h3>ƯU ĐÃI ĐỘC QUYỀN</h3>
			<p>
				"Một chiếc laptop hoàn hảo chỉ cách bạn vài cú click, cùng nhận ngay những ưu đãi giày độc quyền dành riêng cho những khách hàng thân thiết của chúng tôi!"
			</p>
			<button id="blue">Nhận ưu đãi ngay</button>
		</div>
		<div class="product-img">
			<img id="hoveranh" src="app\home\public\img\Image-ExtractWord-0-Out-7288-1640840203-removebg-preview.png" alt="">
		</div>
	</div>
</section>

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

<!-- Blog Section End -->
<button onclick="topFunction()" id="myBtn" title="Go to top" style="width: 50px;
  height: 50px;">↑</button>

<script>
	function goTo(params) {
		window.location.href = "index.php?act=listSPbyDM&id_danhmuc=" + params;
	}

	let index = 0;

	function SlideShow() {
		let getSlide = document.getElementsByClassName('slide');
		if (index > getSlide.length - 1) {
			index = 0;
		}
		if (index < 0) {
			index = getSlide.length - 1;
		}
		for (let i = 0; i < getSlide.length; i++) {
			getSlide[i].style.display = "none";
		}
		getSlide[index].style.display = "block";
	}
	SlideShow();
	function SlideShow() {
		let getSlide = document.getElementsByClassName('slide');
		if (index > getSlide.length - 1) {
			index = 0;
		}
		if (index < 0) {
			index = getSlide.length - 1;
		}
		for (let i = 0; i < getSlide.length; i++) {
			getSlide[i].style.display = "none";
		}
		getSlide[index].style.display = "block";
	}
	SlideShow();

	function Next() {
		index++;
		SlideShow();
	}
	function Next() {
		index++;
		SlideShow();
	}

	function Previous() {
		index--;
		SlideShow();
	}
	function Previous() {
		index--;
		SlideShow();
	}

	let loop;
	let loop;

	function AutoLoop() {
		loop = setInterval(function() {
			Next()
		}, 3000)
	}
	function AutoLoop() {
		loop = setInterval(function() {
			Next()
		}, 3000)
	}

	AutoLoop(),
		function StopLoop() {
			clearInterval(loop);
	AutoLoop(),
		function StopLoop() {
			clearInterval(loop);

		}
	// JavaScript để xử lý sự kiện khi cuộn trang và khi click nút
	window.onscroll = function() {
		scrollFunction()
	};
		}
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
	function topFunction() {
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	}

	document.querySelector('.zalo-button').addEventListener('mouseenter', function() {
		// Thêm class active khi di chuột vào nút
		this.classList.add('active');
	});
	document.querySelector('.zalo-button').addEventListener('mouseenter', function() {
		// Thêm class active khi di chuột vào nút
		this.classList.add('active');
	});

	document.querySelector('.zalo-button').addEventListener('mouseleave', function() {
		// Loại bỏ class active khi di chuột ra khỏi nút
		this.classList.remove('active');
	});
</script>
	document.querySelector('.zalo-button').addEventListener('mouseleave', function() {
		// Loại bỏ class active khi di chuột ra khỏi nút
		this.classList.remove('active');
	});
</script>


<style>
	.slide {
		position: relative;
	}
<style>
	.slide {
		position: relative;
	}

	.slide img {

		width: 100%;
		height: 400px;
		object-fit: cover;
		/* This property is used to maintain the aspect ratio of the images */
	}
	.slide img {

		width: 100%;
		height: 400px;
		object-fit: cover;
		/* This property is used to maintain the aspect ratio of the images */
	}

	/* CSS để tạo kiểu cho nút "quay trở lại đầu trang" */
	#myBtn {
	/* CSS để tạo kiểu cho nút "quay trở lại đầu trang" */
	#myBtn {

		display: none;
		/* Ẩn ban đầu */
		position: fixed;
		/* Cố định vị trí */
		bottom: 25px;
		/* Khoảng cách từ bottom */
		right: 20px;
		/* Khoảng cách từ right */
		z-index: 99;
		/* Đảm bảo hiển thị trên cùng các phần tử bên dưới */
		font-size: 15px;
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
		display: none;
		/* Ẩn ban đầu */
		position: fixed;
		/* Cố định vị trí */
		bottom: 25px;
		/* Khoảng cách từ bottom */
		right: 20px;
		/* Khoảng cách từ right */
		z-index: 99;
		/* Đảm bảo hiển thị trên cùng các phần tử bên dưới */
		font-size: 15px;
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
	#myBtn:hover {
		background-color: #88d80f;
		/* Màu nền khi di chuột qua */
		color: black;
		/* Màu chữ khi di chuột qua */
	}



	.container #hoveranh {
		padding-right: 50px;
		transform: scale(1.5);
	.container #hoveranh {
		padding-right: 50px;
		transform: scale(1.5);

	}
	}

	@keyframes scaleAnimation {
		0% {
			transform: scale(1.3);
		}
	@keyframes scaleAnimation {
		0% {
			transform: scale(1.3);
		}

		50% {
			transform: scale(1.7);
		}
		50% {
			transform: scale(1.7);
		}

		100% {
			transform: scale(1.3);
		}
	}
		100% {
			transform: scale(1.3);
		}
	}

	#hoveranh {
		animation: scaleAnimation 3s infinite;
	}
	#hoveranh {
		animation: scaleAnimation 3s infinite;
	}

	.container .product-content {
		background-image: url('app/home/public/img/banner/banner15.png');
		background-size: cover;
		text-align: center;
		background-color: #7fad39;
	}
	.container .product-content {
		background-image: url('app/home/public/img/banner/banner15.png');
		background-size: cover;
		text-align: center;
		background-color: #7fad39;
	}

	.container .product-content h3 {
		margin-top: 40px;
		font-weight: bold;
		font-size: 30px;
		color: rgba(255, 255, 255, 0);
		/* Màu chữ với độ trong suốt */
	}
	.container .product-content h3 {
		margin-top: 40px;
		font-weight: bold;
		font-size: 30px;
		color: rgba(255, 255, 255, 0);
		/* Màu chữ với độ trong suốt */
	}

	.container .product-content p {
		color: rgba(255, 255, 255, 0);
		/* Màu chữ với độ trong suốt */
		font-size: 15px;
		font-weight: bold;
		margin: 40px 40px 40px 40px;
		line-height: 40px;
		letter-spacing: 1px
	}
	.container .product-content p {
		color: rgba(255, 255, 255, 0);
		/* Màu chữ với độ trong suốt */
		font-size: 15px;
		font-weight: bold;
		margin: 40px 40px 40px 40px;
		line-height: 40px;
		letter-spacing: 1px
	}

	.container .product-content button {
		font-family: 'BeaufortforLOL-Bold';
		width: 250px;
		height: 57px;
		text-transform: uppercase;
		color: rgba(255, 255, 255, 0);
		/* Màu chữ với độ trong suốt */
		background-color: rgba(255, 255, 255, 0);
	.container .product-content button {
		font-family: 'BeaufortforLOL-Bold';
		width: 250px;
		height: 57px;
		text-transform: uppercase;
		color: rgba(255, 255, 255, 0);
		/* Màu chữ với độ trong suốt */
		background-color: rgba(255, 255, 255, 0);

		font-weight: bold;
		border: none;
		margin-bottom: 30px;
		font-weight: bold;
		border: none;
		margin-bottom: 30px;

	}
	}



	/* For Google Chrome */
	::-webkit-scrollbar {
		width: 12px;
		/* Chiều rộng của thanh cuộn */
	}

	::-webkit-scrollbar-track {
		background: #f1f1f1;
		/* Màu nền cụm của thanh cuộn */
	}

	::-webkit-scrollbar-thumb {
		background: #7fad39;
		/* Màu của thanh cuộn */
	}
	::-webkit-scrollbar-thumb {
		background: #7fad39;
		/* Màu của thanh cuộn */
	}

	::-webkit-scrollbar-thumb:hover {
		background: #014e01;
		/* Màu thanh cuộn khi di chuột vào */
	}
</style>
	::-webkit-scrollbar-thumb:hover {
		background: #014e01;
		/* Màu thanh cuộn khi di chuột vào */
	}
</style>