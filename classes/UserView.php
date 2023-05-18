<?php

namespace classes;

class UserView extends User
{       

        public function GetAllClients(){
                        return $this->GetAllUsers();

        }

        public function GetClientsbyImm($Imm) {
                return $this->GetClientsbyImmD($Imm);
        }
}