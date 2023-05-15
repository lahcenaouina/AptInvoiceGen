<?php
if (isset($_GET["Submit"])){
    require __DIR__ . DIRECTORY_SEPARATOR . "../vendor/autoload.php";

    $username = $_GET["username"];
    $email = $_GET["email"];
    $Imm = $_GET["Imm"];
    $Num_house = $_GET["Num_house"];
    $type = "USER";
    $tele = $_GET["tele"];
    $pwd = $_GET["pwd"];
    $pwd_rep = $_GET["pwd"];
    

    $Signup = new \classes\SignUpController($username,$email , $Imm ,$Num_house , $tele ,$type , $pwd ,$pwd_rep);
    $Signup->SignUpUser();

    require "../view/loading.php";

    header("location: ../view/Clients.php?msg=$username");
    exit();



}else {
    header("location: ../index.php");
    exit();
}