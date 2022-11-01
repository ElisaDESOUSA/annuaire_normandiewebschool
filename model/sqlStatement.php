<?php

require_once('../services/database.php');
require_once('../model/student.php');


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

		// Filtre étudiant
		

		// Prepare et exécute les requêtes SQL
		$req = $pdo->connection->prepare($sql);
		$req->execute($params);
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
	
	public function update($id, $firstname, $name, $emailAddress, $phoneNumber, $year, $specialization)
	{
		$pdo = new Database;

		$sql = "UPDATE `students` SET firstname='$firstname', name='$name', emailAddress='$emailAddress',
		phoneNumber='$phoneNumber', year='$year', specialization='$specialization' WHERE id='$id'";
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