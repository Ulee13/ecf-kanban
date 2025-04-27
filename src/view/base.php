<!DOCTYPE html>
<html lang="fr">
    <head>
    <?php include __DIR__ . '/../partials/head.inc.php'; ?>
        <title><?= $title ?></title>
    </head>
    <body>
        <div class="wrapper">
            <!-- ======= Header ======= -->
            <?= $menubar ?>
            <!-- ======= Content ======= -->
            <?= $content ?>
            <!-- ======= Footer ======= -->
            <?php include __DIR__ . '/../partials/footer.php' ?>
        </div>
        <?php include __DIR__ . '/../partials/js.php' ?>
    </body>
</html>
