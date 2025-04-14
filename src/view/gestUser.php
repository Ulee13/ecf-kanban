<form action="<?=WEBAPP_ROOT ?>/addUser" method="post" role="form" class="user-form">
    <table class="table">
        <tr>
            <th>Nom d'utilisateur</th>
            <th>Chef de Projet</th>
            <th>Admin</th>
            <th>Lead</th>
            <th>Collaborateur</th>
        </tr>
        <tr>
            <td>Mercury Freddy</td>
            <td><input type="radio" name="userMercuryFreddy" value="Chef de Projet"></td>
            <td><input type="radio" name="userMercuryFreddy" value="Admin"></td>
            <td><input type="radio" name="userMercuryFreddy" value="Lead"></td>
            <td><input type="radio" name="userMercuryFreddy" value="Collaborateur"></td>
        </tr>
        <tr>
            <td>Dalton Joe</td>
            <td><input type="radio" name="userDaltonJoe" value="Chef de Projet"></td>
            <td><input type="radio" name="userDaltonJoe" value="Admin"></td>
            <td><input type="radio" name="userDaltonJoe" value="Lead"></td>
            <td><input type="radio" name="userDaltonJoe" value="Collaborateur"></td>
        </tr>
        <tr>
            <td>Gable Clark</td>
            <td><input type="radio" name="userGableClark" value="Chef de Projet"></td>
            <td><input type="radio" name="userGableClark" value="Admin"></td>
            <td><input type="radio" name="userGableClark" value="Lead"></td>
            <td><input type="radio" name="userGableClark" value="Collaborateur"></td>
        </tr>
        <tr>
            <td>Bateman Patrick</td>
            <td><input type="radio" name="userBatemanPatrick" value="Chef de Projet"></td>
            <td><input type="radio" name="userBatemanPatrick" value="Admin"></td>
            <td><input type="radio" name="userBatemanPatrick" value="Lead"></td>
            <td><input type="radio" name="userBatemanPatrick" value="Collaborateur"></td>
        </tr>
        <tr>
            <td>Connor Sarah</td>
            <td><input type="radio" name="userConnorSarah" value="Chef de Projet"></td>
            <td><input type="radio" name="userConnorSarah" value="Admin"></td>
            <td><input type="radio" name="userConnorSarah" value="Lead"></td>
            <td><input type="radio" name="userConnorSarah" value="Collaborateur"></td>
        </tr>
        <tr>
            <td>Ptitegoot Corine</td>
            <td><input type="radio" name="userPtitegootCorine" value="Chef de Projet"></td>
            <td><input type="radio" name="userPtitegootCorine" value="Admin"></td>
            <td><input type="radio" name="userPtitegootCorine" value="Lead"></td>
            <td><input type="radio" name="userPtitegootCorine" value="Collaborateur"></td>
        </tr>
    </table>
    <a href="/KanBan/Dev/etape04_1/users.html" target="_blank" style="text-decoration:none"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
      </svg> Créer un nouvel utilisateur</a>
    <button type="submit" class="btn btn-success bt-module">Valider</button>
</form>

