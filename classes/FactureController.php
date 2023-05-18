<?php
declare(strict_types=1);
namespace classes ; 

class FactureController extends Facture {
        private $username ; 
        private $Imm ; 
        private $Num_house ;
        private $year ; 
        private $month ; 
        private $money ;
        private $currentDate ; 

        public function __construct($username , $Imm , $Num_house ,$year , $month , $money){
                $this->username  = $username;
                $this->Imm  = $Imm;
                $this->Num_house  = $Num_house;
                $this->year  = $year;
                $this->month  = $month;
                $this->money  = $money;
                $this->currentDate =  date("Y-m-d");
        }
        //  ($year, $month , $Imm , $Num_house , $currentDate) {

        public function AddNewFact(){
                $this->AddNewFacture($this->year , $this->month, $this->Imm , $this->Num_house , $this->currentDate ,$this->money);
                header("location: ../view/ListFactures.php?name=?$this->username");
                exit();
        }
  

        
}

