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
    public const SUPPROJETS_GET = "SELECT id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone from SupProjet order by id_supprojet";
    public const SUPPROJETSLIST_GET = "SELECT id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone from SupProjet order by id_supprojet";
    public const PROJETS_GET = "SELECT id_projet, duree_projet, date_debut_projet, desc_projet, lib_projet, id_user FROM Projet";
    
    //public const PROJET_ADD = "INSERT INTO Projet (duree_projet, date_debut_projet, desc_projet, lib_projet, id_user) VALUES (:duree_projet, :date_debut_projet, :desc_projet, :lib_projet, :id_user)";

    public const SUPPROJETS_GET_BY_ID = "SELECT id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone from SupProjet order by id_supprojet";
    //public const SUPPROJETS_GET_BY_PROJET = "SELECT id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone from SupProjet order by id_projet";
    public const SUPPROJETS_GET_BY_PROJET = "SELECT * FROM SupProjet WHERE id_projet = :id";
    //public const PROJETS_GET_BY_ID = "SELECT id_projet, duree_projet, date_debut_projet, desc_projet, lib_projet, id_user from Projet order by id_projet";
    public const PROJETS_GET_BY_ID = "SELECT id_projet, duree_projet, date_debut_projet, desc_projet, lib_projet, id_user FROM Projet WHERE id_projet = :id";

    public const USERS_GET = "SELECT id_user, username, nom_user, prenom_user, avatar_user, email_user, pass_word, date_creation FROM utilisateur";
    public const SUPPROJET_REMOVE = "DELETE from SupProjet where id_supprojet = :id";
    public const SUPPROJETPRO_REMOVE = "DELETE FROM SupProjet WHERE id_projet = :id";
    public const PROJET_REMOVE = "DELETE FROM Projet WHERE id_projet = :id";
    
}