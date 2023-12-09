//ajax giỏ hàng
//ajax giỏ hàng
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

//ajax comment
function ajaxComment(prodID) {
    event.preventDefault();
    console.log(prodID);
    console.log($('.form-control.ml-1.shadow-none.textarea').val());
    if ($('.form-control.ml-1.shadow-none.textarea').val() != "") {
        $.ajax({
            type: "POST",
            url: "app/home/modules/chitietsanpham/ajaxComment.php",
            data: {
                comment: $('.form-control.ml-1.shadow-none.textarea').val(),
                prodID: prodID.toString()
            },
            success: function (response) {
                $('.x.y.z.n').html(response);
                document.querySelector(".form-control.ml-1.shadow-none.textarea").value = '';
                console.log(1);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    else {
        alert("Bạn chưa nhập gì cả ?");
    }
}

function ajaxSelect(id) {
    var soluong = document.getElementById("so__luong");
    var select = document.getElementById("hehehe");
    console.log(soluong.value);
    if (select) {
        console.log(select.value);
        $.ajax({
            type: "POST",
            url: "app/home/modules/chitietsanpham/ajaxPrice.php",
            data: {
                store: select.value.toString(),
                prodID: id.toString(),
                soluong: Number(soluong.value)
            },
            success: function (response) {
                function formatNumber(number) {
                    const formatter = new Intl.NumberFormat('en-US');
                    return formatter.format(number);
                }
                // Sử dụng hàm với một số nguyên bất kỳ
                const formattedNumber = formatNumber(response);

                $('.product__details__price.x.y').html(formattedNumber + " đ");
                console.log(response);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    else {
        $.ajax({
            type: "POST",
            url: "app/home/modules/chitietsanpham/ajaxPrice.php",
            data: {
                prodID: id.toString(),
                soluong: Number(soluong.value)
            },
            success: function (response) {
                function formatNumber(number) {
                    const formatter = new Intl.NumberFormat('en-US');
                    return formatter.format(number);
                }
                // Sử dụng hàm với một số nguyên bất kỳ
                const formattedNumber = formatNumber(response);

                $('.product__details__price.x.y').html(formattedNumber + " đ");
                console.log(response);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
}

//Thanh toán (khi nhận hàng) (kế thừa hầu hết từ letPay và cùng gửi đến thanhtoan/process.php)
function letPayNow(price, prodID, gb, soluong) {
    event.preventDefault();
    let name = document.getElementById("name");
    let location = document.getElementById("location");
    let phoneNumber = document.getElementById("phone");
    if (name.value != "" && location.value != "" && phoneNumber.value != "") {
        if (gb != 1) {
            $.ajax({
                type: "POST",
                url: "app/home/modules/thanhtoan/process.php",
                data: {
                    name: name.value.toString(),
                    location: location.value.toString(),
                    phone: phoneNumber.value.toString(),
                    prodID: Number(prodID),
                    sum: price.toString(),
                    gb: gb.toString(),
                    soluong: Number(soluong)
                },
                success: function (response) {
                    alert("Đặt hàng thành công !, hãy theo dõi trạng thái đơn hàng của bạn ");
                    window.location.href = `/duan1/index.php?act=bill&orderID=${response.orderID}&flag=noNeedDelBtn`;
                },
                error: function (error) {
                    console.error('Lỗi yêu cầu:', error);
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "app/home/modules/thanhtoan/process.php",
                data: {
                    name: name.value.toString(),
                    location: location.value.toString(),
                    phone: phoneNumber.value.toString(),
                    prodID: Number(prodID),
                    sum: price.toString(),
                    soluong: Number(soluong)
                },
                success: function (response) {
                    alert("Đặt hàng thành công !, hãy theo dõi trạng thái đơn hàng của bạn ");
                    window.location.href = `/duan1/index.php?act=bill&orderID=${response.orderID}&flag=noNeedDelBtn`;
                },
                error: function (error) {
                    console.error('Lỗi yêu cầu:', error);
                }
            });
        }
    }
    else {
        alert("Vui lòng cung cấp đầy đủ thông tin về đơn hàng !");
    }
}

//thanh toán giỏ hàng bình thường
function letPay() {
    event.preventDefault();
    let name = document.getElementById("name");
    let location = document.getElementById("location");
    let phoneNumber = document.getElementById("phone");
    let cartPrice = document.getElementById("cartPrice");
    if (name.value != "" && location.value != "" && phoneNumber.value != "") {
        console.log(name.value);
        console.log(location.value);
        console.log(phoneNumber.value);
        console.log(cartPrice.textContent.toString());
        $.ajax({
            type: "POST",
            url: "app/home/modules/thanhtoan/process.php",
            data: {
                name: name.value.toString(),
                location: location.value.toString(),
                phone: phoneNumber.value.toString(),
                sum: cartPrice.textContent.toString()
            },
            success: function (response) {
                console.log(cartPrice.textContent);
                alert("Đặt hàng thành công !, hãy theo dõi trạng thái đơn hàng của bạn ");
                window.location.href = `/duan1/index.php?act=bill&orderID=${response.orderID}&flag=noNeedDelBtn`;
            },
            error: function (error) {
                console.error('Lỗi yêu cầu:', error);
            }
        });
    }
    else {
        alert("Vui lòng cung cấp đầy đủ thông tin về đơn hàng !");
    }
}

function goToPayForm(prodID) {
    var soluong = document.getElementById("so__luong");
    var select = document.getElementById("hehehe");
    // var gb = document.querySelector('.custom-select.x.y');
    if (select) {
        window.location.href = `/duan1/index.php?act=thanhtoan&paynow=${prodID}&gb=${select.value}&soluong=${soluong.value}`;
    }
    else {
        window.location.href = `/duan1/index.php?act=thanhtoan&paynow=${prodID}&soluong=${soluong.value}`;
    }
}

function defaultPay() {
    event.preventDefault();
    window.location.href = "/duan1/index.php?act=defaultPay";
}

//ajax thanh toán (vnpay)
function vnpay(price, prodID, gb, soluong) {
    event.preventDefault();
    let name = document.getElementById("name");
    let location = document.getElementById("location");
    let phoneNumber = document.getElementById("phone");
    if (name.value != "" && location.value != "" && phoneNumber.value != "") {
        if (gb != 0 && gb != 1) {
            window.location.href = `/duan1/index.php?act=vnpay&price=${Number(price)}&name=${name.value.toString()}&location=${location.value.toString()}&phone=${phoneNumber.value.toString()}&prodID=${prodID}&soluong=${soluong}&gb=${gb}`;
        }
        else if (gb == 0) {
            window.location.href = `/duan1/index.php?act=vnpay&price=${Number(price)}&name=${name.value.toString()}&location=${location.value.toString()}&phone=${phoneNumber.value.toString()}&prodID=${prodID}&soluong=${soluong}`;
        } else {
            window.location.href = `/duan1/index.php?act=vnpay&price=${Number(price)}&name=${name.value.toString()}&location=${location.value.toString()}&phone=${phoneNumber.value.toString()}`;
        }
    }
    else {
        alert("Vui lòng nhập đầy đủ thông tin đơn hàng !");
    }
}

function goToMyOrder(action) {
    if (action == 'cancelConfirming') {
        window.location.href = `../duan1/index.php?act=${action}`;
    }
    else {
        event.preventDefault();
        window.location.href = `../duan1/index.php?act=${action}`;
    }

}

function backToPage() {
    event.preventDefault();
    window.location.href = "../duan1/index.php";
}

function goToBill(id) {
    event.preventDefault();
    window.location.href = "index.php?act=bill&orderID=" + id;
}

function confirmOrder(orderID, pttt) {
    console.log(orderID);
    var hehe = confirm("Bạn chắc chắn đã nhận được đơn hàng ?, sau khi xác nhận sẽ không thể hoàn tác.");
    if (hehe) {
        $.ajax({
            type: 'POST',
            url: 'app/home/modules/donhang/ajaxConfirm.php',
            data: {
                orderID: Number(orderID),
                pttt: pttt.toString()
            },
            success: function (response) {
                alert("Xong");

                window.location.href = "index.php?act=success";
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}


//lien quan tới trangthaidonhang.php
document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".header__menu ul li");
    menuItems.forEach(item => {
        item.addEventListener("click", function () {
            // Remove "active" class from all items
            menuItems.forEach(item => item.classList.remove("active"));
            // Add "active" class to the clicked item
            this.classList.add("active");
        });
    });
});

function ajaxFilter(min, max) {
    $.ajax({
        type: "POST",
        url: "app/home/modules/trangsanpham/processAjax.php",
        url: "app/home/modules/chitietsanpham/ajaxPrice.php",
        data: {
            min: Number(min),
            max: Number(max)
            store: gb.toString(),
            prodID: id.toString()
        },
        success: function (response) {
            console.log(1);
            $(".row.p.o.v").html(response);
        },
        error: function (error) {
            console.log(error);
            function formatNumber(number) {
                const formatter = new Intl.NumberFormat('en-US');
                return formatter.format(number);
            }
            // Sử dụng hàm với một số nguyên bất kỳ
            const formattedNumber = formatNumber(response);

            $('.product__details__price.x.y').html(formattedNumber + " đ");
            console.log(response);
        },
        error: function (error) {
            console.error(error);
        }
    });
}

function getColor(color) {
    let x = color;
    return x;
}

//ajax thanh toán (khi nhận hàng)
function letPayNow(price, prodID) {
    event.preventDefault();
    let name = document.getElementById("name");
    let location = document.getElementById("location");
    let phoneNumber = document.getElementById("phone");
    if (name.value != "" && location.value != "" && phoneNumber.value != "") {
        console.log(name.value);
        console.log(location.value);
        console.log(phoneNumber.value);
        $.ajax({
            type: "POST",
            url: "app/home/modules/thanhtoan/process.php",
            data: {
                name: name.value.toString(),
                location: location.value.toString(),
                phone: phoneNumber.value.toString(),
                prodID: Number(prodID),
                sum: price.toString()
            },
            success: function (response) {
                alert("Đặt hàng thành công !, hãy theo dõi trạng thái đơn hàng của bạn ");
                window.location.href = `/duan1/index.php?act=bill&orderID=${response.orderID}&flag=noNeedDelBtn`;
            },
            error: function (error) {
                console.error('Lỗi yêu cầu:', error);
            }
        });
    }
    else {
        alert("Vui lòng cung cấp đầy đủ thông tin về đơn hàng !");
    }
}

function letPay() {
    event.preventDefault();
    let name = document.getElementById("name");
    let location = document.getElementById("location");
    let phoneNumber = document.getElementById("phone");
    let cartPrice = document.getElementById("cartPrice");
    if (name.value != "" && location.value != "" && phoneNumber.value != "") {
        console.log(name.value);
        console.log(location.value);
        console.log(phoneNumber.value);
        console.log(cartPrice.textContent.toString());
        $.ajax({
            type: "POST",
            url: "app/home/modules/thanhtoan/process.php",
            data: {
                name: name.value.toString(),
                location: location.value.toString(),
                phone: phoneNumber.value.toString(),
                sum: cartPrice.textContent.toString()
            },
            success: function (response) {
                console.log(cartPrice.textContent);
                alert("Đặt hàng thành công !, hãy theo dõi trạng thái đơn hàng của bạn ");
                window.location.href = `/duan1/index.php?act=bill&orderID=${response.orderID}&flag=noNeedDelBtn`;
            },
            error: function (error) {
                console.error('Lỗi yêu cầu:', error);
            }
        });
    }
    else {
        alert("Vui lòng cung cấp đầy đủ thông tin về đơn hàng !");
    }
}

function goToPayForm(prodID) {
    var gb = document.querySelector('.custom-select.x.y');
    if (gb) {
        window.location.href = `/duan1/index.php?act=thanhtoan&paynow=${prodID}&gb=${gb.value}`;
    }
    else {
        window.location.href = `/duan1/index.php?act=thanhtoan&paynow=${prodID}`;
    }
}

function flyToYou(prodID) {
    $('.fa.fa-shopping-cart.x.y.z');
    alert(prodID);
}

function defaultPay() {
    event.preventDefault();
    window.location.href = "/duan1/index.php?act=defaultPay";
}

//ajax thanh toán (vnpay)
function vnpay(price) {
    event.preventDefault();
    let name = document.getElementById("name");
    let location = document.getElementById("location");
    let phoneNumber = document.getElementById("phone");
    if (name.value != "" && location.value != "" && phoneNumber.value != "") {
        console.log(name.value);
        console.log(location.value);
        console.log(phoneNumber.value);
        console.log(price);
        window.location.href = `/duan1/index.php?act=vnpay&price=${Number(price)}&name=${name.value.toString()}&location=${location.value.toString()}&phone=${phoneNumber.value.toString()}`;
    }
    else {
        alert("Vui lòng nhập đầy đủ thông tin đơn hàng !");
    }
}

function goToMyOrder(action) {
    if (action == 'cancelConfirming') {
        window.location.href = `../duan1/index.php?act=${action}`;
    }
    else {
        event.preventDefault();
        window.location.href = `../duan1/index.php?act=${action}`;
    }

}

function backToPage() {
    event.preventDefault();
    window.location.href = "../duan1/index.php";
}

function goToBill(id) {
    event.preventDefault();
    window.location.href = "index.php?act=bill&orderID=" + id;
}

function confirmOrder(orderID) {
    console.log(orderID);
    var hehe = confirm("Bạn chắc chắn đã nhận được đơn hàng ?, sau khi xác nhận sẽ không thể hoàn tác.");
    if (hehe) {
        $.ajax({
            type: 'POST',
            url: 'app/home/modules/donhang/ajaxConfirm.php',
            data: {
                orderID: Number(orderID)
            },
            success: function (response) {
                alert("Xong");
                
                window.location.href="index.php?act=success";
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}


//lien quan tới trangthaidonhang.php
document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".header__menu ul li");
    menuItems.forEach(item => {
        item.addEventListener("click", function () {
            // Remove "active" class from all items
            menuItems.forEach(item => item.classList.remove("active"));
            // Add "active" class to the clicked item
            this.classList.add("active");
        });
    });
});

function ajaxFilter(min, max) {
    $.ajax({
        type: "POST",
        url: "app/home/modules/trangsanpham/ajaxRangePrice.php",
        data: {
            min: Number(min),
            max: Number(max)
        },
        success: function (response) {
            console.log(1);

            $(".row.p.o.v").html(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

