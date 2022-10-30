<?php
    require_once ('../index.php');
    require_once('header.php');
    // require_once('connect.php');
    require_once('../services/database.php');
    require_once('../model/sqlStatement.php');
    require_once('../model/student.php');
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
            <?php
            // $res = $sql;
            // $result=mysqli_query($pdo, $sql);
            if(!empty($students))
            echo "Find students";
            {
                foreach($students as $row)

            //     while($row) 
            //     {
            //         $id=$row['id'];
            //         $firstname=$row['firstname'];
            //         $name=$row['name'];
            //         $emailAddress=$row['emailAddress'];
            //         $phoneNumber=$row['phoneNumber'];
            //         $year=$row['year'];
            //         $specialization=$row['specialization'];

            //         echo '<tr>
            //         <th scope="row">' . $id . '</th>
            //         <td>'. $firstname .'</td>
            //         <td>'. $name .'</td>
            //         <td>'. $emailAddress .'</td>
            //         <td>'. $phoneNumber .'</td>
            //         <td>'. $year .'</td>
            //         <td>'. $specialization .'</td>
            //         <td>
            //             <button class="button button_red"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
            //             <button class="button button_green"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
            //         </td>
            //         </tr>';
            //     }
            // }
            {?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["firstname"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["emailAddress"] ?></td>
                    <td><?= $row["phoneNumber"] ?></td>
                    <td><?= $row["year"] ?></td>
                    <td><?= $row["specialization"] ?></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
</div>
