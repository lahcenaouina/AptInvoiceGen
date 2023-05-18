<?php

use classes\FactureController;

if (isset($_GET["Submit"])){
    require "../view/Header.php";
    require __DIR__ . DIRECTORY_SEPARATOR . "../vendor/autoload.php";

    $username = $_GET["username"];
    $Imm = $_GET["Imm"];
    $Num_house = $_GET["Num_house"];
    $year = $_GET["y"];
    $month = $_GET["m"];
    $money = $_GET["money"];

    $facture = new FactureController($username ,$Imm, $Num_house , $year,$month ,$money);
    $facture->AddNewFact();
    
    require "../view/loadingFacture.php";

    header("refresh: 1; url =../view/AddNewFacture.php?name=$username?m=$money");
    exit();



}else {
    header("location: ../index.php");
    exit();
}