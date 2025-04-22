// import { getUtilisateurs } from "./fonctionUtil.js";
// import { enregistrerProjet, getProjets } from "./dataModProjet.js";
// import { enregistrerRolesUtilisateurs, getUtilisateursEnregistres } from "./dataModUtilisateurs.js";
// import { validerFormulaireProjet, validerFormulaireUtilisateurs } from "./validation.js";

/* *********************************************************************************************************** */

// On récupère tous les modules pour pouvoir les déplacer
const modules = document.querySelectorAll('.module'); 
// On récupère la zone où on va déposer les modules
const dropzone = document.getElementById('dropzone'); 
// On récupère la liste des modules pour les remettre après suppression
const modulesList = document.getElementById('modules-list'); 

/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
/* Manipulation des Modules */
/* *********************************************************************************************************** */

/* *** Ajoute des évènements de Drag & Drop aux modules *** */
modules.forEach(module => {
    // Cache le formulaire des modules dans la colonne de gauche
    const moduleForm = module.querySelector(".module-content");
    if (moduleForm) {
        moduleForm.style.display = "none"; // Caché tant qu'il est dans la colonne de gauche
    }
    // Rend les modules déplaçables (dragstart) en ajoutant la classe "dragging"
    module.addEventListener('dragstart', () => {
        module.classList.add('dragging');
    });
    // Retire la classe "dragging" et permet de relâcher (dragend) les modules
    module.addEventListener('dragend', () => {
        module.classList.remove('dragging');
    });
});

// Observe le survol de la zone projet pour permettre le drop
dropzone.addEventListener('dragover', e => {
    e.preventDefault();
});

/* *** Gère l'ajout d'un module dans la zone projet + insertion dynamiquement d'un bouton de suppression *** */

// Permet de déposer (drop) les modules dans la zone projet au relachement de la souris
dropzone.addEventListener('drop', e => {
    e.preventDefault();
    const draggingModule = document.querySelector('.dragging');
    
    // Si un module est déplacé, on permet l'ajout à la zone projet
    if (draggingModule) {
        draggingModule.classList.remove('dragging');
        draggingModule.classList.add('expanded');

        // Ajoute un bouton de suppression au module déposé            
        const removeButton = document.createElement('button');
        removeButton.className = 'remove-button';
        removeButton.textContent = 'Supprimer';

        removeButton.addEventListener('click', () => {
            moduleFormDeployed.style.display = "none"; // Cache le formulaire du module
            draggingModule.classList.remove('expanded'); // Retire la classe "expanded" pour réduire le module
            removeButton.remove(); // Supprime le bouton de suppression
            modulesList.appendChild(draggingModule); // Réinsère le module dans la liste des modules

            // Réinitialise le formulaire du module
            const form = moduleFormDeployed.querySelector("form");
            if (form) {
                form.reset();
            }
        });
        
        draggingModule.appendChild(removeButton);
        dropzone.appendChild(draggingModule);

        // Affiche le formulaire du module déposé
        const moduleFormDeployed = draggingModule.querySelector(".module-content");
        if (moduleFormDeployed) {
            moduleFormDeployed.style.display = "block";
            remplirSelectUtilisateurs(); // Remplit les listes déroulantes avec les utilisateurs existants
        }
    }
});

// Fetch de la portion de code HTML des formulaires des modules
//fetch('view/gestProjet.php')
fetch('kanban/index.php?ajax=moduleForm&module=gestprojet')
    .then(response => response.text())
    .then(data => {
        document.getElementById('gestProjet').innerHTML = data;
    });
    
fetch('kanban/index.php?ajax=moduleForm&module=gestuser')
    .then(response => response.text())
    .then(data => {
        document.getElementById('gestUser').innerHTML = data;
    });

fetch('kanban/index.php?ajax=moduleForm&module=gestplan')
    .then(response => response.text())
    .then(data => {
        document.getElementById('gestPlan').innerHTML = data;
    });

fetch('kanban/index.php?ajax=moduleForm&module=gestmess')
    .then(response => response.text())
    .then(data => {
        document.getElementById('gestMess').innerHTML = data;
    });

fetch('kanban/index.php?ajax=moduleForm&module=gestdoc')
    .then(response => response.text())
    .then(data => {
        document.getElementById('gestDoc').innerHTML = data;
    });

