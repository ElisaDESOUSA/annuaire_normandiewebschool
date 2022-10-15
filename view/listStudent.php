<?php
    require_once('home.php');
    require_once('header.php');
    require_once('../services/pdo.php');
    $query = $pdo->query('SELECT * FROM students');
    $students = $query->fetchAll(PDO::FETCH_OBJ);
?>

<div class="wrapper">
    <div class="heading">
        <div class="heading_list">
            <h1>Nombre d'étudiants</h1>
            <p>Insérez le nombre d'étudiant</p>
        </div>
        <div class="heading_button">
            <a href="#" class="button button_red">Filter la liste étudiante</a>
            <a href="#" class="button button_green">Ajout d'un nouvel étudiant</a>
        </div>
    </div>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student); ?>
            <tr>
                <td><?= $student->id ?></td>
                <td><?= $student->firstname ?></td>
                <td><?= $student->name ?></td>
                <td><?= $student->email ?></td>
                <td><?= $student->phoneNumber ?></td>
                <td><?= $student->year ?></td>
                <td><?= $student->specialization ?></td>
            </tr>
        </tbody>
    </table>
</div>
