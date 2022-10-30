<?php
    require_once ('../index.php');
    require_once('header.php');
    require_once('../controller/read.php');
    // $pdo = new Database;
    // $sqlStatement = new SQLStatement(`students`, $pdo);
    // $students = $sqlStatement->getAll();

?>

<div class="wrapper">
    <div class="heading">
        <div class="heading_list">
            <h1>Nombre d'étudiants</h1>
            <p>Insérez le nombre d'étudiant</p>
        </div>

        <!-- Boutons action filtrage et ajout d'un nouvel étudiant -->
        <div class="heading_button">
            <a href="#" class="button button_red">Filter la liste étudiante</a>
            <a href="form.php" class="button button_green">Ajout d'un nouvel étudiant</a>
        </div>
    </div>

    <!-- Liste étudiants  -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom </th>
                <th>Adresse mail</th>
                <th>Téléphone</th>
                <th>Année</th>
                <th>Spécialité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($readForm as $row): ?>
                <tr>
                    <td><?= $row->get_id() ?></td>
                    <td><?= $row->get_firstname() ?></td>
                    <td><?= $row->get_name() ?></td>
                    <td><?= $row->get_emailAddress() ?></td>
                    <td><?= $row->get_phoneNumber() ?></td>
                    <td><?= $row->get_year() ?></td>
                    <td><?= $row->get_specialization() ?></td>
                    <td>
                        <button class="button button_red"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                        <button class="button button_green"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>    
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
