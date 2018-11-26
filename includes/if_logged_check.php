<?php
if( !isset($_SESSION['user_id']) ){
    header("location:login_page.php");
    exit();
}
?>