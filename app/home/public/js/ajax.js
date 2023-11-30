function ajaxSL(id, soluong) {
    console.log("Id sản phẩm: " + id.toString());
    console.log("Số lượng: " + Number(soluong));
    $.ajax({
        url: 'app/home/modules/giohang/ajax.php',
        type: 'POST',
        data: {
            id_sanPham: id.toString(),
            soluong: Number(soluong)
        },
        success: function (response) {
            $(`#${id.toString()}`).html(response.newJeans + ' đ');
            $('#totalCart').html(response.allIWantForChristmasIsYou + ' đ');
            console.log(response);
        },
        error: function (error) {
            console.error('Lỗi yêu cầu:', error);
        }
    });
}

function letPay() {
    var x = document.getElementById("name");
    var y = document.getElementById("location");
    var z = document.getElementById("phone");
    var cartSum = document.getElementById("sumCart");
    $.ajax({
        type: "POST",
        url: "app/home/modules/thanhtoan/process.php",
        data: {
            name: x.value,
            location: y.value,
            phone: z.value,
            sum: cartSum.textContent
        },
        success: function (response) {
            alert("Đặt hàng thành công !, hãy theo dõi trạng thái đơn hàng của bạn ");
            window.location.href = `/duan1/index.php?act=bill&id_donhang=${response.id_donhang}`;
        },
        error: function (response) {
            console.log(response);
        }
    });
}

function defaultPay(params) {
    window.location.href = "/duan1/index.php?act=defaultPay";
}

function momo(params) {
    window.location.href = "/duan1/index.php?act=momo";
}

function vnpay(cartSum) {
    event.preventDefault();
    window.location.href = "/duan1/index.php?act=vnpay&cartSum=" + Number(cartSum);
}