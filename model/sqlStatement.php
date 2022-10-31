<?php

require_once('../services/database.php');
require_once('../model/student.php');


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
		$sql = "SELECT * FROM `students`";

		// Barre de recherche par nom de famille de l'étudiant
		$params = [];
		if (!empty($_GET['q'])) 
		{
            $sql .= "WHERE name LIKE :name";
            $params['name'] = '%' . $_GET['q'] . '%';
        }

		// Tri de chaque colonne par ordre croissant et décroissant
		$sortable = ["id", "firstname", "name", "emailAddress", "phoneNumber", "year", "specialization"];

		// Permet de vérifier que ce que les colonnes que l'on trie se trouve dans la variable $sortable
		if (!empty($_GET['sort']) && in_array($_GET['sort'], $sortable)) 
		{
			$direction = $_GET['dir'] ?? 'asc';
			// Permet de s'assurer qu'il n'y a que la valeur 'asc' ou 'desc' de pris en compte, et redirige automatiquement vers 'asc' autrement
			if(!in_array($direction, ['asc', 'desc'])) 
			{
				$direction = 'asc';
			}
			$sql .= " ORDER BY " . $_GET['sort'] . " $direction";
		}
		$req = $pdo->connection->prepare($sql);
		$req->execute($params);
		$resultat = $req->fetchAll();
		// var_dump($resultat);
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