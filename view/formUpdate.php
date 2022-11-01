<?php

    require_once ('../index.php');
    require_once('../model/student.php');
    require_once('../controller/getStudent.php');

?>


<div class="wrapper">
    <h1>Modifier l'étudiant</h1>
    <form action="../controller/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $updateStudentForm->get_id(); ?>">
        <div class="form_input">
            <label for="firstname">Prénom</label>
            <input type="text" placeholder="Renseignez un prénom" name ="firstname" required value=<?= $updateStudentForm->get_firstname() ?>> 
        </div>
        <div class="form_input">
            <label for="name">Nom</label>
            <input type="text" placeholder="Renseignez un nom" name ="name" required value=<?= $updateStudentForm->get_name() ?>>
        </div>
        <div class="form_input">
            <label for="emailAddress">Email</label>
            <input type="email" id="email" placeholder="Renseignez une adresse email" name="emailAddress" required value=<?= $updateStudentForm->get_emailAddress() ?>>
        </div>
        <div class="form_input">
            <label for="phoneNumber" >Téléphone</label>
            <input type="text" pattern="[0-9]{10}" maxlenght="10" placeholder="Renseignez un numéro de téléphone" name="phoneNumber" required value=<?= $updateStudentForm->get_phoneNumber() ?>>
        </div>
        <div class="form_input">
            <label for="year">Année</label>
            <select name="year" id="" required value=<?= $updateStudentForm->get_year() ?>>
                <option value="default">Choissiez une année</option>
                <option value="A1 - Initial">Année 1 - Initial</option>
                <option value="A1 - Alternance">Année 1 - Alternance</option>
                <option value="A2 - Initial">Année 2 - Initial</option>
                <option value="A2 - Alternance">Année 2 - Alternance</option>
                <option value="A3 - Alternance">Année 3 - Alternance</option>
                <option value="Non renseigné">Non renseigné</option>
            </select>
        </div>
        <div class="form_input">
            <label for="specialization">Spécialité souhaitée</label>
            <select name="specialization" id="" required value=<?= $updateStudentForm->get_specialization() ?>>
                <option value="default">Choissiez une spécialité</option>
                <option value="Marketing">Marketing</option>
                <option value="Développement web">Développement web</option>
                <option value="Communication graphique">Communication graphique</option>
                <option value="Social media manager">Social media manager</option>
                <option value="Non renseigné">Non renseigné</option>
            </select>
        </div>
        <div class="contact_submit">
            <button type="submit" class="button button_green" id="submit" name="submit">Modifier l'étudiant</button>
        </div>
    </form>
</div>
