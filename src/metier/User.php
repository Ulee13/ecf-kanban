<?php
declare(strict_types=1);
namespace kanban\metier;

class User {
    private int $id_user;
    private string $username;
    private string $nom_user;
    private string $prenom_user;
    private string $avatar_user; // à modifier : date_fin_projet
    private string $email_user;
    private string $pass_word;
    private string $date_creation;
    private int $id_secteur;


    // Constructeur
    public function __construct(int $id_user, string $username, string $nom_user, string $prenom_user, string $avatar_user, string $email_user, string $pass_word, string $date_creation, int $id_secteur=0) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->nom_user = $nom_user;
        $this->prenom_user = $prenom_user;
        $this->avatar_user = $avatar_user;
        $this->email_user = $email_user;
        $this->pass_word = $pass_word;
        $this->date_creation = $date_creation;
        $this->id_secteur = $id_secteur;
    }

    // Getters
    
    public function getIdUser(): int {
        return $this->id_user;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getNomUser(): string {
        return $this->nom_user;
    }

    public function getPrenomUser(): string {
        return $this->prenom_user;
    }

    public function getAvatar(): string {
        return $this->avatar_user;
    }

    public function getEmail(): string {
        return $this->email_user;
    }

    public function getPassword(): string {
        return $this->pass_word;
    }

    public function getDateCrea(): string {
        return $this->date_creation;
    }

    public function getIDSecteur(): int {
        return $this->id_secteur;
    }


    // Setters
    public function setIdUser(int $id_user): void {
        $this->id_user = $id_user;
    }

    public function setUqsername(string $username): void {
        $this->username = $username;
    }

    public function setNomUser(string $nom_user): void {
        $this->nom_user = $nom_user;
    }

    public function setPrenomUser(string $prenom_user): void {
        $this->prenom_user = $prenom_user;
    }

    public function setAvatar(string $avatar_user): void {
        $this->avatar_user = $avatar_user;
    }

    public function setEmail(string $email_user): void {
        $this->email_user = $email_user;
    }

    public function setPassword(string $pass_word): void {
        $this->pass_word = $pass_word;
    }

    public function setDateCrea(string $date_creation): void {
        $this->date_creation = $date_creation;
    }

    public function setIdSecteur(int $id_secteur): void {
        $this->id_secteur = $id_secteur;
    }   
}

