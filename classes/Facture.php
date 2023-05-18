<?php
declare(strict_types=1);
namespace classes ; 
use PDO;

abstract class Facture extends DBH {

        protected function AddNewFacture($year, $month , $Imm , $Num_house , $currentDate , $money ) {
                $sql ="INSERT INTO `facture`(`facture_year`, `facture_mois`, `facture_Imm`, `facture_Appr_num`, `facture_Date_insertion` ,`money`) 
                VALUES (?,?,?,?,?,?)";
                $stmt = $this->connect()->prepare($sql);

                if (!$stmt->execute([$year, $month , $Imm , $Num_house , $currentDate , $money])){
                        $stmt = null;
                        header("location: ../view/AddNewFacture.php?msg=StmtFailed");
                        exit();

                }
                $stmt = null; 
        }
        
        protected function GetAllFactures() {
                $sql ="SELECT * from users u , facture f where f.facture_Imm = u.Imm and f.facture_Appr_num=u.Num_house;";
                $stmt = $this->connect()->prepare($sql);

                if (!$stmt->execute()){
                        $stmt = null;
                        header("location: ../view/AddNewFacture.php?msg=StmtFailed");
                        exit();

                }
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
}