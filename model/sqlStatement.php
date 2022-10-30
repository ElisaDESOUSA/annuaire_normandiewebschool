<?php

require_once('../services/database.php');
require_once('../model/student.php');
// require_once('../controller/create.php');


class SQLStatement
{
	private $table;
	// private $_object;
	private $database;
	
	// public function __construct($table, $database)
	// {
	// 	$this->_table = $_table;
	// 	// $this->_object = $object;
	// 	$this->_database = $_database;
	// }
	
	public function getById($id)
	{
		$pdo = new Database;
		$req = $_database->prepare("SELECT * FROM " . $this->_table . " WHERE id=?");
		$req->execute(array($id));
		// $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj);
		return $req->fetch();
	}
	
	public function getAll()
	{
		$pdo = new Database;
		$sql = 'SELECT * FROM' . $this->_table;
		$req = $this->_database->connection->prepare($sql);
		$req->execute();
		// $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj);
		$res = $req->fetchAll(PDO::FETCH_ASSOC);

		// foreach($res as $row) 
		// {
		// 	$students[] = new Student($row);
		// }
		// return $students;
	}
	
	public function create($firstname, $name, $emailAddress, $phoneNumber, $year, $specialization)
	{
		// On instancie une nouvelle class Database afin d'envoyer les données à la BDD
		$pdo = new Database;

		// On execute la commande INSERT avec les données récupérées depuis le controller
		$sql = "INSERT INTO `students` (firstname, name, emailAddress, phoneNumber, year, specialization)
		VALUES('$firstname', '$name', '$emailAddress', '$phoneNumber', '$year', '$specialization')";
		$pdo->connection->exec($sql);

		// if(isset($_POST['submit'])) {
		// 	// Check if inputs are empty
		// 	if(!empty($_POST['firstname']) 
		// 	&& !empty($_POST['name']) 
		// 	&& !empty($_POST['emailAddress']) 
		// 	&& !empty($_POST['phoneNumber'])
		// 	&& !empty($_POST['year']) 
		// 	&& !empty($_POST['specialization'])
		// 	) {
		// 		//Create a new Student 
		// 		// $student = new Student($_POST['firstname'], $_POST['name'], $_POST['emailAddress'], $_POST['phoneNumber'], 
		// 		// $_POST['year'], $_POST['specialization']);
		
		// 		//Data
		// 		$firstname = ($_POST['firstname']);
		// 		$name = ($_POST['name']);
		// 		$emailAddress = ($_POST['emailAddress']); 
		// 		$phoneNumber = ($_POST['phoneNumber']);
		// 		$year = ($_POST['year']);
		// 		$specialization = ($_POST['specialization']);
		
		// 		// Insert into table 'students'
		// 		// $sql = "INSERT INTO `students` (firstname, name, emailAddress, phoneNumber, year, specialization)
		// 		// VALUES('$firstname', '$name', '$emailAddress', '$phoneNumber', '$year', '$specialization')";
		// 		// $pdo->connection->exec($sql);
		// 		// header('location:listStudent.php');
		// 	}
		// 	else 
		// 	{
		// 		echo "Error dans l'envoi du formulaire";
		// 	}
		// }
		
		// $sql = 'INSERT INTO' . $this->_table . 'VALUES ("")';
        // $req = $this->connection->prepare($sql);
        // $req->execute();
	}
	
	public function update()
	{
		$pdo = new Database;
	}
	
	public function delete($id)
	{
		$pdo = new Database;
	}
	// {
	// 	if(property_exists($obj,"id"))
	// 	{
	// 		$req = $_database->prepare("DELETE FROM " . $this->_table . " WHERE id=?");
	// 		return $req->execute(array($obj->id));
	// 	}
	// 	// else
	// 	// {
	// 	// 	throw new PropertyNotFoundException($this->_object, "id");	
	// 	// }
	// }
}