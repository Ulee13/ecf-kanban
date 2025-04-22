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
    public const PROJETS_GET = "SELECT id_projet, duree_projet, date_debut_projet, desc_projet, lib_projet, id_user FROM projet";
    //public const SUPPROJET_GET = "Select id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone";
    public const SUPPROJETS_GET = "Select id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone from SupProjet order by id_supprojet";
    public const SUPPROJETS_GET_BY_ID = "Select id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone from SupProjet order by id_supprojet";
    public const USERS_GET = "SELECT id_user, username, nom_user, prenom_user, avatar_user, email_user, pass_word, date_creation FROM utilisateur";
    public const SUPPROJET_REMOVE = "Delete from SupProjet where id_supprojet = :id";

}