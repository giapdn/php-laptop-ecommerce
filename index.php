<?php
session_start();
include "./app/home/models/pdo.php";
include "app/home/views/structure/header.php";
include "./app/home/modules/models/methods.php";

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
                $id = $_GET["id_sanPham"];
                $check = "SELECT * FROM yeuthich WHERE id_sanPham = '$id'";
                $flag = pdo_query($check);
                if (empty($flag)) {
                    $user = $_SESSION["username"];
                    $sql = "INSERT INTO `yeuthich`(`userName`, `id_sanPham`) VALUES ('$user','$id')";
                    pdo_execute($sql);
                    echo "<script>alert('Thêm vào yêu thích thành công!')</script>";
                    echo "<script>window.location.href='../duan1/index.php?act=yeuthich'</script>";
                }
            } else {
                echo "<script>alert('Đăng nhập để thêm sản phẩm !')</script>";
                echo "<script>window.location.href='../duan1/index.php?act=logIn'</script>";
            }
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
        case 'success':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'canceled':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'lichsu':
            include "app/home/modules/donhang/trangthaidonhang.php";
            break;
        case 'bill':
            if (isset($_GET["vnp_TxnRef"])) {
                echo 1;
                // $username = $_SESSION["username"];
                // $sql = "SELECT * FROM users WHERE userName = '$username'";
                // $result = pdo_query_one($sql);
                // extract($result);
                // $madonhang = $_GET["vnp_TxnRef"];
                // $giadonhang = $_GET["vnp_Amount"];
                // $ngaytt = $_GET["vnp_CreateDate"];
                // $pttt = $_GET["vnp_Command"];
                // $query_insert = "INSERT INTO `donhang`
                //     (`userName`, `ngayDatHang`, `tongGiaDonHang`, `pttt` `tenNguoiNhan`, `diaChi`, `SDT`) 
                //     VALUES 
                //     ('$username', NOW(), '$giadonhang', '$pttt', '$name', 'Hà Nội', '$SDT');
                // ";
                // pdo_execute($query_insert);
            } else {
                include "app/home/modules/bill/bill.php";
            }
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
                echo "<script>alert('Giỏ hàng của bạn đang trống !, hãy thêm sản phẩm bạn muốn mua vào giỏ hàng và tiến hành thanh toán !')</script>";
                echo "<script>window.location.href='../duan1/index.php?act=giohang'</script>";
            }
            break;
        case 'defaultPay':
            include "app/home/modules/thanhtoan/thanhtoan.php";
            break;
        case 'momo':
            include "app/home/modules/thanhtoan/thanhtoan.php";
            break;
        case 'vnpay':
            $sum = $_GET["cartSum"];
            // include "app/home/modules/thanhtoan/thanhtoan.php";
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/duan1/index.php?act=bill";
            $vnp_TmnCode = "POKN2CIK"; //Mã website tại VNPAY 
            $vnp_HashSecret = "AXLHALPCYGBUIYLBPWVMXMDXHESWNTNR"; //Chuỗi bí mật

            $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "billInfor";
            $vnp_OrderType = "billType";
            $vnp_Amount = (int)$sum * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];
            //Billing
            // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            // $vnp_Bill_Email = $_POST['txt_billing_email'];
            // $fullName = trim($_POST['txt_billing_fullname']);
            // if (isset($fullName) && trim($fullName) != '') {
            //     $name = explode(' ', $fullName);
            //     $vnp_Bill_FirstName = array_shift($name);
            //     $vnp_Bill_LastName = array_pop($name);
            // }
            // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
            // $vnp_Bill_City = $_POST['txt_bill_city'];
            // $vnp_Bill_Country = $_POST['txt_bill_country'];
            // $vnp_Bill_State = $_POST['txt_bill_state'];
            // // Invoice
            // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
            // $vnp_Inv_Email = $_POST['txt_inv_email'];
            // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
            // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
            // $vnp_Inv_Company = $_POST['txt_inv_company'];
            // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
            // $vnp_Inv_Type = $_POST['cbo_inv_type'];
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
                // "vnp_ExpireDate" => $vnp_ExpireDate,
                // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                // "vnp_Bill_Email" => $vnp_Bill_Email,
                // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                // "vnp_Bill_Address" => $vnp_Bill_Address,
                // "vnp_Bill_City" => $vnp_Bill_City,
                // "vnp_Bill_Country" => $vnp_Bill_Country,
                // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                // "vnp_Inv_Email" => $vnp_Inv_Email,
                // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                // "vnp_Inv_Address" => $vnp_Inv_Address,
                // "vnp_Inv_Company" => $vnp_Inv_Company,
                // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                // "vnp_Inv_Type" => $vnp_Inv_Type
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            // }

            //var_dump($inputData);
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
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_GET["act"]) && $_GET["act"] == "vnpay") {
                // header('Location: ' . $vnp_Url);
                echo "<script>window.location.href='" . $vnp_Url . "'</script>";
                // die();
            } else {
                echo "Lỗi";
                // echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
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
        default:
            include "app/home/views/trangchu.php";
            break;
    }
} else {
    include "app/home/views/trangchu.php";
}
include "app/home/views/structure/footer.php";
