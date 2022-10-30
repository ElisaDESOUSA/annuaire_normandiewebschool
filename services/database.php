<?php

class Database
{
    private string $host;
    private string $database;    
    private string $login;
    private string $password;
    public $connection;

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
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->login, $this->password );
            // echo "Connecté à la BDD";
            return $this->connection;
        } 
        catch (Exception $e) 
        {
            die('Erreur de connexion à la BDD : '. $e->getMessage());
        } 
    }

    public function getDatabase() 
    {
        return $this->connection; 
    }
}