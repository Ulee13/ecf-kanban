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
            <!-- <tr>
                <td><img src="./assets/img/avat_cagoule.jpg" style="width: 35px;" alt=""></td>
                <td>Pseudo 01</td>
                <td>Mercury Freddy</td>
                <td>Développeur</td>
                <td>21</td>
                <td>
                    <a href="gestUser?id=" class="btn btn-primary">Modifier</a>
                    <a href="removeUser?id=" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td><img src="./assets/img/avat_jump.jpg" style="width: 35px;" alt=""></td>
                <td>Pseudo 02</td>
                <td>Dalton Joe</td>
                <td>Graphiste</td>
                <td>14</td>
                <td>
                    <a href="gestUser?id=" class="btn btn-primary">Modifier</a>
                    <a href="removeUser?id=" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td><img src="./assets/img/avat_cagoule.jpg" style="width: 35px;" alt=""></td>
                <td>Pseudo 03</td>
                <td>Gable Clark</td>
                <td>DevOp</td>
                <td>5</td>
                <td>
                    <a href="gestUser?id=" class="btn btn-primary">Modifier</a>
                    <a href="removeUser?id=" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td><img src="./assets/img/avat_jump.jpg" style="width: 35px;" alt=""></td>
                <td>Pseudo 04</td>
                <td>BatemanPatrick</td>
                <td>Développeur</td>
                <td>20</td>
                <td>
                    <a href="gestUser?id=" class="btn btn-primary">Modifier</a>
                    <a href="removeUser?id=" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td><img src="./assets/img/avat_cagoule.jpg" style="width: 35px;" alt=""></td>
                <td>Pseudo 05</td>
                <td>Connor Sarah</td>
                <td>Scrum Master</td>
                <td>1</td>
                <td>
                    <a href="gestUser?id=" class="btn btn-primary">Modifier</a>
                    <a href="removeUser?id=" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td><img src="./assets/img/avat_jump.jpg" style="width: 35px;" alt=""></td>
                <td>Pseudo 06</td>
                <td>Ptitegoot Corine</td>
                <td>Développeur</td>
                <td>34</td>
                <td>
                    <a href="gestUser?id=" class="btn btn-primary">Modifier</a>
                    <a href="removeUser?id=" class="btn btn-danger">Supprimer</a>
                </td>
            </tr> -->
        </tbody>
    </table>
    <a href="/KanBan/Dev/etape04_1/users.html" target="_blank" style="text-decoration:none"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
      </svg> Créer un nouvel utilisateur</a>
    <button type="submit" class="btn btn-success bt-module">Valider</button>

