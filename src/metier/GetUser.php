<?php
declare(strict_types=1);
namespace kanban\metier;

class GetUser {
    private int $id_user;
    private string $username;
    private string $nom_user;
    private string $prenom_user;
    private string $avatar_user;
    private string $email_user;
    private string $pass_word;
    private string $date_creation;

    // Constructeur
    public function __construct(int $id_user, string $username, string $nom_user, string $prenom_user, string $avatar_user, string $email_user, string $pass_word, string $date_creation) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->nom_user = $nom_user;
        $this->prenom_user = $prenom_user;
        $this->avatar_user = $avatar_user;
        $this->email_user = $email_user;
        $this->pass_word = $pass_word;
        $this->date_creation = $date_creation;
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
    public function getAvatarUser(): string {
        return $this->avatar_user;
    }
    public function getEmailUser(): string {
        return $this->email_user;
    }
    public function getPassWord(): string {
        return $this->pass_word;
    }
    public function getDateCreation(): string {
        return $this->date_creation;
    }
    // Setters
    public function setIdUser(int $id_user): void {
        $this->id_user = $id_user;
    }
    public function setUsername(string $username): void {
        $this->username = $username;
    }
    public function setNomUser(string $nom_user): void {
        $this->nom_user = $nom_user;
    }
    public function setPrenomUser(string $prenom_user): void {
        $this->prenom_user = $prenom_user;
    }
    public function setAvatarUser(string $avatar_user): void {
        $this->avatar_user = $avatar_user;
    }
    public function setEmailUser(string $email_user): void {
        $this->email_user = $email_user;
    }
    public function setPassWord(string $pass_word): void {
        $this->pass_word = $pass_word;
    }
    public function setDateCreation(string $date_creation): void {
        $this->date_creation = $date_creation;
    }

}