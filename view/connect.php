<?php
if(isset($_POST))
{
    // Check if inputs are empty
    if(!empty($_POST['firstname']) && !empty($_POST['nom']) && !empty($_POST['emailAddress']) && !empty($_POST['phoneNumber'])
    && !empty($_POST['year']) && !empty($_POST['phoneNumber']) && !empty($_POST['specialization']))
    {
        //Create a new Student 
        $student = new Student($_POST['firstname'], $_POST['name'], $_POST['emailAddress'], $_POST['phoneNumber'], 
        $_POST['year'], $_POST['specialization']);

        //Data
        $firstname = ($_POST['firstname']);
        $name = ($_POST['name']);
        $emailAddress = ($_POST['emailAddress']); 
        $phoneNumber = ($_POST['phoneNumber']);
        $year = ($_POST['year']);
        $specialization = ($_POST['specialization']);

        // Insert into table 'students'
        $insertForm = $this->pdo->prepare('INSERT INTO `students`(firstname, name, emailAddress, phoneNumber, year, specialization) VALUES(?, ?, ?, ?, ?, ?)');
        $insertForm->execute(array($firstname, $name, $emailAddress, $phoneNumber, $year, $specialization));
       
    }
    else 
    {
        echo "Error dans l'envoi du formulaire";
    }
}


?>