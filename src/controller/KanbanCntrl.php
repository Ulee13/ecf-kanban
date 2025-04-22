<?php
namespace kanban\controller;
use kanban\dao\DaoKanban;
use kanban\dao\Requetes;
use kanban\metier\SupProjet;
use kanban\metier\GetUser;
use kanban\metier\Message;
use kanban\metier\Projet;


class KanbanCntrl{

    private DaoKanban $dao;
    private DaoKanban $daoKanban;
  
    // Constructeur
    public function __construct() {
        $this->dao = new DaoKanban();
    }
 
// ***************************************************************** //   
// ***************************************************************** //   
// ***** GET ****** //

    public function getSupProjetById($id_supprojet) {
        $supProjet = $this->dao->getSupProjetById($id_supprojet);
        include 'view/gestSupProjet.php';
    }

    public function getIcones() {
        include 'view/gestIcone.php';
    }

    public function getCategories() {
        include 'view/gestCategorie.php';
    }
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

    public function getProjets() {
        // récupérer les projets
        $projets = $this->dao->getProjets();
        include __DIR__ . '/../view/listProjet.php';
    }

// ***************************************************************** //   
// ***************************************************************** //   
// ***** ADD ****** //
    // ajouter un projet
    public function addProjet() {
        // Récupérer les données du formulaire
        //$id_projet =            (isset($_POST['id-projet'])) ? htmlspecialchars(trim($_POST['id-projet'])) : '';
        $lib_projet =           (isset($_POST['nom-projet'])) ? htmlspecialchars(trim($_POST['nom-projet'])) : '';
        $id_user =              (isset($_POST['chef-projet'])) ? htmlspecialchars(trim($_POST['chef-projet'])) : '';
        $email_user =           (isset($_POST['chef-projet-email'])) ? htmlspecialchars(trim($_POST['chef-projet-email'])) : '';
        $date_debut_projet =    (isset($_POST['date-debut'])) ? htmlspecialchars(trim($_POST['date-debut'])) : '';
        $duree_projet =         (isset($_POST['date-fin'])) ? htmlspecialchars(trim($_POST['date-fin'])) : '';
        $desc_projet =          (isset($_POST['descrip-projet'])) ? htmlspecialchars(trim($_POST['descrip-projet'])) : '';
        $message = '';

        if (empty($lib_projet)) {
            $message = Message::LIB_Existant->getMessage();
        } else {
            // transformer le $id en int
            //$id_projet = (int)$id_projet;
            $id_user = (int)$id_user;
            
            // Si Datas ok
            $projet = new Projet($duree_projet, $date_debut_projet, $desc_projet, $lib_projet, $id_user);
        
            // si ok, envoyer à Dao pour créer la catégorie dans la BDD
            $id_projet= $this->dao->addProjet($projet);
        }
        // si ok : afficher liste des projets
        if (empty($message)) $this->getProjets();
        else include 'view/gestProjet.php';
        // Rediriger vers la page de gestion des projets
        header('Location: gestProjet');
    }

// ***************************************************************** //

    public function formProjet() {
        // Récupérer les utilisateurs
        $users = $this->dao->getUser();
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