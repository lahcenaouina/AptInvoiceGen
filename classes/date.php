<?php 

namespace classes;
use PDO;

class date extends DBH {
     public function GetAllyears(){
        $sql = "SELECT * FROM `years` WHERE 1";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute()){
                $stmt = null ; 
                header("location: view/Clients.php?Error=STMTFAILD");
                die();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

     }   
     public function GetAllMonth(){
        $sql = "SELECT * FROM `months` WHERE 1";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute()){
                $stmt = null ; 
                header("location: view/Clients.php?Error=STMTFAILD");
                die();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

     }
}