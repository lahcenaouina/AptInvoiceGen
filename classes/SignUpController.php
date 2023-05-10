<?php

declare(strict_types=1);
namespace classes;

class SignUpController extends Signup
{
    private $username ;
    private $email;
    private $pwd;
    private $pwd_rep;

    public function __construct($username , $email , $pwd , $pwd_rep)
    {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwd_rep = $pwd_rep;
    }

    public function SignUpUser()
    {
        if ($this->emptyInputs() == false) {
            header("location: ../view/Signup.php?Error=EmptyInput");
            exit();
        }
        if ($this->InvalidUid() == false) {
            header("location: ../view/Signup.php?Error=InvalidUid");
            exit();
        }
        if ($this->InvalidEmail() == false) {
            header("location: ../view/Signup.php?Error=InvalidEmail");
            exit();
        }
        if ($this->UidEmailTaken() == false) {
            header("location: ../view/Signup.php?Error=UidEmailAlreadyTaken");
            exit();
        }
        if ($this ->PwdMatch() == false) {
            header("location: ../view/Signup.php?Error=pwdNotMatched");
            exit();
        }
        $this->SetUser($this->username , $this->email , $this->pwd);
    }

    private function emptyInputs():bool{
        if(empty($this->username) ||empty($this->email) ||empty($this->pwd) || empty($this->pwd_rep)){
            return false;
        }
        return true ;
    }

    private function InvalidUid()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            return false  ; // Invalid
        }
        return true ; //valid
    }

    private function InvalidEmail()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function PwdMatch()
    {
        //false : Matched
        //true : Not Matched
        return  !($this->pwd !== $this->pwd_rep);
    }

    private function UidEmailTaken()
    {
        if (!$this->checkUser($this->username, $this->email)) {
            return false;
        }
        return true ;
    }



}