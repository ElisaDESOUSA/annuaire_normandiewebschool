<?php

require_once('../services/pdo.php');
require_once('../model/sqlStatement.php');


$pdo = new Database;
$sqlStatement = new SQLStatement(`students`, $pdo);
// $connection = new mysqli('localhost', 'root', '', 'annuaire_nws');

// if(!$connection) 
// {
//     die(mysqli_error($connection));
// };
echo "Creation nouvelle instance";

if(isset($_POST['submit'])) {
    echo ($_POST['year']);
    // Check if inputs are empty
    if(!empty($_POST['firstname']) 
    && !empty($_POST['name']) 
    && !empty($_POST['emailAddress']) 
    && !empty($_POST['phoneNumber'])
    && !empty($_POST['year']) 
    && !empty($_POST['specialization'])
    ) {
        echo "Check inputs";
        //Create a new Student 
        // $student = new Student($_POST['firstname'], $_POST['name'], $_POST['emailAddress'], $_POST['phoneNumber'], 
        // $_POST['year'], $_POST['specialization']);

        //Data
        $firstname = ($_POST['firstname']);
        $name = ($_POST['name']);
        $emailAddress = ($_POST['emailAddress']); 
        $phoneNumber = ($_POST['phoneNumber']);
        $year = ($_POST['year']);
        $specialization = ($_POST['specialization']);

        // Insert into table 'students'
        $insertForm = "INSERT INTO `students` (firstname, name, emailAddress, phoneNumber, year, specialization)
        VALUES('$firstname', '$name', '$emailAddress', '$phoneNumber', '$year', '$specialization')";
        $res = $insertForm;
        $pdo->connection->exec($insertForm);

        // $insertForm = $this->pdo->prepare(
        // "INSERT INTO `students`(firstname, name, emailAddress, phoneNumber, year, specialization) 
        // VALUES('$firstname', '$name', '$emailAddress', '$phoneNumber', '$year', '$specialization')");
        // $insertForm->execute(array($firstname, $name, $emailAddress, $phoneNumber, $year, $specialization));
        // echo "Bien envoyé";
    }
    else 
    {
        echo "Error dans l'envoi du formulaire";
    }
}
    // if($result)
    // {
    //     header('location:listStudent.php');
    // }
    // else 
    // {
    //     die(mysqli_error($connection));
    // }

// }

?>