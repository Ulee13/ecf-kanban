<?php
declare(strict_types=1);
namespace kanban\metier;

enum Message {
    case LIB_Existant;
   
    public function getMessage(): string {
        return match($this) {
            self::LIB_Existant                       => 'Ce nom de projet est déjà utilisé. Veuillez saisir un autre nom',
        };
    }
}