<!-- Product Details Section Begin -->
<?
session_start();
?>
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<!-- Ảnh sản phẩm và ảnh liên quan -->
				<div class="product__details__pic">
					<div class="product__details__pic__item">
						<?php
						$x = $_GET["idsp"];
						$sql = "SELECT sanpham.img_path FROM sanpham WHERE id_sanPham = '$x'";
						$y = pdo_query_one($sql);
						echo '<img class="product__details__pic__item--large" src="app/admin/uploads/' . $y["img_path"] . '" alt="img">';
						?>
					</div>
					<div class="product__details__pic__slider owl-carousel">
						<?php
						$id = $_GET["idsp"];
						$x = "SELECT * FROM bienthe_Img WHERE id_sanPham = '$id' LIMIT 5";
						$x_Result = pdo_query($x);
						if (empty($x_Result)) {
							for ($i = 0; $i < 7; $i++) {
								echo '
									<img data-imgbigurl="app/admin/uploads/image(1529).png" src="app/admin/uploads/image(1529).png" alt="">
								';
							}
						} else {
							foreach ($x_Result as $key) {
								extract($key);
								echo '
									<img data-imgbigurl="app/admin/uploads/' . $PATH . '" src="app/admin/uploads/' . $PATH . '" alt="">
								';
							}
						}
						?>
					</div>
				</div>
			</div>
			<!-- Tên sản phẩm, giá, chọn option, màu, nút mua, biến thể sản phẩm -->
			<div class="col-lg-6 col-md-6">
				<div class="product__details__text">
					<?php
					$id = $_GET["idsp"];
					$sql = "SELECT * FROM `sanpham` where id_sanPham = '$id'";
					$query = "SELECT sanpham.*, bienthe_sanPham.*, bienthe_Img.*
						FROM sanpham
						LEFT JOIN bienthe_sanPham ON bienthe_sanPham.id_sanPham
						LEFT JOIN bienthe_Img ON bienthe_Img.id_sanPham = sanpham.id_sanPham 
						WHERE sanpham.id_sanPham = '$id';
					";
					$data = pdo_query_one($query);
					extract($data);
					echo '
						<h3>' . $tenSanPham . '</h3>
						<div class="product__details__rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<span>(18 reviews)</span>
						</div>
						<div class="product__details__price x y"><span class="x y z g">' . number_format($giaSanPham, 0, ',', '.') . '</span> đ</div>
					';
					?>
					<!-- Lựa chọn option -->
					<div class="product__details__price d-flex">
						<?php
						$id = $_GET["idsp"];
						$sql = "SELECT DISTINCT `gb` FROM bienthe_sanpham WHERE id_sanPham = '$id'";
						$result = pdo_query($sql);
						if (count($result) <= 1) {
						} else {
							echo '<select id="hehehe" class="custom-select x y" onchange="ajaxSelect(this.value, ' . $id . ')">';
							foreach ($result as $key) {
								extract($key);
								echo '<option value="' . $gb . '" selected>' . $gb . ' GB</option>';
							}
							echo '</select>';
						}
						?>
						<?php
						$id = $_GET["idsp"];
						$sql = "SELECT DISTINCT `color` FROM bienthe_sanpham WHERE id_sanPham = '$id'";
						$result = pdo_query($sql);
						if (count($result) == 0) {
							# code...
						} elseif (count($result) == 1) {
							# code...
						} else {
							foreach ($result as $key) {
								echo '<input class="btn btn-primary ml-2" type="button" value="' . $key["color"] . '" onclick="getColor(this.value)">';
							}
						}
						?>
					</div>
					<!-- Mua hafng -->
					<div class="product__details__quantity">
						<div style="cursor: pointer;" onclick="goToPayForm('<?php echo $_GET['idsp'] ?>');" class="primary-btn">Mua ngay</div>
					</div>
					<?php
					$id_sanPham = $_GET["idsp"];
					echo '
						<a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '" class="primary-btn">Thêm vào giỏ hàng</a>
						<a href="index.php?act=addyeuthich&id_sanPham=' . $id_sanPham . '" class="heart-icon"><span class="icon_heart_alt"></span></a>
						';
					?>
					<!--Thông số sản phẩm -->
					<ul>
						<li>
							<h3>Thông số sản phẩm</h3>
						</li>
						<?php
						$id = $_GET["idsp"];
						$sql = "SELECT * FROM sanpham WHERE id_sanPham = '$id' ";
						$result = pdo_query_one($sql);
						extract($result);
						echo '
							<li><b>Vi xử lý: </b> <span>' . $chip . '</span></li>
							<li><b>Đồ hoạ: </b> <span>' . $card . '</span></li>
							<li><b>RAM: </b> <span>' . $ram . ' gb</span></li>
							<li><b>Cân nặng: </b> <span>' . $weight . ' kg</span></li>
							<li><b>Màu sắc: </b> <span>' . $color . '</span></li>
							<li><b>Màn hình: </b> <span>' . $display . ' inch</span></li>
							<li><b>Share on</b>
								<div class="share">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</div>
							</li>
						';
						?>
					</ul>
				</div>
			</div>

			<!-- Bình luận -->
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
						<style>
							.date {
								font-size: 11px
							}

							.comment-text {
								font-size: 12px
							}

							.fs-12 {
								font-size: 12px
							}

							.shadow-none {
								box-shadow: none
							}

							.name {
								color: #007bff
							}

							.cursor:hover {
								color: blue
							}

							.cursor {
								cursor: pointer
							}

							.textarea {
								resize: none
							}
						</style>
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<div class="container mt-5">
								<div class="d-flex row">
									<div class="col-md-8" style="width: 1140px;">
										<div class="d-flex flex-column comment-section" style="width: 1140px;">
											<div class="x y z n">
												<?php
												$prodID = $_GET["idsp"];
												$query = "SELECT binhluan.*, users.* 
												FROM binhluan 
												LEFT JOIN users ON binhluan.userName = users.userName
												WHERE id_sanPham = '$prodID'";
												$result = pdo_query($query);
												foreach ($result as $key) {
													extract($key);
													echo '
													<div class="p-2">
														<div class="d-flex flex-row user-info"><img class="rounded-circle" src="app/admin/uploads/' . $avatar . '" width="40">
															<div class="d-flex flex-column justify-content-start ml-2">
																<span class="d-block font-weight-bold name">' . $name . '</span>
																<span class="date text-black-50">' . $userName . ' - ' . $ngay_binhLuan . '</span>
															</div>
														</div>
														<div class="mt-2">
															<p class="comment-text">' . $noidung_binhLuan . '</p>
														</div>
													</div>
												';
												}
												?>
											</div>
											<div class="bg-white">
												<div class="d-flex flex-row fs-12">
													<div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Thích</span></div>
													<div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Phản hồi</span></div>
													<div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Chia sẻ</span></div>
												</div>
											</div>
											<div class="p-2">
												<?php
												if (isset($_SESSION["username"])) {
													echo '
														<div class="d-flex flex-row align-items-start">
															<textarea class="form-control ml-1 shadow-none textarea" placeholder="Ý kiến của bạn về sản phẩm ?"></textarea>
														</div>
														<div class="mt-2 text-right">
															<button class="btn btn-primary btn-sm shadow-none" type="button" onclick="ajaxComment(' . $_GET["idsp"] . ')">Gửi bình luận</button>
															<button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Thoát</button>
														</div>
													';
												} else {
													echo 'Đăng nhập để bình luận về sản phẩm';
												}
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"> -->
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
			$prodID = $_GET["idsp"];
			$id_danhmuc = $_GET["id_danhmuc"];
			$sql = "SELECT * FROM `sanpham` WHERE `id_danhmuc` = '$id_danhmuc' AND id_sanPham != '$prodID' LIMIT 8";
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