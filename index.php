<?php
session_start();
include "app/admin/models/pdo.php";
include "app/admin/models/pdo.php";
include "app/home/views/structure/header.php";
include "app/home/modules/models/methods.php";
include "app/home/modules/models/methods.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'yeuthich':
            include "app/home/views/yeuthich.php";
            break;
        case 'delyeuthich':
            $id = $_GET["id_sanPham"];
            $user = $_SESSION["username"];
            $sql = "DELETE FROM `yeuthich` WHERE `userName` = '$user' AND `id_sanPham` = '$id'";
            pdo_execute($sql);
            echo "<script>alert('Xoá thành công !')</script>";
            echo "<script>window.location.href='../duan1/index.php?act=yeuthich'</script>";
            break;
        case 'addyeuthich':
            if (isset($_SESSION["username"])) {
                $user = $_SESSION["username"];
                $user = $_SESSION["username"];
                $id = $_GET["id_sanPham"];
                $check = "SELECT * FROM ``yeuthich`` WHERE `userName` = '$user' AND ``userName` = '$user' AND `id_sanPham`` = '$id'";
                $flag = pdo_query($check);
                if (empty($flag)) {
                    $sql = "INSERT INTO `yeuthich`(`userName`, `id_sanPham`) VALUES ('$user','$id')";
                    pdo_execute($sql);
                    echo "<script>alert('Thêm vào yêu thích thành công!')</script>";
                    echo "<script>window.location.href='../duan1/index.php?act=yeuthich'</script>";
                } else {
                    echo "<script>alert('Sản phẩm đã có trong mục yêu thích !')</script>";
                    echo "<script>window.location.href='../duan1/index.php?act=yeuthich'</script>";
                } else {
                    echo "<script>alert('Sản phẩm đã có trong mục yêu thích !')</script>";
                    echo "<script>window.location.href='../duan1/index.php?act=yeuthich'</script>";
                }
            } else {
                echo "<script>alert('Đăng nhập để thêm sản phẩm !')</script>";
                echo "<script>window.location.href='../duan1/index.php?act=logIn'</script>";
            }
            break;
        case 'thongbao':
            include "app/home/modules/thongbao/thongbao.php";
            break;
        case 'thongbao':
            include "app/home/modules/thongbao/thongbao.php";
            break;
        case 'page':
            include "app/home/views/page.php";
            break;
        case 'pending':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'shipping':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'shipped':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'shipped':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'success':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'cancelConfirming':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'cancelConfirming':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'canceled':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'lichsu':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'trangsanpham':
            include "app/home/modules/trangsanpham/trangsanpham.php";
            break;
        case 'listSPbyDM':
            include "app/home/modules/trangsanpham/trangsanpham.php";
            break;
        case 'hotSearch':
            include "app/home/modules/trangsanpham/trangsanpham.php";
            break;
        case 'chitietsanpham':
            include "app/home/modules/chitietsanpham/chitietsanpham.php";
            break;
        case 'thanhtoan':
            if (isset($_GET["paynow"])) {
                include "app/home/modules/thanhtoan/thanhtoan.php";
            } else {
                $id = $_SESSION["username"];
                $sql = "SELECT SUM(sanpham.giaSanPham * giohang.soluong) AS sumCart
                    FROM giohang
                    JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                    WHERE giohang.userName = '$id';
                ";
                $result = pdo_query_one($sql);
                if ($result["sumCart"] != 0) {
                    include "app/home/modules/thanhtoan/thanhtoan.php";
                } else {
                    // echo "<script>alert('Giỏ hàng của bạn đang trống !, hãy thêm sản phẩm bạn muốn mua vào giỏ hàng và tiến hành thanh toán !')</script>";
                    echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
                }
            }
            break;
        case 'bill':
            # 9704198526191432198
            # NGUYENVANA
            # 07/15
            $username = $_SESSION["username"];
            #vnpay
            if (isset($_GET["cartTypeVnpay"])) { 
                $name = $_GET["name"];
                $location = $_GET["location"];
                $phone = $_GET["phone"];
                $decodedName = urldecode($name);
                $decodedLocation = urldecode($location);
                $decodedPhoneNumber = urldecode($phone);
                $orderPrice = $_GET["vnp_Amount"] / 100;
                $push_order = "INSERT INTO `donhang` (`userName`, `ngayDatHang`, `tongGiaDonHang`, `pttt`, `tenNguoiNhan`, `diaChi`, `SDT`) VALUES ('$username', NOW(), '$orderPrice', 'Vnpay', '$decodedName', '$decodedLocation', '$decodedPhoneNumber');";
                pdo_execute($push_order);
                get_Del_Cart($username, getOrderID());
                include "app/home/modules/bill/bill.php";

                #Mua bình thường
            } elseif (isset($_GET["prodID"])) {
                $name = $_GET["name"];
                $location = $_GET["location"];
                $phone = $_GET["phone"];
                $decodedName = urldecode($name);
                $decodedLocation = urldecode($location);
                $decodedPhoneNumber = urldecode($phone);
                $orderPrice = $_GET["vnp_Amount"] / 100;
                $push_order = "INSERT INTO `donhang` (`userName`, `ngayDatHang`, `tongGiaDonHang`, `pttt`, `tenNguoiNhan`, `diaChi`, `SDT`) VALUES ('$username', NOW(), '$orderPrice', 'Vnpay', '$decodedName', '$decodedLocation', '$decodedPhoneNumber');";
                pdo_execute($push_order);
                $prodID = $_GET["prodID"];
                $soluong = $_GET["soluong"];
                $_getProd = "SELECT * FROM sanpham WHERE id_sanPham = '$prodID'";
                $result = pdo_query_one($_getProd);
                $orderID = getOrderID();
                extract($result);
                if (isset($_GET["gb"])) {
                    $gb = $_GET["gb"];
                    $push_ctdh = "INSERT INTO chitietdonhang(id_donHang, soLuong, id_sanPham, GB) VALUES ('$orderID', '$soluong', '$prodID', '$gb')";
                    pdo_execute($push_ctdh);
                } else {
                    $sql = "SELECT store FROM sanpham WHERE id_sanPham = '$prodID'";
                    $v = pdo_query_one($sql);
                    extract($v);
                    $push_ctdh = "INSERT INTO chitietdonhang(id_donHang, soLuong, id_sanPham, GB) VALUES ('$orderID', '$soluong', '$prodID', '$store')";
                    pdo_execute($push_ctdh);
                }
                include "app/home/modules/bill/bill.php";

                #Hiện bill
            } else if (isset($_GET["orderID"])) {
                include "app/home/modules/bill/bill.php";

                #Momo
            } elseif (isset($_GET["momoPay"])) {
                $name = $_GET["name"];
                $location = $_GET["location"];
                $phone = $_GET["phone"];
                $amout = $_GET["amount"];
                $pttt = $_GET["orderType"];
                if (isset($_GET["payTypeMomo"]) && $_GET["payTypeMomo"] == 10) {
                    $push_order = "INSERT INTO `donhang` (`userName`, `ngayDatHang`, `tongGiaDonHang`, `pttt`, `tenNguoiNhan`, `diaChi`, `SDT`) VALUES ('$username', NOW(), '$amout', '$pttt', '$name', '$location', '$phone');";
                    pdo_execute($push_order);
                    get_Del_Cart($username, getOrderID());
                    include "app/home/modules/bill/bill.php";
                }
            }
            break;
        case 'defaultPay':
            include "app/home/modules/thanhtoan/thanhtoan.php";
            break;
        case 'vnpay':
            $vnp_Returnurl = "";
            $name = $_GET["name"];
            $location = $_GET["location"];
            $phoneNumber = $_GET["phone"];
            $encodedName = urlencode($name);
            $encodedLocation = urlencode($location);
            $encodedPhoneNumber = urlencode($phoneNumber);
            if (isset($_GET["prodID"]) && isset($_GET["soluong"])) {
                $prodID = $_GET["prodID"];
                $soluong = $_GET["soluong"];
                if (isset($_GET["gb"])) {
                    $gb = $_GET["gb"];
                    $vnp_Returnurl = "http://localhost/duan1/index.php?act=bill&name=" . $encodedName . "&location=" . $encodedLocation . "&phone=" . $encodedPhoneNumber . "&prodID=" . $prodID . "&soluong=" . $soluong . "&gb=" . $gb;
                } else {
                    $vnp_Returnurl = "http://localhost/duan1/index.php?act=bill&name=" . $encodedName . "&location=" . $encodedLocation . "&phone=" . $encodedPhoneNumber . "&prodID=" . $prodID . "&soluong=" . $soluong;
                }
            } else {
                $vnp_Returnurl = "http://localhost/duan1/index.php?act=bill&name=" . $encodedName . "&location=" . $encodedLocation . "&phone=" . $encodedPhoneNumber . "&cartTypeVnpay=" . 1;
            }

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            // $vnp_Returnurl = "http://localhost/duan1/index.php?act=bill&name=" . $encodedName . "&location=" . $encodedLocation . "&phone=" . $encodedPhoneNumber;
            $vnp_TmnCode = "POKN2CIK"; //Mã website tại VNPAY  POKN2CIK
            $vnp_HashSecret = "AXLHALPCYGBUIYLBPWVMXMDXHESWNTNR"; //Chuỗi bí mật AXLHALPCYGBUIYLBPWVMXMDXHESWNTNR

            $vnp_TxnRef = 'NewJeans' . 'NewJeans' . rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "billInfor";
            $vnp_OrderType = "billType";
            $vnp_Amount = $_GET["price"] * 100;
            $vnp_Amount = $_GET["price"] * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
            var_dump($inputData);
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
            var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_GET["act"]) && $_GET["act"] === "vnpay") {
            if (isset($_GET["act"]) && $_GET["act"] === "vnpay") {
                echo "<script>window.location.href='" . $vnp_Url . "'</script>";
            } else {
                echo json_encode($returnData);
                echo json_encode($returnData);
            }
            break;
        case 'tttk':
            echo "<script>window.location.href='app/home/modules/taikhoan/tttk.php'</script>";
            break;
        case 'logIn':
            echo "<script>window.location.href='app/home/modules/taikhoan/login.php'</script>";
            break;
        case 'logOut':
            session_destroy();
            echo "<script>window.location.href='../duan1/index.php'</script>";
            break;
        case 'giohang':
            if (isset($_SESSION["username"])) {
                include "app/home/modules/giohang/giohang.php";
            } else {
                echo "<script>alert('Đăng nhập để theo dõi giỏ hàng của bạn !')</script>";
                echo "<script>window.location.href='app/home/modules/taikhoan/login.php'</script>";
            }
            break;
        case 'addToCart':
            if (isset($_SESSION["username"])) {
                $id = $_GET["id_sanPham"];
                $user = $_SESSION["username"];
                $check = "SELECT * FROM giohang WHERE id_sanPham = '$id' AND userName = '$user'";
                $flag = pdo_query($check);
                if (empty($flag)) {
                    $user = $_SESSION["username"];
                    $sql = "INSERT INTO `giohang`(`userName`, `id_sanPham`) VALUES ('$user','$id')";
                    pdo_execute($sql);
                    echo "<script>alert('Thêm vào giỏ hàng thành công !')</script>";
                    echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
                } else {
                    $add = "UPDATE giohang SET soluong = soluong + 1 WHERE id_sanPham = '$id'";
                    pdo_execute($add);
                    echo "<script>alert('Tăng số lượng trong giỏ hàng thành công !')</script>";
                    echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
                }
            } else {
                echo "<script>alert('Đăng nhập để thêm sản phẩm !')</script>";
                echo "<script>window.location.href='../duan1/index.php?act=logIn'</script>";
            }
            break;
        case 'delFromCart':
            $id = $_GET["id_sanpham"];
            $user = $_SESSION["username"];
            $sql = "DELETE FROM `giohang` WHERE `userName` = '$user' AND `id_sanPham` = '$id'";
            pdo_execute($sql);
            echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
            break;
        case 'lienhe':
            include "app/home/views/more/lienhe.php";
            break;
        case 'capnhattk':
            if (isset($_POST["capnhat"])) {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $sdt = $_POST["sdt"];
                $sql = "UPDATE `users` SET `sdt`='$sdt', `email`='$email', `diachi`='$diachi' 
                WHERE `userName`='$username'";
                pdo_execute($sql);
                echo "<script>alert('Sửa thành công !')</script>";
                echo "<script>window.location.href='../duan1/index.php?act=tttk'</script>";
            }
        break;
        default:
            include "app/home/views/trangchu.php";
            break;
    }
} else {
    include "app/home/views/trangchu.php";
}
include "app/home/views/structure/footer.php";
