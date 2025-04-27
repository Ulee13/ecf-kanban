<?php
    $title = 'Liste des SupProjets';

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
                    <th>Id Modulex</th>
                    <th>Id Projet</th>
                    <th>Id SupProjet</th>
                    <th>Date créa SupProjet</th>
                    <th>Couleur SupProjet</th>
                    <th>Nom Module Projet</th>
                    <th>Id Icône</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supProjets as $supProjet) { ?>
                    <tr>
                        <td><?= $supProjet->getIdModulex() ?></td>
                        <td><?= $supProjet->getIdProjet() ?></td>
                        <td><?= $supProjet->getIdSupprojet() ?></td>
                        <td><?= $supProjet->getDateCreaSupprojet() ?></td>
                        <td><?= $supProjet->getCoulSupprojet() ?></td>
                        <td><?= $supProjet->getNomModuleProjet() ?></td>
                        <td><?= $supProjet->getIdIcone() ?></td>
                        <td>
                            <a href="gestProjet?id=<?= $supProjet->getIdSupprojet() ?>" class="btn btn-primary">Modifier</a>
                            <a href="removeSupProjet?id=<?= $supProjet->getIdSupprojet() ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php $content = ob_get_clean(); ?>
<?php include 'view/base.php'; ?>