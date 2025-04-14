// Fonction de validation pour le formulaire de projet
function validerFormulaireProjet(form) {
    let isValid = true;
    // On récupère la valeur du champ nom du projet et on enlève les espaces au début et à la fin
    const nom = form.querySelector("#project-name").value.trim();
    // On récupère la valeur de la catégorie du projet
    const categorie = form.querySelector("#project-cat").value;
    // On récupère la valeur du chef de projet
    const chefDeProjet = form.querySelector("#project-chef").value;
    // On récupère l'email du chef de projet et on enlève les espaces au début et à la fin
    const emailChefDeProjet = form.querySelector("#project-chef-email").value.trim();
    // On récupère la date de début du projet
    const dateDebut = form.querySelector("#project-datestart").value;
    // On récupère la date de fin du projet
    const dateFin = form.querySelector("#project-dateend").value;

    // Si le nom du projet est vide, on affiche une alerte et on met isValid à false
    if (!nom) {
        alert("Le nom du projet est requis.");
        isValid = false;
    }

    // Si la catégorie du projet est vide, on affiche une alerte et on met isValid à false
    if (!categorie) {
        alert("La catégorie du projet est requise.");
        isValid = false;
    }

    // Si le chef de projet est vide, on affiche une alerte et on met isValid à false
    if (!chefDeProjet) {
        alert("Le chef de projet est requis.");
        isValid = false;
    }

    // Si l'email du chef de projet est vide, on affiche une alerte et on met isValid à false
    if (!emailChefDeProjet) {
        alert("L'email du chef de projet est requis.");
        isValid = false;
    } else if (!validateEmail(emailChefDeProjet)) {
        // Si l'email du chef de projet n'est pas valide, on affiche une alerte et on met isValid à false
        alert("L'email du chef de projet n'est pas valide.");
        isValid = false;
    }

    // Si la date de début du projet est vide, on affiche une alerte et on met isValid à false
    if (!dateDebut) {
        alert("La date de début du projet est requise.");
        isValid = false;
    }

    // Si la date de fin du projet est vide, on affiche une alerte et on met isValid à false
    if (!dateFin) {
        alert("La date de fin du projet est requise.");
        isValid = false;
    }

    // Si la date de début est après la date de fin, on affiche une alerte et on met isValid à false
    if (dateDebut && dateFin && new Date(dateDebut) > new Date(dateFin)) {
        alert("La date de début ne peut pas être postérieure à la date de fin.");
        isValid = false;
    }

    return isValid;
}

// Fonction pour valider l'email avec une expression régulière
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Fonction de validation pour le formulaire des utilisateurs
function validerFormulaireUtilisateurs(form) {
    let isValid = true;
    // On récupère tous les boutons radio cochés
    const radios = form.querySelectorAll("input[type='radio']:checked");

    // Si aucun bouton radio n'est coché, on affiche une alerte et on met isValid à false
    if (radios.length === 0) {
        alert("Veuillez attribuer au moins un rôle à un utilisateur.");
        isValid = false;
    }

    // On récupère les participants sélectionnés dans la liste déroulante
    const participants = Array.from(document.querySelector("#project-participants").selectedOptions).map(opt => opt.value);
    let chefDeProjetCount = 0;

    // Pour chaque participant, on vérifie si un rôle lui est attribué
    participants.forEach(participant => {
        const [nom, prenom] = participant.split(" ");
        const roleAttribue = form.querySelector(`input[name="user${nom}${prenom}"]:checked`);
        if (!roleAttribue) {
            alert(`Veuillez attribuer un rôle à ${nom} ${prenom}.`);
            isValid = false;
        } else if (roleAttribue.value === "Chef de Projet") {
            // On compte le nombre de chefs de projet
            chefDeProjetCount++;
        }
    });

    // Si plus d'un chef de projet est attribué, on affiche une alerte et on met isValid à false
    if (chefDeProjetCount > 1) {
        alert("Vous ne pouvez pas attribuer le rôle de Chef de Projet à plus d'un utilisateur.");
        isValid = false;
    }

    return isValid;
}

export { validerFormulaireProjet, validerFormulaireUtilisateurs };
