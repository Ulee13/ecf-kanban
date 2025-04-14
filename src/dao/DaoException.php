<?php
declare(strict_types = 1);
namespace kanban\dao;

enum MyExceptionCase {
    case ID_DOUBLON;
    case LIBELLE_DOUBLON;
    case FK_CATEGORIE;
    case FK_CATEGORIE_USE;
    case PARAM_KO;
    case USER_ERREUR;
    case IDCAT_INVALIDE;
}

class DaoException extends \Exception {
    public function __construct(private MyExceptionCase $case){
        match($case){
            MyExceptionCase::ID_DOUBLON => parent::__construct("Doublon sur l'identifiant", 1),
            MyExceptionCase::LIBELLE_DOUBLON => parent::__construct("Doublon sur le libellé", 2),
            MyExceptionCase::FK_CATEGORIE => parent::__construct("Clé étrangère non respectée", 3),
            MyExceptionCase::FK_CATEGORIE_USE => parent::__construct("Cette catégorie est utilisée dans des plats. Vous ne pouvez pas la supprimer.", 401),
            MyExceptionCase::PARAM_KO => parent::__construct("Parametre BDD indisponibles", 4),
            MyExceptionCase::USER_ERREUR => parent::__construct("L'utilisateur est incorrect", 5),
            MyExceptionCase::IDCAT_INVALIDE => parent::__construct("La catégorie n'existe pas", 6),
        };
    }
}
?>