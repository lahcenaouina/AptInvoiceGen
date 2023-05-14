<?php

require_once "Header.php";
if (isset($_SESSION["username"]) and isset($_SESSION["email"]) and $_SESSION["type"]){
    require_once "Navbar.php";
    ?>

<?php
}else {
    require "../view/Header.php";
    require "../view/Navbar.php";
    require "../view/PageNotFound.php";
    
    die();
}
?>


