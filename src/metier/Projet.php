<?php
declare(strict_types=1);
namespace kanban\metier;

class Projet {
    private int $id_projet;
    private string $duree_projet; // à modifier : date_fin_projet
    private string $date_debut_projet;
    private string $desc_projet;
    private string $lib_projet;
    private int $id_user;


    // Constructeur
    public function __construct(string $duree_projet, string $date_debut_projet, string $desc_projet, string $lib_projet, int $id_user, int $id_projet=0 ) {
        $this->id_projet = $id_projet;
        $this->duree_projet = $duree_projet;
        $this->date_debut_projet = $date_debut_projet;
        $this->desc_projet = $desc_projet;
        $this->lib_projet = $lib_projet;
        $this->id_user = $id_user;
    }

    // Getters
    public function getIdProjet(): int {
        return $this->id_projet;
    }

    public function getDureeProjet(): string {
        return $this->duree_projet;
    }

    public function getDateDebut(): string {
        return $this->date_debut_projet;
    }

    public function getDesc(): string {
        return $this->desc_projet;
    }

    public function getNomProjet(): string {
        return $this->lib_projet;
    }

    public function getIdUser(): int {
        return $this->id_user;
    }

}