<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./public/css/main.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <title>Quản trị</title>
</head>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="brand" style=" position: fixed;  z-index: 1000;">
                <img src="../admin/public/icons/Thiết_kế_chưa_có_tên-removebg-preview 1.png" alt="" width="210px" height="50px">

                <div class="aa">
                    <div class="timkiem">
                        <a onclick="moveToLeft()" style="color: white;"><i class="fas fa-bars"></i></a>
                        <input type="text" name="search" placeholder="Search..">
                    </div>
                    <div class="notification">
                        <a href="#">Admin</a>
                        <img src="../home/public/img/zalo_sharelogo (1).png" alt="Notification Bell Icon" width="40px" height="40px" style="border-radius: 50%;"> <!-- Replace "notification-icon.png" with the actual path to your notification bell icon image -->
                        <button onclick="changeBackgroundColor()"><i class="fas fa-sync-alt"></i></button>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <nav class="sidebar bg-primary">
                <ul>
                    <li>
                        <a href="index.php?act=home"><i class="fa-solid fa-house ico-side"></i>Trang chủ</a>
                    </li>
                    <li>
                        <a href="index.php?act=danhmuc"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh mục</a>
                    </li>
                    <li>
                        <a href="index.php?act=quanlysp"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
                    </li>
                    <div class="d">
                        <span class="b"><i class="fa-solid fa-cart-shopping ico-side"></i>Đơn hàng</span>
                        <ul class="c">
                            <li><a href="index.php?act=quanlydonhang">Các đơn hàng</a></li>
                            <li><a href="#">Trạng thái</a></li>

                        </ul>
                    </div>

                    <li>
                        <a href="index.php?act=quanlythanhvien"><i class="fa-solid fa-user ico-side"></i>Quản lí thành viên</a>
                    </li>
                    <li>
                        <a href="index.php?act=commentList"><i class="fa-solid fa-comment-dots ico-side"></i>Quản lí bình luận</a>
                    </li>
                    <div class="menu ">
                        <span class="menu-button"><i class="fas fa-chart-bar"></i> Thống kê</span>
                        <ul class="menu-list">
                            <li><a href="index.php?act=thongke">Theo danh mục</a></li>
                            <li><a href="index.php?act=thongkesp">Top bán chạy</a></li>

                        </ul>
                    </div>








                    <li>
                        <a href="/duan1/index.php"><i class="fas fa-sign-out-alt"></i> Về Website</a>
                    </li>

                    <div class="container-fluid main-page">
    <!-- Các phần tử khác trong div này -->
    
</div>

                </ul>
            </nav>
        </div>
    </div>

   
    <script src="assets/js/main.js"></script>
    <script>
        // Bắt sự kiện khi di chuột vào hoặc rời khỏi phần tử a


        var isHidden = false;

function moveToLeft() {
    var elements = document.querySelectorAll('.container-fluid.main-page > *');
    if (isHidden) {
        elements.forEach(function(element) {
            element.style.marginLeft = '0px'; // Ẩn hết về lề bên trái
        });
    } else {
        elements.forEach(function(element) {
            var marginLeft = window.getComputedStyle(element).marginLeft;
            var currentMarginLeft = parseInt(marginLeft.replace('px', ''));
            element.style.marginLeft = (currentMarginLeft - 200) + 'px'; // Điều chỉnh giá trị 50 theo ý muốn
        });
    }
    isHidden = !isHidden; // Đảo ngược trạng thái isHidden
}

    </script>


    <style>





        .d {
            margin-left: 20px;
        }

        .c {
            display: none;
            position: relative;
            /* Thay đổi từ position: absolute sang position: relative */
            list-style-type: none;
            padding: 0;
        }

        .c li a {
            background-color: #0d6efd;
        }

        .b {
            display: block;
            color: #f1f1f1;
            padding: 14px;
        }

        .b:hover {
            color: black;
            background-color: white;
            padding: 14px;
            margin-right: 60px;
            border-radius: 5px;
        }

        .b:focus+.c,
        .c:hover {
            display: block;
        }

        .menu {
            margin-left: 17px;

        }



        .menu-list {
            margin-top: 1px;
            display: none;
            position: relative;
            /* Thay đổi từ position: absolute sang position: relative */

            list-style-type: none;

        }

        .menu-list li a {


            color: white;


        }

        .menu-button {

            display: block;
            color: #f1f1f1;
            padding: 14px;
        }


        .menu-button:hover {
            color: black;
            background-color: white;
            padding: 14px;
            transition: 0, 5s;
            margin-right: 60px;
            border-radius: 5px;
            padding-left: 7px;

        }




        .menu-button:focus+.menu-list,
        .menu-list:hover {
            display: block;
        }

        .menu-button.active {
            color: black;
            background-color: white;
            padding: 14px;
            transition: 0.5s;
            margin-right: 60px;
            border-radius: 5px;
            padding-left: 7px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.b');
            const menuList = document.querySelector('.c');

            menuButton.addEventListener('click', function() {
                if (menuList.style.display === 'block') {
                    menuList.style.display = 'none';
                } else {
                    menuList.style.display = 'block';
                }
            });

            menuList.addEventListener('click', function() {
                menuList.style.display = 'none';
            });
        });







        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.menu-button');
            const menuList = document.querySelector('.menu-list');

            menuButton.addEventListener('click', function() {
                if (menuList.style.display === 'block') {
                    menuList.style.display = 'none';
                    menuButton.classList.remove('active');
                } else {
                    menuList.style.display = 'block';
                    menuButton.classList.add('active');
                }
            });

            menuList.addEventListener('click', function() {
                if (menuList.style.display === 'block') {
                    menuList.style.display = 'none';
                    menuButton.classList.remove('active');
                } else {
                    menuList.style.display = 'block';
                    menuButton.classList.add('active');
                }
            });
        });


        $(document).ready(function() {
            $("#colorPickerBtn").spectrum({
                type: "text",
                showInput: true,
                showInitial: true,
                showPalette: true,
                showSelectionPalette: true,
                palette: [ // Màu sẵn có trong danh sách
                    ['#000', '#fff', '#f00', '#0f0', '#00f', '#ff0', '#0ff']
                ],
                change: function(color) {
                    $("body").css("background-color", color);
                }
            });
        });




        function changeBackgroundColor() {
            var color = getRandomColor(); // Hàm này sẽ trả về một màu nền ngẫu nhiên
            document.body.style.backgroundColor = color;
        }

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
</body>

</html>