<?php

class Database  {

    protected $db_name="mvc";
    protected $username="root";
    protected $password="";
    protected PDO $pdo;
    protected static $obj=PDO::FETCH_OBJ;

    public function __construct()
    {
        $this->pdo=new PDO("mysql:host=localhost;dbname=".$this->db_name,$this->username,$this->password);
    }
 

}