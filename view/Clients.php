<?php

declare(strict_types=1);
require "Header.php";
require "Navbar.php";
require "sidebar.php";


require_once '../vendor/autoload.php';
require "../classes/UserController.php";

use classes\UserConroller;

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
                        <?php
                        if (isset($_GET["msg"])) :?>
                                
                                <div id="alert-border-3" class="flex p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                                <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <div class="ml-3 text-sm font-medium">
                                  Client <?=$_GET["msg"] ?> Bien ajouter 
                                </div>
                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                                  <span class="sr-only">Dismiss</span>
                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>
                                
                        <?php
                        endif;
                        ?>
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
                                        sort($clients);
                                        for ($i = 0; $i < count($clients); $i++) {
                                                
                                                if ($clients[$i]["type"] == UserConroller::ADMIN) {
                                                        $clients[$i]["user_username"] .= " <span class=\"bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300\">Responsable</span>";
                                                }
                                        ?>
                                                <tr class="rowdata">
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