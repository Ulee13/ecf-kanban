<?php
namespace src\metier;

class Categorie {
    private int $id_cat;
    private string $lib_cat;

    public function __construct(int $id_cat, string $lib_cat) {
        $this->id_cat = $id_cat;
        $this->lib_cat = $lib_cat;
    }

    public function getIdCat(): int {
        return $this->id_cat;
    }

    public function setIdCat(int $id_cat): void {
        $this->id_cat = $id_cat;
    }

    public function getLibCat(): string {
        return $this->lib_cat;
    }

    public function setLibCat(string $lib_cat): void {
        $this->lib_cat = $lib_cat;
    }
}