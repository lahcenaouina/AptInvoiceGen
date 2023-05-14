<?php

namespace classes;

class UserConroller extends User
{       
        const USER = "USER";
        const ADMIN = "ADMIN";
        private $username; 
        private $email;
        private $type ; 

        public function __construct($username, $email , $type){
                $this->username = $username;
                $this->email = $email;
                $this->type = $type;
        }

        public function GetUserData(){
                if ($this->type == self::ADMIN){
                        return $this->GetDataDb($this->username , $this->email);
                }else {
                        return [];
                }
        }
        public function GetAllClients(){
                if ($this->type == self::ADMIN){
                        return $this->GetAllUsers();
                }else {
                        return [];
                }
        }


}