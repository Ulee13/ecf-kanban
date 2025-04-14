import { Projet } from "./classes.js";

// Tableau temporaire pour stocker les projets
let projets = [];

// Fonction pour enregistrer un projet dans le tableau
function enregistrerProjet(moduleElement) {
    // On récupère le nom du projet depuis l'élément du module
    const nom = moduleElement.querySelector("#project-name")?.value || ""; // Valeur par défaut si l'élément n'existe pas : Si moduleElement n'existe pas, on utilise une chaîne vide
    // On récupère la catégorie du projet
    const categorie = moduleElement.querySelector("#project-cat")?.value || "";
    // On récupère le chef de projet
    const chefDeProjet = moduleElement.querySelector("#project-chef")?.value || "";
    // On récupère les participants du projet
    const participants = Array.from(moduleElement.querySelector("#project-participants")?.selectedOptions || []).map(opt => opt.value);
    // On récupère la date de début du projet
    const dateDebut = moduleElement.querySelector("#project-datestart")?.value || "";
    // On récupère la date de fin du projet
    const dateFin = moduleElement.querySelector("#project-dateend")?.value || "";
    // On récupère la description du projet
    const description = moduleElement.querySelector("#project-descrip")?.value || "";

    // Création d'une instance de Projet et ajout dans le tableau
    let projet = new Projet(nom, categorie, chefDeProjet, participants, dateDebut, dateFin, description);
    projets.push(projet);

    // Affiche le projet enregistré dans la console
    console.log("Projet enregistré :", projet);
}

// Fonction pour récupérer tous les projets stockés
function getProjets() {
    // Retourne le tableau des projets
    return projets;
}

// Fonction pour réinitialiser la liste des projets
function resetProjets() {
    // Vide le tableau des projets
    projets = [];
}

// Exporte les fonctions et variables pour pouvoir les utiliser ailleurs
export { enregistrerProjet, getProjets, resetProjets };

