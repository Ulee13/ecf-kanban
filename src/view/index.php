<?php
    $title = "Kanban Project Manager";

    // if (isset($_GET['ajax']) && $_GET['ajax'] === 'moduleForm') {
    //     require_once __DIR__ . '/../controller/AjaxCntrl.php';
    //     $ajax = new AjaxCntrl();
    //     $ajax->loadModuleForm($_GET['module'] ?? '');
    //     exit;
    // }
    
    // output buffering
    ob_start();
        include __DIR__ . '/../partials/header.inc.php';
    $menubar = ob_get_clean();
?>

<?php ob_start(); ?>

<aside class="sidebar">
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <span class="fs-4">Projets</span>
    <hr>
        <?php foreach ($supProjets as $supProjet) { ?>
            <p><?= $supProjet->getIdSupprojets() ?></p>       
        <?php } ?>
    <hr>
    <div class="nav">
        <a href="#" class="btn btn-primary ms-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
            </svg>  
            Nouveau projet
        </a>
    </div>
  </div>
</aside>

    <article class="content">
        <p><strong>1. Main Content</strong></p>
        <a href="<?=WEBAPP_ROOT ?>/getSupProjet"><button class="btn btn-outline-success ms-2" id="open-project">Ouvrir</button></a>
        

        
    </article>
   


<?php $content = ob_get_clean(); ?>

<?php include __DIR__ . '/base.php'; ?>