<?php
namespace kanban\dao;

class Requetes {
    private \PDO $conn;
    // je déclare le constructeur qui permet de regrouper les méthodes $conn et $requete
    public function __construct() {
        $this->conn = Database::getConnection();
    }
    
    /**
     * Récupérer la liste des icones
     * @return array
     */
    public function getIcones(): array {
        $sql = "SELECT id, libelle FROM icone";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    /**
     * Récupérer la liste des colonnes
     * @return array
     */
}