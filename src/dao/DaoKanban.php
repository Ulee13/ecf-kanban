<?php
namespace kanban\dao;
use kanban\dao\Database;
use kanban\dao\Requetes;
use kanban\metier\SupProjet;

class DaoKanban {
    private \PDO $conn;
    // je déclare le constructeur qui permet de regrouper les méthodes $conn et $requete
    public function __construct() {
        $this->conn = Database::getConnection();
    }
    /**
     * Récupérer la liste des icones
     * @return array
     */

    
    
// ***** Get ****** //

public function getSupProjet() : array {
    $cursor = $this->conn->query(Requetes::SUPPROJETS_GET);
    $supProjets = array();
    while ($row = $cursor->fetch(\PDO::FETCH_OBJ)) {
        $supProjets[] = new SupProjet($row->id_modulex, $row->id_projet, $row->id_supprojet, $row->date_creation_supprojet, $row->coul_supprojet, $row->nom_module_projet, $row->id_icone);
    }
    return $supProjets;
}



}