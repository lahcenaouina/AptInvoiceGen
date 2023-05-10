<?php

namespace classes;

use PDO;

Abstract class Login extends DBH
{
    protected function Uid_EmailTaken($uid_email)
    {
        $sql ='SELECT user_email,user_username FROM users WHERE user_username=? or user_email=?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$uid_email, $uid_email])){
            $stmt = null;
            header("location: ../view/login.php?Error=StmtFailed");
            exit();
        }

        if ($stmt->rowCount()>0) {
            return true;
        }
        return false;

    }

    protected function GetUser($uid_email)
    {
        $sql ='SELECT user_email,user_username,user_password FROM users WHERE user_username=? or user_email=?';
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$uid_email,$uid_email])){
            $stmt  = null;
            header("location: ../view/login.php?Error=StmtFailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    protected function GetFullData($uid_email)
    {
        $sql ='SELECT * FROM users WHERE user_username=? or user_email=?';
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$uid_email,$uid_email])){
            $stmt  = null;
            header("location: ../view/login.php?Error=StmtFailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}