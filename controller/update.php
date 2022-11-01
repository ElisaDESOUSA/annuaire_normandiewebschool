<?php 
    require_once('../index.php');
    require_once('../model/student.php');
    require_once('../services/database.php');
    require_once('../model/sqlStatement.php');

    // On instancie une nouvelle class Create pour qu'à chaque fois qu'on appelle le controller elle soit déjà instanciée automatiquement
    $update = new Update;
    $update->updateStudent();
    require_once('../view/formUpdate.php');
    
    // Une fois la fonction exécutée, on redirige vers la liste étudiante
    // header('location: http://localhost/annuaire_normandiewebschool/view/listStudent.php');

    // On vient créer une class qui récupère les données rentrées par l'utilisateur
    class Update 
    {
        public function updateStudent() 
        {
                // On instancie une nouvelle class SQLStatement qui va nous permettre d'utiliser la commande UPDATE de update()
                $updateForm = new SQLStatement();
                echo "fred la merde";
                return $updateForm->getById($_POST['id']);
                
                // $id = $_POST['id'];
                // // $firstname = $_POST['firstname'];
                // // $name = $_POST['name'];
                // // $emailAddress = $_POST['emailAddress'];
                // // $phoneNumber = $_POST['phoneNumber'];
                // // $year = $_POST['year'];
                // // $specialization = $_POST['specialization'];
                
                // return $updateForm->update($id, $firstname, $name, $emailAddress, $phoneNumber, $year, $specialization);
        }    
    }
?>


<!-- <div class="wrapper">
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
            <select name="specialization" id="" required value=<?php echo $specialization?>>
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
</div> -->
