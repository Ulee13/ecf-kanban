<header class="header">
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
                    <li><button class="dropdown-item" id="save-project">Créer</button></li>
                    <li><button class="dropdown-item" id="open-project">Ouvrir</button></li>
                    <!-- <li><button class="dropdown-item" id="cancel-edit">Annuler</button></li> -->
                </ul>
            </div>

            <!-- Menu PROJET pour affichage Desktop -->
            <div class="d-flex align-items-center d-none d-md-flex">
                <img src="/kanban/assets/img/logo-kanban.png" width="200" alt="logo Kanban">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <!-- <a class="btn btn-outline-success ms-2" href="#">Ouvrir</a> -->
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</header>