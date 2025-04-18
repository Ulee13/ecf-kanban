<?php
declare(strict_types=1);
namespace kanban\controller;
use kanban\controller\KanbanCntrl;
use kanban\dao\DaoKanban;
use kanban\dao\Requetes;


class AjaxCntrl {

    private KanbanCntrl $kanbanCntrl;

    public function __construct() {
        $this->kanbanCntrl = new KanbanCntrl();
    }

    public function loadModuleForm($moduleName) {
        $allowed = ['gestprojet', 'gestuser', 'gestplan', 'gestmess', 'gestdoc', 'gestcal']; // liste blanche

        if (in_array($moduleName, $allowed)) {
            switch ($moduleName) {
                case 'gestuser':
                    $this->kanbanCntrl->formUser(); // Appelle la méthode formUser
                    break;
                case 'gestprojet':
                    $this->kanbanCntrl->formProjet();
                    break;
                case 'gestplan':
                    $this->kanbanCntrl->formPlan();
                    break;
                case 'gestmess':
                    $this->kanbanCntrl->formMess();
                    break;
                case 'gestdoc':
                    $this->kanbanCntrl->formDoc();
                    break;
                case 'gestcal':
                    $this->kanbanCntrl->formCal();
                    break;
                default:
                    http_response_code(404);
                    echo "Module introuvable.";
            }
        } else {
            http_response_code(403);
            echo "Module non autorisé.";
        }
    }


    // public function loadModuleForm($moduleName) {
    //     $allowed = ['gestprojet', 'gestuser', 'gestplan', 'gestmess', 'gestdoc', 'gestcal']; // liste blanche

    //     if (in_array($moduleName, $allowed)) {
    //         $file = __DIR__ . '/../view/' . $moduleName . '.php';
    //         if (file_exists($file)) {
    //             include $file;
    //         } else {
    //             http_response_code(404);
    //             echo "Formulaire introuvable.";
    //         }
    //     } else {
    //         http_response_code(403);
    //         echo "Module non autorisé.";
    //     }
    // }
}
