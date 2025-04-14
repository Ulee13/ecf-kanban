// Classe Projet pour structurer les données
class Projet {
    constructor(nom, categorie, chefDeProjet, participants, dateDebut, dateFin, description) {
        // On initialise les propriétés du projet avec les valeurs passées en paramètres
        this.nom = nom;
        this.categorie = categorie;
        this.chefDeProjet = chefDeProjet;
        this.participants = participants;
        this.dateDebut = dateDebut;
        this.dateFin = dateFin;
        this.description = description;
    }
}

// Classe Role : Définit les rôles et leurs permissions
class Role {
    constructor(nom, permissions) {
        // On initialise les propriétés du rôle avec les valeurs passées en paramètres
        this.nom = nom;
        this.permissions = permissions; // Liste des permissions associées au rôle
    }
}

// Classe Utilisateur : représente un utilisateur du projet
class Utilisateur {
    constructor(nom, prenom, role, projetActif) {
        // On initialise les propriétés de l'utilisateur avec les valeurs passées en paramètres
        this.nom = nom;
        this.prenom = prenom;
        this.role = role;
        this.projetActif = projetActif; // Nom du projet auquel il est actuellement assigné
    }
}

// Exportation des classes pour utilisation dans d'autres fichiers
export { Projet, Role, Utilisateur };
