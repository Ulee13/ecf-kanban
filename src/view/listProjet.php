<?php
    $title = 'Liste des Projets';

    // output buffer
    ob_start();
        include 'partials/header.inc.php';
    $menubar = ob_get_clean();
?>

<?php ob_start(); ?>
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id Projet</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>Description</th>
                    <th>Nom Projet</th>
                    <th>Id Utilisateur</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
    <?php if (!empty($projets)) { ?>
        <?php foreach ($projets as $projet) { ?>
            <tr>
                <td><?= $projet->getIdProjet() ?></td>
                <td><?= $projet->getDateDebut() ?></td>
                <td><?= $projet->getDureeProjet() ?></td>
                <td><?= $projet->getDesc() ?></td>
                <td><?= $projet->getNomProjet() ?></td>
                <td><?= $projet->getIdUser() ?></td>
                <td>
                    <a href="gestProjet?id=<?= $projet->getIdProjet() ?>" class="btn btn-primary">Modifier</a>
                    <a href="removeProjet?id=<?= $projet->getIdProjet() ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="7" class="text-center">Aucun projet trouvé.</td>
        </tr>
    <?php } ?>
</tbody>
        </table>
    </div>

<?php $content = ob_get_clean(); ?>
<?php include './base.php'; ?>