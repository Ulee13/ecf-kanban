<?php
declare(strict_types=1);
namespace kanban\metier;

class SupProjet {
    private int $id_modulex;
    private int $id_projet;
    private string $id_supprojet;
    private string $date_crea_supprojet;
    private string $coul_supprojet;
    private string $nom_module_projet;
    private int $id_icone;

    // Constructeur
    public function __construct(int $id_modulex, int $id_projet, string $id_supprojet, string $date_crea_supprojet, string $coul_supprojet, string $nom_module_projet, int $id_icone) {
        $this->id_modulex                   = $id_modulex;
        $this->id_projet                    = $id_projet;
        $this->id_supprojet                 = $id_supprojet;
        $this->date_crea_supprojet          = $date_crea_supprojet;
        $this->coul_supprojet               = $coul_supprojet;
        $this->nom_module_projet            = $nom_module_projet;
        $this->id_icone                     = $id_icone;
    }

    // Getters
    public function getIdModulex(): int {
        return $this->id_modulex;
    }

    public function getIdProjet(): int {
        return $this->id_projet;
    }

    public function getIdSupprojet(): string {
        return $this->id_supprojet;
    }

    public function getDateCreaSupprojet(): string {
        return $this->date_crea_supprojet;
    }

    public function getCoulSupprojet(): string {
        return $this->coul_supprojet;
    }

    public function getNomModuleProjet(): string {
        return $this->nom_module_projet;
    }

    public function getIdIcone(): int {
        return $this->id_icone;
    }

    // Setters
    public function setIdModulex(int $id_modulex): void {
        $this->id_modulex = $id_modulex;
    }

    public function setIdProjet(int $id_projet): void {
        $this->id_projet = $id_projet;
    }

    public function setIdSupprojet(string $id_supprojet): void {
        $this->id_supprojet = $id_supprojet;
    }

    public function setDateCreaSupprojet(string $date_crea_supprojet): void {
        $this->date_crea_supprojet = $date_crea_supprojet;
    }

    public function setCoulSupprojet(string $coul_supprojet): void {
        $this->coul_supprojet = $coul_supprojet;
    }

    public function setNomModuleProjet(string $nom_module_projet): void {
        $this->nom_module_projet = $nom_module_projet;
    }

    public function setIdIcone(int $id_icone): void {
        $this->id_icone = $id_icone;
    }
}
