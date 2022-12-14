<?php

require_once('../services/database.php');
require_once('../model/sqlStatement.php');

// On instancie une nouvelle class Read pour qu'à chaque fois qu'on appelle le controller elle soit déjà instanciée automatiquement
$year = new ReadYear;

$readYear = $year->getYear();


// Une fois la fonction exécutée, on redirige vers la liste étudiante
// header('location: http://localhost/annuaire_normandiewebschool/view/listStudent.php');

// On vient créer une class qui récupère les données de la BDD
class ReadYear
{
    // public function readStudent() 
    // {

    //     // On instancie une nouvelle class SQLStatement qui va nous permettre d'utiliser la commande SELECT de la fonction getAll()
    //     $readForm = new SQLStatement();
    //     return $readForm->getAll();
    // }

    public function getYear()
    {
        $readYear = new SQLStatement();
        return $readYear->yearGetAll();
    }

    // public function readSpecialization()
    // {
    //     $readSpecialization = new SQLStatement();
    //     return $readSpecialization->specializationGetAll();
    // }
}