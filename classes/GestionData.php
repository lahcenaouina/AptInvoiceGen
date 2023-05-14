<?php 

namespace classes;
use PDO;

class GestionData extends DBH {
     public function GetAllImm(){
        $sql = "SELECT * FROM `imm` WHERE 1";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute()){
                $stmt = null ; 
                header("location: view/Clients.php?Error=STMTFAILD");
                die();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

     }   

}