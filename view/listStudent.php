<?php
    require_once('index.php');

    $db = new PDO('mysql:host=localhost;dbname=annuaire_nws', 'root', '');
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
            <tr>
                <td>#1</td>
                <td>Prénom 1</td>
                <td>Nom 1</td>
                <td>Email 1</td>
                <td>Téléphone</td>
                <td>Année 1</td>
                <td>Spécialité 1</td>
            </tr>
        </tbody>
    </table>
</div>
