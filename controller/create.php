<?php

require_once('../services/database.php');
require_once('../model/sqlStatement.php');

// On instancie une nouvelle class Create pour qu'à chaque fois qu'on appelle le controller elle soit déjà instanciée automatiquement
$create = new Create;
$create->createStudent();

// Une fois la fonction exécutée, on redirige vers la liste étudiante
header('location: http://localhost/annuaire_normandiewebschool/view/listStudent.php');


// On vient créer une class qui récupère les données rentrées par l'utilisateur
class Create 
{
    public function createStudent() 
    {

        // On instancie une nouvelle class SQLStatement qui va nous permettre d'utiliser la commande INSERT de la fonction create()
        $insertForm = new SQLStatement();

		
        // On vérifie qu'un formulaire a été envoyé
		if(isset($_POST['submit'])) 
        {
			// On vérifie que les inputs sont bien remplis
			if(!empty($_POST['firstname']) 
			&& !empty($_POST['name']) 
			&& !empty($_POST['emailAddress']) 
			&& !empty($_POST['phoneNumber'])
			&& !empty($_POST['year']) 
			&& !empty($_POST['specialization'])
			) 
            {
				// On affecte les données du formulaire à des variables
				$firstname = ($_POST['firstname']);
				$name = ($_POST['name']);
				$emailAddress = ($_POST['emailAddress']); 
				$phoneNumber = ($_POST['phoneNumber']);
				$year = ($_POST['year']);
				$specialization = ($_POST['specialization']);
				//On récupère l'id correspondant à l'année renseignée
				$tempYear = $insertForm->yearGetId($year);
				$year_id = $tempYear->get_id();

				$tempSpecialization = $insertForm->specializationGetId($specialization);
				$specialization_id = $tempSpecialization->get_id();
            }

            // On passe les variables en paramètre de la fonction create() de SQLStatement
            return $insertForm->create($firstname, $name, $emailAddress, $phoneNumber, $year, $specialization, $year_id, $specialization_id);
        }
    }
}