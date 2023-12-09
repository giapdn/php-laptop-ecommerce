<?php
// NGUYEN VAN A

// 9704 0000 0000 0018

// 03/07

// OTP

if (isset($_POST["payUrl"])) {
    $finalAmount = 0;
    $prodID = 0;
    if (isset($_POST["prodVariantPrice"])) {
        $finalAmount = $_POST["prodVariantPrice"];
    } elseif (isset($_POST["prodDefaultPrice"])) {
        $finalAmount = $_POST["prodDefaultPrice"];
    } else {
        $finalAmount = $_POST["cartTotal"];
    }
    if (isset($_POST["prodID"])) {
        $prodID = $_POST["prodID"];
    }
    $name = $_POST["name"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];


    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    $orderInfo = "Thanh toán qua MoMo";

    $amount = $finalAmount . '';
    $orderId = rand(00, 9999);

    $redirectUrl = "http://localhost/duan1/index.php?act=bill&momoPay=1&name=" . $name . "&location=" . $location . "&phone=" . $phone;
    $ipnUrl = "http://localhost/duan1/index.php?act=bill";
    $extraData = "";




    $partnerCode = $partnerCode;
    $accessKey = $accessKey;
    $serectkey = $secretKey;
    $orderId = $orderId; // Mã đơn hàng
    $orderInfo = $orderInfo;
    $amount = $amount;
    $ipnUrl = $ipnUrl;
    $redirectUrl = $redirectUrl;
    $extraData = $extraData;

    $requestId = time() . "";
    $requestType = "payWithATM";
    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $serectkey);
    $data = array(
        'partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature
    );
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    // header('Location: ' . $jsonResult['payUrl']);
    echo '<script>window.location.href="' . $jsonResult["payUrl"] . '"</script>';
} else {
    echo 0;
}

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
