<!-- // if(isset($_GET['deleteid']))
// {
//     $id=$_GET['deleteid'];

//     $sql="delete from `students` where id=$id";
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
// -->

<?php

require_once('../services/database.php');
require_once('../model/sqlStatement.php');

// On instancie une nouvelle class Read pour qu'à chaque fois qu'on appelle le controller elle soit déjà instanciée automatiquement
$delete = new Delete;
$readForm = $delete->deleteStudent();

// Une fois la fonction exécutée, on redirige vers la liste étudiante
// header('location: http://localhost/annuaire_normandiewebschool/view/listStudent.php');

// On vient créer une class qui récupère les données de la BDD
class Delete 
{
    public function deleteStudent() 
    {

        // On instancie une nouvelle class SQLStatement qui va nous permettre d'utiliser la commande SELECT de la fonction getAll()
        $readForm = new SQLStatement();
        return $readForm->getAll();
    }
}