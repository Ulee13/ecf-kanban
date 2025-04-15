<?php
namespace kanban\controller;
use kanban\dao\DaoKanban;

class KanbanCntrl{
    private DaoKanban $dao;
    // Constructeur
    public function __construct() {
        $this->dao = new DaoKanban();
    }

    public function getIndex() {
        // aucun traitement pour afficher la ^page d'accueil
        include 'view/index.php';
        // "test";
    }
    
    public function formProjet() {
        include 'view/gestProjet.php';
    }

    public function formUser() {
        include 'view/gestUser.php';
    }

    public function formPlan() {
        include 'view/gestPlan.php';
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

    public function getSupProjet() {
        include 'view/listSupProjet.php';
    }
}