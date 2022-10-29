<?php 
require_once('sqlStatement.php');


// class StudentManager extends SQLStatement 
// {
//     public function __construct($datasource)
//     {
//         parent::__construct("student", "Student", $datasource);
//     }

//     public function getByMail($email)
//     {
//         $req = $this->_database->prepare('SELECT * FROM student WHERE mail=?');
//         $req->execute(array($email));
//         $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Student");
//         return $req->fetch();
//     }
// }