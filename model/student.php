<?php

class Student  
{
    public int $id;
    public string $firstname;
    public string $name;
    public string $emailAddress;
    public string $phoneNumber;
    public string $year;
    public string $specialization;


    public function __construct(int $id, string $firstname, string $name, string $emailAddress, string $phoneNumber,  
    string $year, string $speciality) 
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
        $this->year = $year;
        $this->specialization = $specialization;
    }

    public function save() {

    }
}