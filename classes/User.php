<?php 

namespace classes;
use PDO ;
abstract class User extends DBH {
       
        protected function GetDataDb($username , $email){
                $sql = "SELECT user_id,user_username,user_email FROM users Where user_username=? and user_email=?";
                $stmt = $this->connect()->prepare($sql);
                if (!$stmt->execute([$username , $email])){
                        $stmt = null ; 
                        header("location: view/Clients.php?Error=STMTFAILD");
                        die();
                }
                return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        protected function GetAllUsers(){
                $sql = "SELECT `user_id`, `user_username`, `user_email`, `type`, `tele`, `Imm`, `Num_house` FROM `users` WHERE 1";
                $stmt = $this->connect()->prepare($sql);
                if (!$stmt->execute()){
                        $stmt = null ; 
                        header("location: view/Clients.php?Error=STMTFAILD");
                        die();
                }
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

}       