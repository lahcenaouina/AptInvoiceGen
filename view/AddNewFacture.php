<?php

declare(strict_types=1);
require "Header.php";
require "Navbar.php";
require "sidebar.php";


require_once '../vendor/autoload.php';
require "../classes/UserController.php";

use classes\date;
use classes\GestionData;
use classes\UserConroller;

if (isset($_SESSION["username"])) {
        //Grab data
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
        $type = $_SESSION["type"];

        $user = new UserConroller($username, $email, $type);
        ?>
        <link rel="stylesheet" href="../css/tableClients.css">
        <div style="background:white; color:black ; border-radius:9px;" class="p-4 sm:ml-64">
                <?php
                if ($type == UserConroller::ADMIN): ?>

                        <form style="border: none;" action="../include/AddNewFacture.inc.php" method="get">

                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imm</label>
                                <select id="Imm" required name="Imm" id="small"
                                        class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value=""></option>"

                                        <?php
                                        $Imm = new GestionData();

                                        $list_Imm = $Imm->GetAllImm();
                                        foreach ($list_Imm as $Imm): ?>
                                                <option value="<?= $Imm["Imm_name"] ?>"><?= $Imm["Imm_name"] ?></option>"
                                                <?php
                                        endforeach;
                                        ?>
                                </select>
                                <div class="mb-1">
                                        <label for="-" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Num
                                                Appartemet</label>
                                        <input name="Num_house" type="number" style="height:40px"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                required>
                                </div>

                                <div class="mb-1">
                                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                        <select id="Nomf" required name="username" id="small"
                                                class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Choisir Nom</option>
                                                
                                        </select>
                                </div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">montant d'argent
                                        :</label>

                                <select required name="money" id="small"
                                        class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value=""></option>"

                                        <option value="100">100.00 MAD</option>"
                                        <option value="50">50.00 MAD</option>"
                                </select>

                                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">choisissez un
                                        mois</label>
                                <select name="m" id="small"
                                        class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Exemple : Janv</option>
                                        <?php
                                        $months = new date();
                                        $list_month = $months->GetAllMonth();
                                        foreach ($list_month as $month): ?>
                                                <option value="<?= $month["months_name"] ?>"><?= $month["months_name"] ?></option>"
                                                <?php
                                        endforeach;
                                        ?>
                                </select>
                                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">choisissez un
                                        anne</label>
                                <select name="y" id="small"
                                        class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Exemple : 2023</option>
                                        <?php
                                        $years = new date();
                                        $list_years = $years->GetAllyears();

                                        foreach ($list_years as $year): ?>
                                                <option value="<?= $year["year_num"] ?>"><?= $year["year_num"] ?></option>"
                                                <?php
                                        endforeach;
                                        ?>
                                </select>
                                <button style ="background: green;" type="Submit" name="Submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter une facture</button>

                                

                        </form>




                        <?php
                endif;
                ?>
        </div>
                <script src="../js/Api_get_Names.js"></script>
        <?php

} else {
        require "../view/Header.php";
        require "../view/Navbar.php";
        require "../view/PageNotFound.php";
        die();
}
?>