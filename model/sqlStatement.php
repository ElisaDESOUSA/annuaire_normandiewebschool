<?php

require_once('../services/pdo.php');
require_once('../model/student.php');

class SQLStatement
{
	private $_table;
	private $_object;
	private $_database;
	
	public function __construct($table, $object, $_database)
	{
		$this->_table = $table;
		$this->_object = $object;
		$this->_database = new Database;
	}
	
	public function getById($id)
	{
		$req = $_database->prepare("SELECT * FROM " . $this->_table . " WHERE id=?");
		$req->execute(array($id));
		// $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj);
		return $req->fetch();
	}
	
	public function getAll()
	{
		$query = $_database->prepare("SELECT * FROM " . $this->_table);
		$query->execute();
		// $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj);
		return $query->fetchAll();
	}
	
	public function create($obj)
	{
		
	}
	
	public function update($obj)
	{
		
	}
	
	public function delete($obj)
	{
		if(property_exists($obj,"id"))
		{
			$req = $_database->prepare("DELETE FROM " . $this->_table . " WHERE id=?");
			return $req->execute(array($obj->id));
		}
		else
		{
			throw new PropertyNotFoundException($this->_object, "id");	
		}
	}
}