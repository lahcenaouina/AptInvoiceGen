<?php 
declare(strict_types=1);

namespace classes ;

class FactureView extends Facture {
        public function GetALlFact() {
                return $this->GetAllFactures();
        }
}