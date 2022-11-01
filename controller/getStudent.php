<?php 
    require_once('../index.php');
    require_once('../model/student.php');
    require_once('../services/database.php');
    require_once('../model/sqlStatement.php');

    // On instancie une nouvelle class Create pour qu'à chaque fois qu'on appelle le controller elle soit déjà instanciée automatiquement
    $getStudent = new StudentForm;
    $updateStudentForm = $getStudent->getStudent();
    
    // On vient créer une class qui récupère les données rentrées par l'utilisateur
    class StudentForm 
    {
        public function getStudent()
        {
            // On instancie une nouvelle class SQLStatement qui va nous permettre d'utiliser la commande UPDATE de update()
            $updateStudentForm = new SQLStatement();

            return $updateStudentForm->getById($_POST['id']);
        }
    }
?>