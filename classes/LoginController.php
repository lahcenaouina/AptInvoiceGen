<?php

namespace classes;

class LoginController extends Login
{
    private $uid_email;
    private $pwd;

    public function __construct($uid_email, $pwd)
    {
        $this->uid_email = $uid_email;
        $this->pwd = $pwd;
    }

    public function ConnectUser()
    {
        if ($this->emptyInputs() === false ) {
            header("location: ../view/login.php?Error=Empty Input");
            exit();
        }
        if ($this->CheckUidEmail() === false) {
            header("location: ../view/login.php?Error=Uid Not Available");
            exit();
        }
        $data = $this->GetUser($this->uid_email);
        var_dump($data);

        if ($data["user_email"] === $this->uid_email or $data["user_username"] === $this->uid_email) {
            $CheckPwd = password_verify($this->pwd, $data["user_password"]);
            if (!$CheckPwd) {
                header("location: ../view/login.php?Error=Password Not Correct");
                exit();
            }else {
                session_start();
                $FullData = $this->GetFullData($this->uid_email);
                $_SESSION["username"] = $FullData["user_username"];
                $_SESSION["email"] = $FullData["user_email"];
                $_SESSION["id"] = $FullData["user_id"];
                $_SESSION["type"] = "User";
                header("location: ../view/home.php");
                exit();
            }
        }

    }

    private function emptyInputs():bool{
        if(empty($this->uid_email) ||empty($this->pwd) ){
            return false;
        }
        return true ;
    }

    private function CheckUidEmail():bool
    {
        return $this->Uid_EmailTaken($this->uid_email);
    }




}