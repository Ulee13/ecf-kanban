<form action="/addProjet" method="post" role="form" class="project-form">
<form class="project-form">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Label pour le nom du projet -->
                        <label for="project-name" class="form-label">Nom du Projet *</label>
                    </div>
                    <div class="col-md-6">
                        <!-- Champ de saisie pour le nom du projet -->
                        <input type="text" class="form-control" id="project-name">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Label pour la catégorie du projet -->
                        <label for="project-cat" class="form-label">Catégorie du Projet *</label>
                    </div>
                    <div class="col-md-6">
                        <!-- Menu déroulant pour sélectionner la catégorie du projet -->
                        <select class="form-select" id="project-cat">
                            <option value="">Sélectionnez une catégorie</option>
                            <option>Développement</option>
                            <option>Logistique</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Label pour le chef de projet -->
                        <label for="project-chef" class="form-label">Chef de Projet *</label>
                    </div>
                    <div class="col-md-6">
                        <!-- Menu déroulant pour sélectionner le chef de projet -->
                        <select class="form-select" id="project-chef">
                            <!-- Options ajoutées dynamiquement -->
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <!-- Label pour l'email du chef de projet -->
                        <label for="project-chef-email" class="form-label">Email du Chef de Projet *</label>
                    </div>
                    <div class="col-md-6">
                        <!-- Champ de saisie pour l'email du chef de projet -->
                        <input type="email" class="form-control" id="project-chef-email">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Label pour les participants -->
                        <label for="project-participants" class="form-label">Participants</label>
                        <br>
                        <!-- Petit texte pour expliquer comment sélectionner plusieurs participants -->
                        <i><small>Veuillez maintenir la touche Ctrl (ou Cmd) pour sélecrtionner plusieurs participants.</small></i>
                    </div>
                    <div class="col-md-6">
                        <!-- Menu déroulant pour sélectionner les participants, avec option multiple -->
                        <select class="form-select" id="project-participants" multiple>
                            <!-- ajouté dynamiquement -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <!-- Label et champ de saisie pour la date de début du projet -->
                        <label for="project-datestart" class="form-label">Début du Projet *</label>
                        <input type="date" class="form-control" id="project-datestart" value="">
                        <!-- Label et champ de saisie pour la date de fin du projet -->
                        <label for="project-dateend" class="form-label">Fin du Projet *</label>
                        <input type="date" class="form-control" id="project-dateend" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <!-- Label et champ de saisie pour la description du projet -->
                        <label for="project-descrip" class="form-label">Description du Projet</label>
                        <textarea class="form-control" id="project-descrip" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    <!-- Bouton pour soumettre le formulaire -->
    <button type="submit" class="btn btn-success bt-module">Valider</button>
</form>
