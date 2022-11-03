<?php

require_once('../services/database.php');
require_once('../model/student.php');
require_once('../model/year.php');
require_once('../model/specialization.php');


class SQLStatement
{
	private $table;
	private $database;
	
	
	public function getById($id)
	{
		$pdo = new Database;

		$req = $pdo->connection->prepare("SELECT * FROM `students` WHERE id='$id'");
		$req->execute(array($id));
		$resultat = $req->fetch();
		return $student = new Student($resultat);
	}	
	
	public function getByYearId($year_id, $specialization_id)
	{
		$readForm = [];
		// On instancie une nouvelle class Database afin de récupérer les données à la BDD
		$pdo = new Database([PDO::FETCH_ASSOC]);

		// On execute la commande SELECT avec les données récupérées depuis le controller
		if($year_id != 0 && $specialization_id != 0)
		{
			$sql = "SELECT * FROM `students` WHERE year_id='$year_id' AND specialization_id='$specialization_id'";
		}
		elseif($year_id == 0 && $specialization_id != 0)
		{
			$sql = "SELECT * FROM `students` WHERE specialization_id='$specialization_id'";
		}
		elseif($year_id != 0 && $specialization_id == 0)
		{
			$sql = "SELECT * FROM `students` WHERE year_id='$year_id'";
		}
		elseif($year_id == 0 && $specialization_id == 0)
		{
			$sql = "SELECT * FROM `students`";
		}

		// Prepare et exécute les requêtes SQL
		$req = $pdo->connection->prepare($sql);
		$req->execute();
		$resultat = $req->fetchAll();

		foreach($resultat as $row) {
			$readForm[] = new Student($row);
		}
		return $readForm;
	}

	public function yearGetId($name)
	{
		$pdo = new Database;
		
		$sql = "SELECT * FROM `year` WHERE name='$name'";
		$req = $pdo->connection->prepare($sql);
		$req->execute();
		$resultat = $req->fetch();

		return $resultat = new Year($resultat);
		
	}

	public function specializationGetId($name)
	{
		$pdo = new Database;
		
		$sql = "SELECT * FROM `specialization` WHERE name='$name'";
		$req = $pdo->connection->prepare($sql);
		$req->execute();
		$resultat = $req->fetch();

		return $resultat = new Specialization($resultat);
		
	}

	public function yearGetAll()
	{
		$pdo = new Database;

		$readYear = [];
		$sql = "SELECT * FROM `year`";
		$req = $pdo->connection->prepare($sql);
		$req->execute();
		$resultat = $req->fetchAll();
		
		foreach($resultat as $row) {
			$readYear[] = new Year($row);
		}
		return $readYear;
	}
	
	public function specializationGetAll()
	{
		$pdo = new Database;

		$readSpecialization = [];
		$sql = "SELECT * FROM `specialization`";
		$req = $pdo->connection->prepare($sql);
		$req->execute();
		$resultat = $req->fetchAll();
		
		foreach($resultat as $row) {
			$readSpecialization[] = new Specialization($row);
		}
		return $readSpecialization;
	}

	public function getAll()
	{
		$readForm = [];
		// On instancie une nouvelle class Database afin de récupérer les données à la BDD
		$pdo = new Database([PDO::FETCH_ASSOC]);

		// On execute la commande SELECT avec les données récupérées depuis le controller
		$sql = "SELECT * FROM `students`";

		// Barre de recherche
		$params = [];

		if (!empty($_GET['q'])) 
		{
			// Vérifie si ma recherche correspond à un des champs
            $sql .= "WHERE name LIKE :name";
            $sql .= " OR firstname LIKE :firstname";
            $sql .= " OR emailAddress LIKE :emailAddress";
            $sql .= " OR phoneNumber LIKE :phoneNumber";
            $sql .= " OR year LIKE :year";
			$sql .= " OR specialization LIKE :specialization";

            $params['name'] = '%' . $_GET['q'] . '%';
            $params['firstname'] = '%' . $_GET['q'] . '%';
            $params['emailAddress'] = '%' . $_GET['q'] . '%';
            $params['phoneNumber'] = '%' . $_GET['q'] . '%';
            $params['year'] = '%' . $_GET['q'] . '%';
            $params['specialization'] = '%' . $_GET['q'] . '%';
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

		// Prepare et exécute les requêtes SQL
		$req = $pdo->connection->prepare($sql);
		$req->execute($params);
		$resultat = $req->fetchAll();

		foreach($resultat as $row) {
			$readForm[] = new Student($row);
		}
		return $readForm;
	}
	
	public function create($firstname, $name, $emailAddress, $phoneNumber, $year, $specialization, $year_id, $specialization_id)
	{
		// On instancie une nouvelle class Database afin d'envoyer les données à la BDD
		$pdo = new Database;

		// On execute la commande INSERT avec les données récupérées depuis le controller
		$sql = "INSERT INTO `students` (firstname, name, emailAddress, phoneNumber, year, specialization, year_id, specialization_id)
		VALUES('$firstname', '$name', '$emailAddress', '$phoneNumber', '$year', '$specialization', '$year_id','$specialization_id')";
		$req = $pdo->connection->prepare($sql);
		$req->execute();

	}
	
	public function update($id, $firstname, $name, $emailAddress, $phoneNumber, $year, $specialization, $year_id, $specialization_id)
	{
		$pdo = new Database;

		$sql = "UPDATE `students` SET firstname='$firstname', name='$name', emailAddress='$emailAddress',
		phoneNumber='$phoneNumber', year='$year', specialization='$specialization', year_id='$year_id', specialization_id='$specialization_id' WHERE id='$id'";
		$resultat = $sql;
		$req = $pdo->connection->prepare($sql);
		$req->execute();

		if($resultat) {
			echo "update $id, $firstname, $name, $emailAddress";
			return true;
		} else {
			return false;
		}

		
	}
	
	public function delete($id)
	{
		$pdo = new Database;

		$sql = "DELETE FROM `students` WHERE id='$id'";
		$resultat = $sql;
		$req = $pdo->connection->prepare($sql);
		$req->execute();

		if($resultat) {
			return true;
		} else {
			return false;
		}

	}
}