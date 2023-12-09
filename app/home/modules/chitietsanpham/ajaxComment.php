<?php
session_start();
include "../models/pdo.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_SESSION["username"];
    $comment = $_POST["comment"];
    $prodID = $_POST["prodID"];

    $sql = "INSERT INTO binhluan (noidung_binhLuan, ngay_binhLuan, userName, id_sanPham) VALUES ('$comment', NOW(), '$user', '$prodID');";
    pdo_execute($sql);

    $query = "SELECT binhluan.*, users.* 
        FROM binhluan 
        JOIN users ON binhluan.userName = users.userName
        WHERE id_sanPham = '$prodID'
    ";
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
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
