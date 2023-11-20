<?php
include "app/home/views/header.php";
if (isset($_GET["act"])) {
    switch ($variable) {
        case 'value':
            # code...
            break;
        
        default:
            # code...
            break;
    }
}
else {
    include "app/home/controllers/body.php";
}
include "app/home/views/footer.php";
?>

