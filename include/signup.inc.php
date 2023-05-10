<?php
if (isset($_GET["submit"])){
    require __DIR__ . DIRECTORY_SEPARATOR . "../vendor/autoload.php";

    $username = $_GET["username"];
    $email = $_GET["email"];
    $pwd = $_GET["pwd"];
    $pwd_rep = $_GET["pwd-rep"];

    $Signup = new \classes\SignUpController($username, $email, $pwd, $pwd_rep);
    $Signup->SignUpUser();

    require "../view/loading.php";

    header("location: ../view/login.php?msg=Succeed");
    exit();



}else {
    header("location: ../index.php");
    exit();
}