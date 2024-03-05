<?php 

    session_start();
    unset($_SESSION["cart"]);
    unset($_SESSION["dangNhap"]);
    header("Location: TrangChu.php");
exit();


?>