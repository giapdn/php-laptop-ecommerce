<?php
include "./views/header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'lienhe':
            include "./controllers/lienhe.php";

            break;

            case 'trangsanpham':
                include "./controllers/trangsanpham.php";
    
                break;   

                case 'tintuc':
                    include "./controllers/tintuc.php";
        
                    break; 

                    case 'giohang':
                        include "./controllers/giohang.php";
            
                        break; 
       

        default:
            include "./controllers/body.php";
            break;
    }
} else {
    include "./controllers/body.php";
}






include "./views/footer.php";
?>