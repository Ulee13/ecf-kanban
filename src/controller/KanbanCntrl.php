<?php
namespace kanban\controller;
use kanban\dao\DaoKanban;
use kanban\dao\Requetes;
use kanban\metier\SupProjet;
use kanban\metier\GetUser;


class KanbanCntrl{

    private DaoKanban $dao;
    private DaoKanban $daoKanban;
  
    // Constructeur
    public function __construct() {
        $this->dao = new DaoKanban();
    }
 
 // ***************************************************************** //   

    public function getIndex() {
        include 'view/index.php';
    }

    public function getIndexLaunch() {
        include '../index.php';
    }
    
    public function getSupProjet() {
        $supProjets = $this->dao->getSupProjet();
        include 'view/listSupProjet.php';
    }

    public function getUser() {
        $users = $this->dao->getUser(); // Récupère les utilisateurs
        include __DIR__ . '/../view/gestUser.php'; // Inclut la vue
    }

    public function removeSupProjet() {
        // recevoir l'instruction donnée par le bouton supprimer de la vue listSupProjet.php
        $id = (isset($_GET['id_supprojet'])) ? htmlspecialchars(trim($_GET['id_supprojet'])) : '';
        $message = '';
        // on verifie si le SupProjet existe
        $dao = new DaoKanban();
        $supProjet = $dao->getSupProjetById($id);
        // si ok, envoyer à Dao pour supprimer le SupProjet dans la BDD
        $dao->removeSupProjet($supProjet);
        $supProjets = $dao->getSupProjet();
        // si ok afficher liste des SupProjets modifiés, sinon retour à la liste des SupProjets
        if (empty($message)) include 'view/listSupProjet.php';
        //else include 'view/plats.php';
    }


    // public function removeSupProjet() {
    //     // recevoir l'instruction donnée par le bouton supprimer
    //     $id_supprojet = (isset($_GET['id'])) ? htmlspecialchars(trim($_GET['id'])) : '';
    //     $message = '';
    //     // on verifie si le supprojet est utilisé
        
    //     $supProjet = $this->dao->getSupProjetById($id_supprojet);
    //     // si ok, envoyer à Dao pour supprimer le supprojet dans la BDD
    //     $this->dao->removeSupProjet($supProjet);
    //     $supProjet = $this->dao->getSupProjet();
    //     // si ok afficher liste des supprojets modifiées, sinon retour à la liste des supprojets
    //     if (empty($message)) include 'view/listSupProjet.php';
    //     //else include 'view/categories.php';
    // }


// ***************************************************************** //

    public function formProjet() {
        include __DIR__ . '/../view/gestProjet.php';
    }

    public function formUser() {
        //echo "formUser called";
        $this->getUser();
    }

    public function formPlan() {
        include __DIR__ . '/../view/gestPlan.php';
    }

    public function formMess() {
        include 'view/gestMess.php';
    }

    public function formDoc() {
        include 'view/gestDoc.php';
    }

    public function formCal() {
        include 'view/gestCal.php';
    }

    public function saveSupProjet() {
        //include 'view/gestCal.php';
    }

    public function cancelSupProjet() {
       
    }

}