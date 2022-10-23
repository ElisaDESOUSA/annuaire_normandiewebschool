<?php 
    require_once('home.php');
    require_once('header.php');
    require_once('../model/student.php');
    require_once('../services/pdo.php');
    require_once('connect.php');
    
    // if(isset($_POST['submit'])) {
    //     $firstname=$_POST['firstname'];
    //     $name=$_POST['name'];
    //     $emailAddress=$_POST['emailAddress'];
    //     $phoneNumber=$_POST['phoneNumber'];
    //     $year=$_POST['year'];
    //     $specialization=$_POST['specialization'];

    //     $sql="insert into `students` (firstname, name, emailAddress, phoneNumber, year, specialization)
    //     values('$firstname', '$name', '$emailAddress', '$phoneNumber', '$year', '$specialization')";
    //     $result=mysqli_query($connection, $sql);
    //     if($result)
    //     {
    //         header('location:listStudent.php');
    //     }
    //     else 
    //     {
    //         die(mysqli_error($connection));
    //     }

    // }
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
                <option value="">Année 1 - Initial</option>
                <option value="">Année 1 - Alternance</option>
                <option value="">Année 2 - Initial</option>
                <option value="">Année 2 - Alternance</option>
                <option value="">Année 3 - Alternance</option>
                <option value="">Non renseigné</option>
            </select>
        </div>
        <div class="form_input">
            <label for="specialization">Spécialité souhaitée</label>
            <select name="specialization" id="" required>
                <option value="">Choissiez une spécialité</option>
                <option value="">Marketing</option>
                <option value="">Développement web</option>
                <option value="">Communication graphique</option>
                <option value="">Social media manager</option>
                <option value="">Non renseigné</option>
            </select>
        </div>
        <div class="contact_submit">
            <button type="submit" class="button button_green" id="submit" name="submit">Créer un nouvel étudiant</button>
        </div>
    </form>
</div>
