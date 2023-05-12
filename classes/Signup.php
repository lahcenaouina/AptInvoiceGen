<?php

namespace classes;

Abstract class Signup extends DBH
{
    protected function SetUser($uid , $email , $pwd)
    {
        $sql = "INSERT INTO users( user_username, user_email, user_password) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute([$uid, $email,$pwdHashed])) {
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