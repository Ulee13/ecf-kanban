<form action="<?=WEBAPP_ROOT ?>/addPlan" method="post" role="form" class="planning-form">
    <div class="mb-3">
        <label for="task-name" class="form-label">Nom de la Tâche</label>
        <input type="text" class="form-control" id="task-name">
    </div>
    <div class="mb-3">
        <label for="task-date" class="form-label">Date</label>
        <input type="date" class="form-control" id="task-date">
    </div>
    <button type="submit" class="btn btn-success">Ajouter Tâche</button>
</form>