fetch('kanban/index.php?ajax=moduleForm&module=gestcal')
    .then(response => response.text())
    .then(data => {
        document.getElementById('gestCal').innerHTML = data;
    });

// Fonction pour remplir les listes déroulantes avec les utilisateurs fictifs
function remplirSelectUtilisateurs() {
    const utilisateurs = getUtilisateurs();
    document.querySelectorAll("#project-chef, #project-participants").forEach(select => {
        select.innerHTML = ""; // Vide la liste avant d'ajouter les utilisateurs

        // Ajoute une option vide pour le Chef de Projet
        if (select.id === "project-chef") {
            const optionVide = document.createElement("option");
            optionVide.value = "";
            optionVide.textContent = "Sélectionnez un chef de projet";
            select.appendChild(optionVide);
        }

        utilisateurs.forEach(user => {
            const option = document.createElement("option");
            option.value = `${user.nom} ${user.prenom}`;
            option.textContent = `${user.nom} ${user.prenom}`;
            select.appendChild(option);
        });
    });
}


/* EB Contrôle formulaire */
// Ajout de l'écouteur d'événement au bouton "Valider"
// document.addEventListener("click", (event) => {
//     if (event.target.classList.contains("btn-success")) {
//         event.preventDefault(); // Empêche le comportement par défaut du bouton
//         const moduleElement = event.target.closest(".module-content");
//         if (moduleElement.querySelector("#project-name")) {
//             if (validerFormulaireProjet(moduleElement)) {
//                 enregistrerProjet(moduleElement); // Enregistre les données du projet
//             }
//         } else {
//             if (validerFormulaireUtilisateurs(moduleElement)) {
//                 enregistrerRolesUtilisateurs(); // Enregistre les rôles attribués aux utilisateurs
//             }
//         }
//         setTimeout(() => afficherConfirmation(), 300); // Affiche la modale avec un léger délai
//     }
// });

function afficherConfirmation() {
    console.log("Tentative d'affichage de la modale..."); // Vérification
    const modalElement = document.getElementById("confirmationModal");

    if (!modalElement) {
        console.error("ERREUR : La modale de confirmation n'existe pas dans le DOM !");
        return;
    }

    const dernierProjet = getProjets().slice(-1)[0]; // Récupère le dernier projet enregistré
    const utilisateurs = getUtilisateursEnregistres(); // Récupère les utilisateurs enregistrés
    const detailsElement = document.getElementById("project-details");
    const userDetailsElement = document.getElementById("user-details");

    if (dernierProjet && detailsElement) {
        detailsElement.innerHTML = `
            <p><strong>Nom du Projet:</strong> ${dernierProjet.nom}</p>
            <p><strong>Catégorie:</strong> ${dernierProjet.categorie}</p>
            <p><strong>Chef de Projet:</strong> ${dernierProjet.chefDeProjet}</p>
            <p><strong>Participants:</strong> ${dernierProjet.participants.join(", ")}</p>
            <p><strong>Date de Début:</strong> ${dernierProjet.dateDebut}</p>
            <p><strong>Date de Fin:</strong> ${dernierProjet.dateFin}</p>
            <p><strong>Description:</strong> ${dernierProjet.description}</p>
        `;
    }

    if (utilisateurs && userDetailsElement) {
        userDetailsElement.innerHTML = `
            <hr>
            <h5>Rôles des Utilisateurs</h5>
            ${utilisateurs.map(user => `<p><strong>${user.nom} ${user.prenom} :</strong> ${user.role}</p>`).join("")}
        `;
    }

    const confirmationModal = new bootstrap.Modal(modalElement);
    confirmationModal.show();
    console.log("Modale affichée !"); // Vérification
    console.log("Dernier projet enregistré :", dernierProjet); // Vérification
    console.log("Utilisateurs enregistrés avec rôles :", utilisateurs); // Vérification
}

// Fonction pour basculer entre le mode sombre et le mode clair
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    const isDarkMode = document.body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
}

// Vérifie le mode préféré de l'utilisateur au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    const darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'enabled') {
        document.body.classList.add('dark-mode');
    }

    // Ajoute un écouteur d'événement au bouton de basculement
    document.getElementById('toggle-theme').addEventListener('click', toggleDarkMode);
});





