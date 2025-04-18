<?php
namespace kanban\dao;
use kanban\dao\Database;
use kanban\dao\Requetes;
use kanban\metier\SupProjet;
use kanban\metier\GetUser;
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
    public function getUser() {
        $cursor = $this->conn->query(Requetes::USERS_GET);
        $users = array();
        while ($row = $cursor->fetch(\PDO::FETCH_OBJ)) {
            //var_dump($row);
            $users[] = new GetUser($row->id_user, $row->username, $row->nom_user, $row->prenom_user, $row->avatar_user, $row->email_user, $row->pass_word, $row->date_creation);
        }
        return $users;
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

    //supprime un SupProjet dans la BDD à partir de l'instance reçue en paramètre.
    public function removeSupProjet(SupProjet $supProjet): void {
        $id_supprojet = $supProjet->getIdSupprojet();
        //$libellep = $supProjet->getLibelle();
        $query  = $this->conn->prepare(Requetes::SUPPROJET_REMOVE);
        $query->bindValue('id', $id_supprojet, \PDO::PARAM_STR);
        //$query->bindValue('id',            $id_supprojet,             \PDO::PARAM_INT);
        $response = $query->execute();  // response = 1 (true) si OK
        
    }


}