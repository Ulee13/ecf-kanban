<table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id SupProjet</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supProjets as $supProjet) { ?>
                    <tr>
                        <td><?= $supProjet->getIdSupprojet() ?></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>