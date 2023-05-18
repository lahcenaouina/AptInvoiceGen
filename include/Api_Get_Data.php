<?php

use classes\GestionData;
use classes\UserView;

require "../vendor/autoload.php";


if ( isset($_GET["token"]) &  ($_GET["token"] == "A123123") ){
         $_GET["Imm"];
        $Imm = new GestionData();
        $list_Imm = $Imm->GetAllImm();


        $names = new UserView();


        foreach($list_Imm as $Imm) {
               if ($_GET["Imm"] == $Imm["Imm_name"]){
                $list = $names->GetClientsbyImm((String) $Imm["Imm_name"]);
                // for($i=0 ; $i < count($list) ; $i++) {
                //         echo $list[$i]["user_username"].',';
                // }
                $filename =__DIR__.DIRECTORY_SEPARATOR."../json/List_Names_by_Imm.json";
                echo $filename;
                $json_names = json_encode($list);
                file_put_contents($filename ,$json_names);
                
               }

        }
        echo file_get_contents($filename);

        
}else {
        
        header("location: ../view/PageNotFound.php");
        exit();
}