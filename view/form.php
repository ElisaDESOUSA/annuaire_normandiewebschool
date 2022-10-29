<?php 
    require_once ('../index.php');
    require_once('header.php');
    require_once('../services/pdo.php');
    require_once('../model/sqlStatement.php');
    require_once('../model/student.php');
    
?>

<div class="wrapper">
    <h1>Ajout d'un nouvel étudiant</h1>
    <form action="connect.php" method="post">
        <div class="form_input">
            <label for="firstname">Prénom</label>
            <input type="text" placeholder="Renseignez un prénom" name ="firstname" required>
        </div>
        <div class="form_input">
            <label for="name">Nom</label>
            <input type="text" placeholder="Renseignez un nom" name ="name" required>
        </div>
        <div class="form_input">
            <label for="emailAddress">Email</label>
            <input type="email" placeholder="Renseignez une adresse email" name="emailAddress" required>
        </div>
        <div class="form_input">
            <label for="phoneNumber" >Téléphone</label>
            <input type="text" placeholder="Renseignez un numéro de téléphone" name="phoneNumber" required>
        </div>
        <div class="form_input">
            <label for="year">Année</label>
            <select name="year" id="" required>
                <option value="default">Choissiez une année</option>
                <option value="annee_1_initial">Année 1 - Initial</option>
                <option value="annee_1_alternance">Année 1 - Alternance</option>
                <option value="annee_2_initial">Année 2 - Initial</option>
                <option value="annee_2_alternance">Année 2 - Alternance</option>
                <option value="annee_3_alternance">Année 3 - Alternance</option>
                <option value="non_renseignee">Non renseigné</option>
            </select>
        </div>
        <div class="form_input">
            <label for="specialization">Spécialité souhaitée</label>
            <select name="specialization" id="" required>
                <option value="default">Choissiez une spécialité</option>
                <option value="marketing">Marketing</option>
                <option value="developpement_web">Développement web</option>
                <option value="communication_graphique">Communication graphique</option>
                <option value="social_media_manager">Social media manager</option>
                <option value="non_renseignee">Non renseigné</option>
            </select>
        </div>
        <div class="contact_submit">
            <button type="submit" class="button button_green" id="submit" name="submit">Créer un nouvel étudiant</button>
        </div>
    </form>
</div>
