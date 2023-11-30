<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laptop LSG</title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="app/home/public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="app/home/public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="app/home/public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="app/home/public/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="app/home/public/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="app/home/public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="app/home/public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="app/home/public/css/style.css" type="text/css">

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <!-- <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="index.php?act=giohang"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="index.php?act=lienhe">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div> -->
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top" style="background-color: #7fad39;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> giapdnph35799@fpt.edu</li>
                                <li>Chào bạn tới với cửa hàng của chúng tôi !</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="app/home/public/img/language.png">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>

                            <div class="header__top__right__language">
                                <?php
                                if (isset($_SESSION["username"])) {
                                    $user = $_SESSION["username"];
                                    $sql = "SELECT `author` FROM `users` WHERE `userName` = '$user'";
                                    $result = pdo_query_one($sql);
                                    if ($result["author"] == "admin") {
                                        echo '
                                            <div class="header__top__right__auth">
                                                <a href="#"><i class="fa fa-user"></i> ' . $user . '</a>
                                            </div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="index.php?act=tttk">Tài khoản</a></li> 
                                                <li><a href="index.php?act=lichsu">Đơn mua</a></li>                                                                                                                    
                                                <li><a href="app/admin/index.php?act=home">Admin</a></li>                                           
                                                <li><a href="index.php?act=logOut">Đăng xuất</a></li>
                                            </ul>
                                        ';
                                    } else {
                                        echo '
                                            <div class="header__top__right__auth">
                                                <a href="#"><i class="fa fa-user"></i> ' . $user . '</a>
                                            </div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="index.php?act=tttk">Tài khoản</a></li>  
                                                <li><a href="index.php?act=lichsu">Đơn mua</a></li>                                                                                                                                                      
                                                <li><a href="index.php?act=logOut">Đăng xuất</a></li>
                                            </ul>
                                        ';
                                    }
                                } else {
                                    echo '
                                        <div class="header__top__right__auth">
                                            <a href="index.php?act=logIn"><i class="fa fa-user"></i> Đăng nhập</a>
                                        </div>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3" width="242px" height="211px">
                    <div class="header__logo">
                        <a href="./index.html"><img src="app/home/public/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php?act=trangsanpham">Cửa hàng</a></li>
                            <li><a href="index.php?act=page">Pages</a>
                               
                            </li>
                            <!-- <li><a href="index.php?act=tintuc">Tư vấn</a></li> -->
                            <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                      







                        <?php
                                if (isset($_SESSION["username"])) {
                                    $y = $_SESSION["username"];
                                    $x = "SELECT 
                                        Count(soluong) AS total 
                                        FROM 
                                        yeuthich
                                        WHERE 
                                            userName = '$y';
                                    ";
                                    $z = pdo_query_one($x);
                                    if ($z["total"] != 0) {
                                        echo '
                                            <li><a href="index.php?act=yeuthich"><i class="fa fa-heart"></i> <span style="background-color: red;">' . $z["total"] . '</span></a></li>
                                        ';
                                    } else {
                                        echo '
                                            <li><a href="index.php?act=yeuthich"><i class="fa fa-heart"></i> <span style="background-color: red;">0</span></a></li>
                                        ';
                                    }
                                } else {
                                    echo '
                                        <li><a href="index.php?act=yeuthich"><i class="fa fa-heart"></i> <span style="background-color: red;">0</span></a></li>
                                    ';
                                }
                            ?>






                            <?php
                            if (isset($_SESSION["username"])) {
                                $y = $_SESSION["username"];
                                $x = "SELECT 
                                    SUM(soluong) AS total
                                    FROM 
                                        giohang
                                    WHERE 
                                        userName = '$y'
                                  
                                ";
                                $z = pdo_query_one($x);
                                if ($z["total"] != 0) {
                                    echo '
                                        <li><a href="index.php?act=giohang"><i class="fa fa-shopping-bag"></i> <span style="background-color: red;">' . $z["total"] . '</span></a></li>
                                    ';
                                } else {
                                    echo '
                                        <li><a href="index.php?act=giohang"><i class="fa fa-shopping-bag"></i> <span style="background-color: red;">0</span></a></li>
                                    ';
                                }
                            } else {
                                echo '
                                    <li><a href="index.php?act=giohang"><i class="fa fa-shopping-bag"></i> <span style="background-color: red;">0</span></a></li>
                                ';
                            }
                            ?>
                        </ul>
                        <?php
                        if (isset($_SESSION["username"])) {
                            $id = $_SESSION["username"];
                            $sql = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS sumCart
                            FROM giohang
                            JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                            -- GROUP BY giohang.userName;
                            WHERE giohang.userName = '$id';";
                            $data = pdo_query_one($sql);
                            echo '<div class="header__cart__price">Tổng: <span>' . number_format($data["sumCart"], 0, ',', '.') . ' ₫</span></div>';
                        } else {
                            echo '<div class="header__cart__price">Tổng: <span>0 ₫</span></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục</span>
                        </div>
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
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="index.php?act=hotSearch" method="post">
                                <input type="text" name="hotSearchData" placeholder="Nhập sản phẩm bạn quan tâm">
                                <button type="submit" name="hotSearch" class="site-btn">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <a href="index.php?act=lienhe"> <i class="fa fa-phone"></i></a>

                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 88306943</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>