<?php
namespace kanban\dao;

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
}