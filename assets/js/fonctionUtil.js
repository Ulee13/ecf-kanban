import { Role, Utilisateur } from "./classes.js";

// Liste des rôles disponibles avec leurs permissions
// On crée des objets Role avec des permissions spécifiques
const rolesDisponibles = [
    new Role("Chef de Projet", ["Créer, modifier et supprimer des projets", "Attribuer des tâches", "Gérer les équipes"]),
    new Role("Admin", ["Gérer les utilisateurs", "Modifier tous les projets", "Accès complet à l'application"]),
    new Role("Lead", ["Gérer les tâches de son équipe", "Créer des événements", "Suivi des projets"]),
    new Role("Collaborateur", ["Effectuer ses tâches", "Participer aux discussions", "Créer des événements mineurs"])
];

// Liste des utilisateurs fictifs avec des rôles attribués
// On crée des objets Utilisateur avec des rôles et des projets spécifiques
const utilisateursFictifs = [
    new Utilisateur("Mercury", "Freddy", "Chef de Projet", "Projet Alpha"),
    new Utilisateur("Dalton", "Joe", "Admin", "Projet Beta"),
    new Utilisateur("Gable", "Clark", "Lead", "Projet Gamma"),
    new Utilisateur("Bateman", "Patrick", "Lead", "Projet Delta"),
    new Utilisateur("Connor", "Sarah", "Collaborateur", "Projet Epsilon"),
    new Utilisateur("Ptitegoot", "Corine", "Collaborateur", "Projet Zeta")
];

// Fonction pour récupérer tous les utilisateurs
// Retourne la liste complète des utilisateurs fictifs
function getUtilisateurs() {
    return utilisateursFictifs;
}

// Fonction pour récupérer un utilisateur spécifique par son nom et prénom
// Utilise la méthode find pour chercher l'utilisateur correspondant
function getUtilisateur(nom, prenom) {
    return utilisateursFictifs.find(user => user.nom === nom && user.prenom === prenom);
}

// Fonction pour récupérer un rôle spécifique par son nom
// Utilise la méthode find pour chercher le rôle correspondant
function getRole(nom) {
    return rolesDisponibles.find(role => role.nom === nom);
}

// Fonction pour récupérer tous les rôles disponibles
// Retourne la liste complète des rôles disponibles
function getRoles() {
    return rolesDisponibles;
}

// Exportation des classes et des fonctions pour utilisation dans d'autres fichiers
// On exporte les fonctions et les listes pour pouvoir les utiliser ailleurs
export { getUtilisateurs, getUtilisateur, getRole, getRoles, rolesDisponibles };