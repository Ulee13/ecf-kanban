<?php
namespace kanban\dao;
use kanban\dao\Database;
use kanban\dao\Requetes;
use kanban\metier\SupProjet;
use kanban\metier\GetUser;
use kanban\metier\Projet;

class DaoKanban {
    private \PDO $conn;
    // je déclare le constructeur qui permet de regrouper les méthodes $conn et $requete
    public function __construct() {
        $this->conn = Database::getConnection();
        //var_dump($this->conn);
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

    public function getSupProjets() : array {
        $cursor = $this->conn->query(Requetes::SUPPROJETSLIST_GET);
        $supProjets = array();
        while ($row = $cursor->fetch(\PDO::FETCH_OBJ)) {
            $supProjets[] = new SupProjet($row->id_modulex, $row->id_projet, $row->id_supprojet, $row->date_creation_supprojet, $row->coul_supprojet, $row->nom_module_projet, $row->id_icone);
        }
        return $supProjets;
    }
    
    public function getUser() {
        $cursor = $this->conn->query(Requetes::USERS_GET);
        $users = array();
        while ($row = $cursor->fetch(\PDO::FETCH_OBJ)) {
            //var_dump($row);
            $users[] = new GetUser($row->id_user, $row->username, $row->nom_user, $row->prenom_user, $row->avatar_user, $row->email_user, $row->pass_word, $row->date_creation);
        }
        return $users;
    }

    // Récupérer la liste des projets
    public function getProjets() : array {
        $cursor = $this->conn->query(Requetes::PROJETS_GET);
        $projets = [];
        while ($row = $cursor->fetch(\PDO::FETCH_OBJ)) {
            $projets[] = new Projet($row->duree_projet, $row->date_debut_projet, $row->desc_projet, $row->lib_projet, (int)$row->id_user, (int)$row->id_projet);
        } 
        return $projets;
    }

// ***** GetByID ****** //

    public function getSupProjetById($id_supprojet) {
        $cursor = $this->conn->prepare(Requetes::SUPPROJETS_GET_BY_ID);
        //$cursor->bindvalue(1, $id_supprojet);
        $cursor->execute();
        $row = $cursor->fetch(\PDO::FETCH_OBJ);
        $supProjet = new SupProjet($row->id_modulex, $row->id_projet, $row->id_supprojet, $row->date_creation_supprojet, $row->coul_supprojet, $row->nom_module_projet, $row->id_icone);
        return $supProjet;
    }

    public function getProjetById($id_projet) {
        $cursor = $this->conn->prepare(Requetes::PROJETS_GET_BY_ID);
        $cursor->bindValue(':id', $id_projet, \PDO::PARAM_INT); // Ajout de la liaison du paramètre
        $cursor->execute();
        $row = $cursor->fetch(\PDO::FETCH_OBJ);
    
        if ($row) {
            $projet = new Projet(
                $row->duree_projet,
                $row->date_debut_projet,
                $row->desc_projet,
                $row->lib_projet,
                (int)$row->id_user, // Conversion explicite en entier
                (int)$row->id_projet // Conversion explicite en entier
            );
            return $projet;
        }
    
        return null; // Retournez null si aucun projet n'est trouvé
    }
    

// ***** Remove ****** //

//supprime un SupProjet dans la BDD à partir de l'instance reçue en paramètre.
    public function removeSupProjet(SupProjet $supProjet): void {
        $id_supprojet = $supProjet->getIdSupprojet();
        //$libellep = $supProjet->getLibelle();
        $query  = $this->conn->prepare(Requetes::SUPPROJET_REMOVE);
        $query->bindValue('id', $id_supprojet, \PDO::PARAM_STR);
        //$query->bindValue('id',            $id_supprojet,             \PDO::PARAM_INT);
        $response = $query->execute();  // response = 1 (true) si OK
        
    }

//supprime un projet dans la BDD à partir de l'instance reçue en paramètre.
    public function removeProjet(Projet $projet): void {
        $id = $projet->getIdProjet();
    
        // Vérifie si des SupProjets sont associés au projet
        $query = $this->conn->prepare(Requetes::SUPPROJETS_GET_BY_PROJET);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $supProjets = $query->fetchAll(\PDO::FETCH_ASSOC);
    
        echo "SupProjets trouvés : " . count($supProjets) . "\n";
        
        // Supprime tous les SupProjets associés
        if (!empty($supProjets)) {
            $query = $this->conn->prepare(Requetes::SUPPROJETPRO_REMOVE);
            $query->bindValue(':id', $id, \PDO::PARAM_INT);
            if ($query->execute()) {
                echo "SupProjets supprimés.\n";
            } else {
                echo "Erreur lors de la suppression des SupProjets.\n";
            }
        }
    
        // Supprime le projet
        $query = $this->conn->prepare(Requetes::PROJET_REMOVE);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        if ($query->execute()) {
            echo "Projet supprimé.\n";
        } else {
            echo "Erreur lors de la suppression du projet.\n";
        }
    }


// ***** ADD ****** //
// Ajoute un projet dans la BDD à partir de l'instance reçue en paramètre.
    public function addProjet(Projet $projet): int {
        //$id_projet = $projet->getIdProjet();
        $duree_projet = $projet->getDureeProjet();
        $date_debut_projet = $projet->getDateDebut();
        $desc_projet = $projet->getDesc();
        $lib_projet = $projet->getNomProjet();
        $id_user = $projet->getIdUser();

        // Prépare la requête d'insertion
        $query  = $this->conn->prepare("INSERT INTO projet (duree_projet, date_debut_projet, desc_projet, lib_projet, id_user) VALUES (:duree_projet, :date_debut_projet, :desc_projet, :lib_projet, :id_user)");
        
        // Lie les paramètres
        //$query->bindValue(':id_projet',          $id_projet,              \PDO::PARAM_INT);
        $query->bindValue(':duree_projet',         $duree_projet,           \PDO::PARAM_STR);
        $query->bindValue(':date_debut_projet',    $date_debut_projet,      \PDO::PARAM_STR);
        $query->bindValue(':desc_projet',          $desc_projet,            \PDO::PARAM_STR);
        $query->bindValue(':lib_projet',           $lib_projet,             \PDO::PARAM_STR);
        $query->bindValue(':id_user',              $id_user,                \PDO::PARAM_INT);

        // Exécute la requête
        
        if ($query->execute()) {
            $id_projet = $this->conn->lastInsertId();
            echo "Le projet a été ajouté avec succès.";
        } else {
            $id_projet=0;
            echo "Erreur lors de l'ajout du projet.";
        }
        return $id_projet;

    }
}