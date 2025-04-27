<?php
declare(strict_types=1);
namespace kanban\metier;

enum Message {
    case LIB_Existant;
    case ID_Invalide;
    case USERNAME_Existant;
   
    public function getMessage(): string {
        return match($this) {
            self::LIB_Existant                      => 'Ce nom de projet est déjà utilisé. Veuillez saisir un autre nom',
            self::ID_Invalide                       => 'Cet identifiant est invalide. Veuillez saisir un nombre',
            self::USERNAME_Existant                 => 'Cet utilisateur existe déjà. Veuillez saisir un autre nom',

        };
    }
}