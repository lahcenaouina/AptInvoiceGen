<?php

declare(strict_types=1);
require "Header.php";
require "Navbar.php";
require "sidebar.php";


require_once '../vendor/autoload.php';
require "../classes/UserController.php";

use classes\date;
use classes\UserConroller;
use classes\GestionData;

if (isset($_SESSION["username"])) {
        //Grab data

        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
        $type = $_SESSION["type"];

        $user = new UserConroller($username, $email, $type);
?>
        <link rel="stylesheet" href="../css/tableClients.css">

        <div class="p-4 sm:ml-64">
                <?php
                if ($type == UserConroller::ADMIN) : ?>
                        <div id="Search">

                                <!-- Modal toggle -->
                                <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                        Search...
                                </button>
                                <br>
                                <!-- Main modal -->
                                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <form action="../include/SearchFacture.inc.php" method="get">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" class="absolute mb-2 w-8 bg-blue-800 h-5top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="px-6 py-6 lg:px-8">
                                                                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisissez une année</label>
                                                                <select name="year" id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option disabled>Exemple : 2022</option>
                                                                        <?php
                                                                        $years = new date();
                                                                        $list_years = $years->GetAllyears();
                                                                        foreach ($list_years as $year) : ?>
                                                                                <option value="<?= $year["year_num"] ?>"><?= $year["year_num"] ?></option>"
                                                                        <?php
                                                                        endforeach;
                                                                        ?>
                                                                </select>
                                                                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">choisissez un mois</label>
                                                                <select name="month" id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected disabled>Exemple : Janv</option>
                                                                        <?php
                                                                        $months = new date();
                                                                        $list_month = $months->GetAllMonth();
                                                                        foreach ($list_month as $month) : ?>
                                                                                <option value="<?= $month["months_name"] ?>"><?= $month["months_name"] ?></option>"
                                                                        <?php
                                                                        endforeach;
                                                                        ?>
                                                                </select>
                                                                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">choisissez immeuble</label>

                                                                <select name="Imm" id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected disabled>Exemple : B</option>
                                                                        <?php
                                                                        $Imm = new GestionData();
                                                                        
                                                                        $list_Imm = $Imm->GetAllImm();
                                                                        foreach ($list_Imm as $Imm) : ?>
                                                                                <option value="<?= $Imm["Imm_name"] ?>"><?= $Imm["Imm_name"] ?></option>"
                                                                        <?php
                                                                        endforeach;
                                                                        ?>
                                                                </select>
                                                                <div>
                                                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">numéro d'immeuble</label>
                                                                        <input type="text" id="first_name" name="Num_imm_s" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Exmeple : B21">
                                                                </div>
                                                                <div>
                                                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                                                        <input type="text" id="first_name" name="username_s" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Exemple : Ahmed Ait">
                                                                </div>
                                                                <button type="Submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Chercher</button>

                                                        </div>
                                                </div>
                                                </form>
                                        </div>

                                </div>
                                <table>
                                        <thead>
                                                <tr>
                                                        <th scope="col">REF</th>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">immeuble</th>
                                                        <th scope="col">numero immeuble</th>
                                                        <th scope="col">Telephone</th>
                                                        <!-- <th scope="col">Email</th> -->

                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $clients = $user->GetAllClients();
                                                for ($i = 0; $i < count($clients); $i++) {
                                                        if ($clients[$i]["type"] == UserConroller::ADMIN) {
                                                                $clients[$i]["user_username"] .= " <span class=\"bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300\">Responsable</span>";
                                                        }
                                                ?>
                                                        <tr>
                                                                <td data-label="ID"><?= $clients[$i]["Imm"] . $clients[$i]["Num_house"] ?></td>
                                                                <td data-label="NOM"><?= $clients[$i]["user_username"] ?></td>
                                                                <td data-label="IMM"><?= $clients[$i]["Imm"] ?></td>
                                                                <td data-label="NUMIMM"><?= $clients[$i]["Num_house"] ?></td>
                                                                <td data-label="TEL"><?= $clients[$i]["tele"] ?></td>
                                                                <!-- <td data-label="Email"><?= $clients[$i]["user_email"] ?></td> -->

                                                        </tr>
                                                <?php
                                                }
                                                ?>


                                        </tbody>
                                </table>
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