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
                                                <tr class="rowdata">
                                                        <td data-label="ID"><?=$clients[$i]["Imm"] . $clients[$i]["Num_house"] ?></td>
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