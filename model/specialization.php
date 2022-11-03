<?php

class Specialization  
{
    public int $id;
    public string $name;


    public function __construct($row) 
    {
        $this->id = $row['id'];
        $this->name = $row['name'];

    }

    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

}