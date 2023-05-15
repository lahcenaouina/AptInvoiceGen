<?php

declare(strict_types=1);
require "Header.php";
require "Navbar.php";
require "sidebar.php";


require_once '../vendor/autoload.php';
require "../classes/UserController.php";

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
        <div style ="background:white; color:black ; border-radius:9px;" class="p-4 sm:ml-64">
                <?php
                if ($type == UserConroller::ADMIN) : ?>

                        <form style="border: none;" action="../include/signup.inc.php" method="get">
                                <div class="mb-1">
                                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                        <input name="username" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-1">
                                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                                        <input name="email" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-1">
                                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tele</label>
                                        <input name="tele" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>

                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imm</label>
                                <select required name="Imm" id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=""></option>"

                                        <?php
                                        $Imm = new GestionData();

                                        $list_Imm = $Imm->GetAllImm();
                                        foreach ($list_Imm as $Imm) : ?>
                                                <option value="<?= $Imm["Imm_name"] ?>"><?= $Imm["Imm_name"] ?></option>"
                                        <?php
                                        endforeach;
                                        ?>
                                </select>
                                <div class="mb-1">
                                        <label for="-" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Num Appartemet</label>
                                        <input name="Num_house" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-1">
                                        <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mots de pass</label>
                                        <input name="pwd" type="text" id="repeat-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>

                                </div>
                                <button type="Submit" name="Submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter</button>

                        </form>


                                       
        
                        <?php
                endif;
                        ?>
        </div>

<?php

} else {
        require "../view/Header.php";
        require "../view/Navbar.php";
        require "../view/PageNotFound.php";
        die();
}
?>