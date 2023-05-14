<?php

namespace classes;

Abstract class Signup extends DBH
{
    /**
     * Summary of SetUser
     * @param mixed $username
     * @param mixed $email
     * @param mixed $tele
     * @param mixed $Imm
     * @param mixed $Num_house
     * @param mixed $pwd
     * @return void
     */
    protected function SetUser($username , $email , $tele ,$Imm , $Num_house,$type, $pwd)
    {
        $sql = "`users`(`user_username`, `user_email`, `user_password`, `type`, `tele`, `Num_house`, `Imm`)";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute([$username , $email , $pwd ,$type , $tele, $Num_house , $Imm])) {
            $stmt = null;
            header("location: ../view/signup.php?Error=STMTFAILED");
            exit();
        }
        $stmt = null;


    }
    protected function checkUser($username , $email)
    {
        $sql = "SELECT user_username FROM users WHERE user_username= ? or user_email= ?";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$username, $email])) {
            $stmt = null ;
            header("location: ../view/Signup.php?error=stmtFailed");
            exit();
        }

        if ($stmt->rowCount()>0) {
            return false;
        }
        return true;

    }


}