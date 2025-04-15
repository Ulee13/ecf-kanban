<?php
declare(strict_types=1);
namespace src\dao;

use PDO;
use src\metier\Categorie;
use kanban\dao\Database;
use kanban\dao\DaoException;

class CategorieDAO {
    private PDO $conn;
    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function findAll(): array {
        $sql = "SELECT * FROM Categorie";
        $stmt = $this->conn->query($sql);

        $categories = [];
        while ($row = $stmt->fetch()) {
            $categories[] = new Categorie($row['id_cat'], $row['lib_cat']);
        }
        return $categories;
    }

    public function findById(int $id): ?Categorie {
        $sql = "SELECT * FROM Categorie WHERE id_cat = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        if ($row = $stmt->fetch()) {
            return new Categorie($row['id_cat'], $row['lib_cat']);
        }
        return null;
    }

    public function insert(Categorie $categorie): void {
        $sql = "INSERT INTO Categorie (id_cat, lib_cat) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$categorie->getIdCat(), $categorie->getLibCat()]);
    }

    public function update(Categorie $categorie): void {
        $sql = "UPDATE Categorie SET lib_cat = ? WHERE id_cat = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$categorie->getLibCat(), $categorie->getIdCat()]);
    }

    public function delete(int $id): void {
        $sql = "DELETE FROM Categorie WHERE id_cat = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }  
    
}