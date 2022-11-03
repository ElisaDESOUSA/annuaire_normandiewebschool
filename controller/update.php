<?php 
    require_once('../index.php');
    require_once('../model/student.php');
    require_once('../services/database.php');
    require_once('../model/sqlStatement.php');

    // On instancie une nouvelle class Create pour qu'à chaque fois qu'on appelle le controller elle soit déjà instanciée automatiquement
    $update = new Update;
    $updateForm = $update->updateStudent();
    
    // // Une fois la fonction exécutée, on redirige vers la liste étudiante
    header('location: http://localhost/annuaire_normandiewebschool/view/listStudent.php');

    // On vient créer une class qui récupère les données rentrées par l'utilisateur
    class Update 
    {
        public function updateStudent() 
        {
                // On instancie une nouvelle class SQLStatement qui va nous permettre d'utiliser la commande UPDATE de update()
                $updateForm = new SQLStatement();
                
                $id = ($_POST['id']);
                $firstname = ($_POST['firstname']);
                $name = ($_POST['name']);
                $emailAddress = ($_POST['emailAddress']);
                $phoneNumber = ($_POST['phoneNumber']);
                $year = ($_POST['year']);
                $specialization = ($_POST['specialization']);

                $tempYear = $updateForm->yearGetId($year);
				$year_id = $tempYear->get_id();

				$tempSpecialization = $updateForm->specializationGetId($specialization);
				$specialization_id = $tempSpecialization->get_id();
                
                return $updateForm->update($id, $firstname, $name, $emailAddress, $phoneNumber, $year, $specialization, $year_id, $specialization_id);
        }  
    }
?>