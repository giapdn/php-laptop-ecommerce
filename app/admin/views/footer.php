
<script src="app/home/public/js/main.js"></script>

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