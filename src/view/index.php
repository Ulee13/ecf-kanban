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
        include 'partials/header.inc.php';
    $menubar = ob_get_clean();
?>

<?php ob_start(); ?>
    <div class="container-fluid">
        <!-- Contenu principal -->
        <div class="row mt-3">
            <!-- *** Colonne gauche *** -->
            <div class="col-3 border-end">
                <h2 class="h5 p-3">Modules Disponibles</h2>
                <!-- Colonne Modules disponibles -->
                <div id="modules-list"> <!-- Affichage des Modules disponibles -->

                    <!-- Module Projet -->
                    <div class="module" draggable="true" data-module-type="gestion_projet">
                        <div class="module-header d-flex align-items-center">
                            <i class="bi bi-kanban-fill"></i></i> <!-- Icône du module -->
                            <span class="module-title ms-2">Gestion de Projet *</span>
                        </div>
                        <div class="module-content" id="gestProjet" style="display: none;"></div> <!-- insertion du formulaire -->
                    </div>
                    
                    <!-- Module Utilisateurs -->
                    <div class="module" draggable="true" data-module-type="gestion_utilisateurs">
                        <div class="module-header d-flex align-items-center">
                            <i class="bi bi-people-fill"></i> <!-- Icône du module -->
                            <span class="module-title ms-2">Gestion des Utilisateurs</span>
                        </div>
                        <div class="module-content" id="gestUser" style="display: none;"></div> <!-- insertion du formulaire -->
                    </div>

                    <!-- Module Plannification -->
                    <div class="module" draggable="true" data-module-type="gestion_plannification">
                        <div class="module-header d-flex align-items-center">
                            <i class="bi bi-calendar-event-fill"></i> <!-- Icône du module -->
                            <span class="module-title ms-2">Gestion de le Plannification</span>
                        </div>
                        <div class="module-content" id="gestPlan" style="display: none;"></div> <!-- inserion du formulaire -->
                    </div>

                    <!-- Module Messagerie -->
                    <div class="module" draggable="true" data-module-type="gestion_messagerie">
                        <div class="module-header d-flex align-items-center">
                            <i class="bi bi-envelope-fill"></i> <!-- Icône du module -->
                            <span class="module-title ms-2">Gestion de Messagerie</span>
                        </div>
                        <div class="module-content" id="gestMess" style="display: none;"></div> <!-- insertion du formulaire -->
                    </div>

                    <!-- Module Documents -->
                    <div class="module" draggable="true" data-module-type="gestion_documents">
                        <div class="module-header d-flex align-items-center">
                            <i class="bi bi-folder-fill"></i></i> <!-- Icône du module -->
                            <span class="module-title ms-2">Gestion des Documents</span>
                        </div>
                        <div class="module-content" id="gestDoc" style="display: none;"></div> <!-- insertion du formulaire -->
                    </div>

                    <!-- Module Calendrier -->
                    <div class="module" draggable="true" data-module-type="gestion_calendrier">
                        <div class="module-header d-flex align-items-center">
                            <i class="bi bi-calendar3"></i> <!-- Icône du module -->
                            <span class="module-title ms-2">Calendrier</span>
                        </div>
                        <div class="module-content" id="gestCal" style="display: none;"></div> <!-- insertion du formulaire -->
                    </div>

                </div>
            </div>

            <!-- *** Colonne droite : Zone principale *** -->
            <section class="col-9">
                <h2 class="h5 p-3 text-md-start text-center">Espace du Projet</h2>
                <div class="border rounded p-3" id="dropzone">
                    <p class="text-muted">Glissez et déposez les modules ici</p>
                    <div id="module-container">
                        <!-- Zone vide où le module sera injecté -->
                    </div> 
                </div>
            </section>
        </div>
    </div>

<!-- *** Modale *** -->
    <!-- Fenêtre modale Bootstrap pour confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Validation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Les informations ont bien été enregistrées !
                    <div id="project-details">
                        <!-- Détails du projet seront insérés ici -->
                    </div>
                    <div id="user-details">
                        <!-- Détails des utilisateurs seront insérés ici -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>

<?php include __DIR__ . '/base.php'; ?>