<?php
    require_once ('../index.php');
    require_once('header.php');
    require_once('../controller/read.php');
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
                    <td class="actions">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8F8F8F" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <!-- <button class="button button_red"><a href="#" class="text-light">Update</a></button> -->
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8F8F8F" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1
                                1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </a>
                        <!-- <button class="button button_green"><a href="#" class="text-light">Delete</a></button>     -->
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
