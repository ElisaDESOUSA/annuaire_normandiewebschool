<?php
    require_once ('home.php');
    require_once('header.php');
    require_once('connect.php');
    require_once('../services/pdo.php');
    require_once('../model/sqlStatement.php');
    require_once('../model/student.php');
    $datatest = new Database;
    $sql = new SQLStatement(`students`, $datatest);
    $students = $sql->getAll();

?>

<div class="wrapper">
    <div class="heading">
        <div class="heading_list">
            <h1>Nombre d'étudiants</h1>
            <p>Insérez le nombre d'étudiant</p>
        </div>
        <div class="heading_button">
            <a href="#" class="button button_red">Filter la liste étudiante</a>
            <a href="form.php" class="button button_green">Ajout d'un nouvel étudiant</a>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="Select * from `students`";
            $result=mysqli_query($connection, $sql);
            if($result)
            {
                while($row=mysqli_fetch_assoc($result)) 
                {
                    $id=$row['id'];
                    $firstname=$row['firstname'];
                    $name=$row['name'];
                    $emailAddress=$row['emailAddress'];
                    $phoneNumber=$row['phoneNumber'];
                    $year=$row['year'];
                    $specialization=$row['specialization'];

                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>'. $firstname .'</td>
                    <td>'. $name .'</td>
                    <td>'. $emailAddress .'</td>
                    <td>'. $phoneNumber .'</td>
                    <td>'. $year .'</td>
                    <td>'. $specialization .'</td>
                    <td>
                        <button class="button button_red"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                        <button class="button button_green"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
                }
            }
            ?>
            <?php foreach($students as $student) {?>
                <tr>
                    <td><?= $student["id"] ?></td>
                    <td><?= $student["firstname"] ?></td>
                    <td><?= $student["name"] ?></td>
                    <td><?= $student["emailAddress"] ?></td>
                    <td><?= $student["phoneNumber"] ?></td>
                    <td><?= $student["year"] ?></td>
                    <td><?= $student["specialization"] ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
