<header>
<div class="container-fluid">
    <!-- Cette div représente la barre supérieure contenant les boutons d'action pour la gestion des projets et l'affichage du menu en mode mobile. -->
    <div class="row py-3">
        <div class="col d-flex justify-content-between align-items-center">
            <!-- Menu PROJET pour affichage Mobile -->
            <div class="dropdown d-md-none">
                <button class="btn btn-primary dropdown-toggle" type="button" id="projectMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions Projet
                </button>
                <ul class="dropdown-menu" aria-labelledby="projectMenu">
                    <li><button class="dropdown-item" id="save-project">Enregistrer</button></li>
                    <li><button class="dropdown-item" id="delete-project">Supprimer</button></li>
                    <li><button class="dropdown-item" id="cancel-edit">Annuler</button></li>
                </ul>
            </div>

            <!-- Menu PROJET pour affichage Desktop -->
            <div class="d-flex align-items-center d-none d-md-flex">
                <h1 class="h4">Créer un Nouveau Projet</h1>
                <button class="btn btn-outline-primary ms-3" id="save-project">Enregistrer</button>
                <button class="btn btn-outline-warning ms-2" id="cancel-edit">Annuler</button>
                <button class="btn btn-outline-danger ms-2" id="delete-project">Supprimer</button>
            </div>

            <!-- Mode sombre/clair -->
            <div class="d-flex gap-2">
                <button class="btn btn-secondary btn-sm" id="toggle-theme">Mode Sombre</button>
            </div>
        </div>
    </div>
</div>
</header>