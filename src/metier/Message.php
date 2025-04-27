<?php
declare(strict_types=1);
namespace kanban\metier;

enum Message {
    case LIB_Existant;
    case ID_Invalide;
   
    public function getMessage(): string {
        return match($this) {
            self::LIB_Existant                       => 'Ce nom de projet est déjà utilisé. Veuillez saisir un autre nom',
            self::ID_Invalide                       => 'Cet identifiant est invalide. Veuillez saisir un nombre',

        };
    }
}