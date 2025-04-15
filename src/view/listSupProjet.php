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
                    <th>Icône</th>
                    <th>Nom de Projet</th>
                    <th>Catégorie</th>
                    <th>Chef de Projet</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supProjets as $supProjet) { ?>
                    <tr>
                        <td><?= $supProjet->getIdIcone() ?></td>
                        <td><?= $supProjet->getIdProjet() ?></td>
                        <td><?= $supProjet->getIdSupprojet() ?></td>
                        <td><?= $supProjet->getComposition() ?></td>
                        <td><?= $supProjet->getPathImage() ?></td>
                        <td><?= $supProjet->getCategorie() ?></td>
                        <td>
                            <a href="gestProjet?id=<?= $supProjet->getId() ?>" class="btn btn-primary">Modifier</a>
                            <a href="cancelSupProjet?id=<?= $supProjet->getId() ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php $content = ob_get_clean(); ?>
<?php include 'view/base.php'; ?>