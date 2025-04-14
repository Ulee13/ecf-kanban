import { getUtilisateurs } from "./fonctionUtil.js";

// Tableau temporaire pour stocker les utilisateurs avec leur rôle attribué
let utilisateursEnregistres = []; // On crée un tableau vide pour mettre les utilisateurs avec leur rôle

// Fonction pour enregistrer les rôles attribués aux utilisateurs
function enregistrerRolesUtilisateurs() {
    console.log("Enregistrement des rôles en cours..."); // Vérification

    const utilisateurs = getUtilisateurs(); // On récupère les utilisateurs
    utilisateursEnregistres = utilisateurs.map(user => { // On parcourt chaque utilisateur
        const roleSelectionne = document.querySelector(`input[name="user${user.nom}${user.prenom}"]:checked`); // On cherche le rôle sélectionné pour chaque utilisateur
        return {
            nom: user.nom, // On garde le nom de l'utilisateur
            prenom: user.prenom, // On garde le prénom de l'utilisateur
            role: roleSelectionne ? roleSelectionne.value : "Non défini" // On met le rôle sélectionné ou "Non défini" si aucun rôle n'est sélectionné
        };
    });

    console.log("Utilisateurs enregistrés avec rôles :", utilisateursEnregistres); // On affiche les utilisateurs avec leur rôle dans la console
}

// Fonction pour récupérer les utilisateurs enregistrés
function getUtilisateursEnregistres() {
    return utilisateursEnregistres; // On retourne le tableau des utilisateurs enregistrés
}

// Exportation des fonctions pour utilisation dans `script.js`
export { enregistrerRolesUtilisateurs, getUtilisateursEnregistres }; // On exporte les fonctions pour pouvoir les utiliser ailleurs
