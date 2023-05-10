<?php

declare(strict_types=1);
require_once '../vendor/autoload.php';
use classes\LoginController;

if (isset($_POST["Smt"])) {
    //Grab data
    $uid_email = $_POST["uid-email"];
    $pwd = $_POST["pwd"];

    $login = new LoginController($uid_email, $pwd);
    $login->ConnectUser();


}else {
    require "../view/Header.php";
    require "../view/Navbar.php";
    require "../view/PageNotFound.php";
    die();
}