<?php 
    require_once('../index.php');
    require_once('../model/student.php');
    require_once('../services/database.php');
 
    // $id=$_GET['updateid'];
    // // Permet d'afficher les données déjà inscrite sur la ligne dans le formulaire UPDATE
    // $sql="Select * from `students` where id=$id";
    // $result=mysqli_query($connection, $sql);
    // $row=mysqli_fetch_assoc($result);
    // $id=$row['id'];
    // $firstname=$row['firstname'];
    // $name=$row['name'];
    // $emailAddress=$row['emailAddress'];
    // $phoneNumber=$row['phoneNumber'];
    // $year=$row['year'];
    // $specialization=$row['specialization'];
    
    // if(isset($_POST['submit'])) {
    //     $firstname=$_POST['firstname'];
    //     $name=$_POST['name'];
    //     $emailAddress=$_POST['emailAddress'];
    //     $phoneNumber=$_POST['phoneNumber'];
    //     $year=$_POST['year'];
    //     $specialization=$_POST['specialization'];

    //     $sql="update into `students` set id='$id', firstname='$firstname', name='$name', emailAddress='$emailAddress',
    //     phoneNumber='$phoneNumber', year='$year', specialization='$specialization' where id=$id";
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
            <input type="text" placeholder="Renseignez un prénom" name ="firstname" required value=<?php echo $firstname;?>>
        </div>
        <div class="form_input">
            <label for="name">Nom</label>
            <input type="text" placeholder="Renseignez un nom" name ="name" required value=<?php echo $name;?>>
        </div>
        <div class="form_input">
            <label for="emailAddress">Email</label>
            <input type="email" placeholder="Renseignez une adresse email" name="emailAddress" required value=<?php echo $emailAddress;?>>
        </div>
        <div class="form_input">
            <label for="phoneNumber" >Téléphone</label>
            <input type="text" placeholder="Renseignez un numéro de téléphone" name="phoneNumber" required value=<?php echo $phoneNumber;?>>
        </div>
        <div class="form_input">
            <label for="year">Année</label>
            <select name="year" id="" required value=<?php echo $year;?>>
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
            <select name="specialization" id="" required value=<?php echo $se;?>>
                <option value="">Choissiez une spécialité</option>
                <option value="">Marketing</option>
                <option value="">Développement web</option>
                <option value="">Communication graphique</option>
                <option value="">Social media manager</option>
                <option value="">Non renseigné</option>
            </select>
        </div>
        <div class="contact_submit">
            <button type="submit" class="button button_green" id="submit" name="submit">Modifier les données de l'étudiant</button>
        </div>
    </form>
</div>
