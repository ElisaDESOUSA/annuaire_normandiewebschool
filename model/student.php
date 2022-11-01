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


    public function __construct($row) 
    {
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->name = $row['name'];
        $this->emailAddress = $row['emailAddress'];
        $this->phoneNumber = $row['phoneNumber'];
        $this->year = $row['year'];
        $this->specialization = $row['specialization'];
    }

    public function get_id() {
        return $this->id;
    }

    public function get_firstname() {
        return $this->firstname;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_emailAddress() {
        return $this->emailAddress;
    }

    public function get_phoneNumber() {
        return $this->phoneNumber;
    }

    public function get_year() {
        return $this->year;
    }

    public function get_specialization() {
        return $this->specialization;
    }



}