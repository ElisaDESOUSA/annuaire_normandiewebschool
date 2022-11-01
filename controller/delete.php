<?php

require_once('../services/database.php');
require_once('../model/sqlStatement.php');

// On instancie une nouvelle class Read pour qu'à chaque fois qu'on appelle le controller elle soit déjà instanciée automatiquement
$delete = new Delete;
$delete->deleteStudent();

// Une fois la fonction exécutée, on redirige vers la liste étudiante
header('location: http://localhost/annuaire_normandiewebschool/view/listStudent.php');

// On vient créer une class qui récupère les données de la BDD
class Delete 
{
    public function deleteStudent() 
    {

        // On instancie une nouvelle class SQLStatement qui va nous permettre d'utiliser la commande DELETE de la fonction delete($id)
        if(isset($_POST['delete'])) {
            $deleteForm = new SQLStatement();
            $id = $_POST['id'];
            return $deleteForm->delete($id);
        }
    }
}

