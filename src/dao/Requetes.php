<?php
namespace kanban\dao;

class Requetes {
    // private \PDO $conn;
    // // je déclare le constructeur qui permet de regrouper les méthodes $conn et $requete
    // public function __construct() {
    // $this->conn = Database::getConnection();
    // }        
    
    // /**
    //  * Récupérer la liste des icones
    //  * @return array
    //  */
    // public function getIcones(): array {
    //     $sql = "SELECT id, libelle FROM icone";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }

    // /**
    //  * Récupérer la liste des colonnes
    //  * @return array
    //  */

    //public const SUPPROJET_GET = "Select id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone";
    //public const SUPPROJET_GET_BY_ID = "Select categorie.idc, libellec, idp, libellep, prixp, compop, pathImgP from categorie JOIN plat ON categorie.idc=plat.idc where idp = :id";
    public const SUPPROJETS_GET = "Select id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone from supProjet order by id_supprojet";
}