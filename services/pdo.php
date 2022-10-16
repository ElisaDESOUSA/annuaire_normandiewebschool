<?php

class Database
{
    private string $host;
    private string $database;    
    private string $login;
    private string $password;
    public $pdo;

    public function __construct() 
    {
        $this->host = json_decode(file_get_contents('../services/connectBDD.json'), true)["HOST"];
        $this->database = json_decode(file_get_contents('../services/connectBDD.json'), true)["DATABASE"];
        $this->login = json_decode(file_get_contents('../services/connectBDD.json'), true)["LOGIN"];
        $this->password = json_decode(file_get_contents('../services/connectBDD.json'), true)["PASSWORD"];
        $this->connectDatabase();
    }

    public function connectDatabase() 
    {
        try 
        {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->login, $this->password );
            echo "Connecté à la BDD";
            return $this->pdo;
        } 
        catch (Exception $e) 
        {
            die('Erreur: '. $e->getMessage());
        } 
    }

    public function getConnected() 
    {
        return $this->pdo; 
    }

}