<table class="table table-striped">
    <thead class="thead-light">    
        <tr>
            <th>Avatar</th>
            <th>Pseudo</th>
            <th>Nom & Prénom</th>
            <th>Email</th>
            <th>Identifiant Unique</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users) && is_array($users)) { ?>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><img src="./assets/img/<?= $user->getAvatarUser() ?>" style="width: 35px;" alt=""></td>
                    <td><?= $user->getUsername() ?></td>
                    <td><?= $user->getNomUser() . ' ' . $user->getPrenomUser() ?></td>
                    <td><?= $user->getEmailUser() ?></td> <!-- Remplace Profession -->
                    <td><?= $user->getIdUser() ?></td>
                    <td>
                        <a href="gestUser?id=<?= $user->getIdUser() ?>" class="btn btn-primary">Modifier</a>
                        <a href="removeUser?id=<?= $user->getIdUser() ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
                <tr>
                    <td colspan="6">Aucun utilisateur trouvé.</td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<form action="addUser" method="post" role="form" class="user-form">
    <!-- <form class="user-form"> -->
    <div class="container-fluid">
        
        <div class="row mb-3">
            <div class="col-md">
                <!-- Label pour le pseudo de l'utilisateur -->
                <label for="username" class="form-label">Pseudo utilisateur *</label>
                <!-- Champ de saisie pour le pseudo de l'utilisateur -->
                <input type="text" class="form-control" id="username" name="username">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md">
                <!-- Label pour le Nom de l'utilisateur -->
                <label for="nom-user" class="form-label">Nom *</label>
            </div>
            <div class="col-md">
                <input type="text" class="form-control" id="nom-user" name="nom-user">
            </div>

            <div class="col-md">
                <!-- Label pour le Prénom de l'utilisateur -->
                <label for="prenom-user" class="form-label">Prénom *</label>
            </div>
            <div class="col-md">
                <!-- Champ de saisie pour l'email du chef de projet -->
                <input type="text" class="form-control" id="prenom-user" name="prenom-user">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md">
                <!-- Label pour le Nom de le password -->
                <label for="pass-word" class="form-label">Password *</label>
            </div>
            <div class="col-md">
                <input type="text" class="form-control" id="pass-word" name="pass-word">
            </div>

            <div class="col-md">
                <!-- Label pour l'email de l'utilisateur -->
                <label for="email-user" class="form-label">Email *</label>
            </div>
            <div class="col-md">
                <!-- Champ de saisie pour l'email de l'utilisateur -->
                <input type="email" class="form-control" id="email-user" name="email-user">
            </div>
        </div>
        </div>
        </div>
        <input type="hidden" name="date-creation" value="<?= date('Y-m-d') ?>">
    </div>
    <button type="submit" class="btn btn-success bt-module" name="btn_valid_user">Valider</button>
</form>



<!-- <div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                </svg>
                Créer un nouvel utilisateur
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                
            </div>
        </div>
    </div>
</div> -->
<button type="submit" class="btn btn-success bt-module">Validerxx</button>

