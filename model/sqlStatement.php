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
		$req = $database->prepare("SELECT * FROM `students` WHERE id=?");
		$req->execute(array($id));
		// $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj);
		return $req->fetch();
	}
	
	public function getAll()
	{
		$readForm = [];
		// On instancie une nouvelle class Database afin de récupérer les données à la BDD
		$pdo = new Database([PDO::FETCH_ASSOC]);

		// On execute la commande SELECT avec les données récupérées depuis le controller
		$sql = "SELECT * FROM `students` WHERE 1";

		// Barre de recherche 
		$param = [];
		if (!empty($_GET['q'])) {
            $sql .= " WHERE nom LIKE :nom";
            $params['nom'] = '%' . $_GET['q'] . '%';
        }

		$req = $pdo->connection->prepare($sql);
		$req->execute();
		$resultat = $req->fetchAll();
		foreach($resultat as $row) {
			$readForm[] = new Student($row);
		}
		return $readForm;
	}
	
	public function create($firstname, $name, $emailAddress, $phoneNumber, $year, $specialization)
	{
		// On instancie une nouvelle class Database afin d'envoyer les données à la BDD
		$pdo = new Database;

		// On execute la commande INSERT avec les données récupérées depuis le controller
		$sql = "INSERT INTO `students` (firstname, name, emailAddress, phoneNumber, year, specialization)
		VALUES('$firstname', '$name', '$emailAddress', '$phoneNumber', '$year', '$specialization')";
		$req = $pdo->connection->prepare($sql);
		$req->execute();

	}
	
	public function update()
	{
		$pdo = new Database;
	}
	
	public function delete($id)
	{
		$pdo = new Database;

		$sql = "DELETE FROM `students` WHERE id='$id'";
		$resultat = $sql;
		$req = $pdo->connection->prepare($sql);
		$req->execute();

		if($resultat) {
			echo "delete $ID";
			return true;
		} else {
			return false;
		}

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