<?php
    $title = 'Créer un SuProjet';

    // output buffer
    ob_start();
        include '../partials/header.inc.php';
    $menubar = ob_get_clean();
?>

<?php ob_start(); ?>
<form action="addSupProjet" method="post" role="form" class="project-form">
<!-- <form class="project-form"> -->
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md">
                <!-- Label pour le nom du projet -->
                <label for="project-name" class="form-label">Nom du Projet *</label>
                <!-- Champ de saisie pour le nom du projet -->
                <input type="text" class="form-control" id="nom-projet" name="nom-projet">
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-md">
                <!-- Label pour le chef de projet -->
                <label for="project-chef" class="form-label">Chef de Projet *</label>
            </div>
            <div class="col-md">
                <!-- Menu déroulant pour sélectionner le chef de projet -->
                <select class="form-select" id="chef-projet" name="chef-projet">
                    <?php if (!empty($users)) { ?>
                        <?php foreach ($users as $user) { ?>
                            <option value="<?= $user->getIdUser() ?>"> <?= htmlspecialchars($user->getNomUser() . ' ' . $user->getPrenomUser()) ?></option>
                        <?php } ?>
                    <?php } else { ?>
                        <option value="">Aucun utilisateur disponible</option>
                    <?php } ?>
                </select>
<!-- <option value="1">Dalton Joe</option>
<option value="2">Connor sarah</option>
<option value="3">Muller Dominique</option> -->
            </div>
            <div class="col-md">
                <!-- Label pour l'email du chef de projet -->
                <label for="project-chef-email" class="form-label">Email du Chef de Projet *</label>
            </div>
            <div class="col-md">
                <!-- Champ de saisie pour l'email du chef de projet -->
                <input type="email" class="form-control" id="chef-projet-email" name="chef-projet-email">
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-md">
                <!-- Label et champ de saisie pour la date de début du projet -->
                <label for="project-datestart" class="form-label">Début du Projet *</label>
                <input type="date" class="form-control" id="date-debut" name="date-debut" value="">
                <!-- Label et champ de saisie pour la date de fin du projet -->
                <label for="project-dateend" class="form-label">Fin du Projet *</label>
                <input type="date" class="form-control" id="date-fin" name="date-fin" value="">
            </div>
            <div class="col-md">
                <!-- Label et champ de saisie pour la description du projet -->
                <label for="project-descrip" class="form-label">Description du Projet</label>
                <textarea class="form-control" id="descrip-projet" name="descrip-projet" rows="4"></textarea>
            </div>
        </div>
    
    </div>
    <!-- Bouton pour soumettre le formulaire -->
    <button type="submit" class="btn btn-success bt-module" name="btn_valid_projet">Valider</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php include './base.php'; ?>