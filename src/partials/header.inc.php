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
                    <li><button class="dropdown-item" id="open-project">Ouvrir</button></li>
                    <li><button class="dropdown-item" id="cancel-edit">Annuler</button></li>
                </ul>
            </div>

            <!-- Menu PROJET pour affichage Desktop -->
            <div class="d-flex align-items-center d-none d-md-flex">
                <img src="/kanban/assets/img/logo-kanban.png" style="width: 200px;" alt="">
                <h1 class="h4">Manager ses Projets</h1>
                <a href="<?=WEBAPP_ROOT ?>/getSupProjet"><button class="btn btn-outline-success ms-2" id="open-project">Ouvrir</button></a>
                <a href="<?=WEBAPP_ROOT ?>/saveSupProjet"><button class="btn btn-outline-primary ms-3" id="save-project">Enregistrer</button></a>
                <a href="<?=WEBAPP_ROOT ?>/cancelSupProjet"><button class="btn btn-outline-warning ms-2" id="cancel-edit">Annuler</button></a>
            </div>

            <!-- Mode sombre/clair -->
            <div class="d-flex gap-2">
                <button class="btn btn-secondary btn-sm" id="toggle-theme">Mode Sombre</button>
            </div>
        </div>
    </div>
    
</div>
</header>