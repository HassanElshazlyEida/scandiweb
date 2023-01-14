<?php

class Database  {


    protected $db_name="mvc";
    protected $username="root";
    protected $password="root";
    protected $host="127.0.0.1:8889";
    protected PDO $pdo;
    protected static $obj=PDO::FETCH_OBJ;

    public function __construct()
    {
     
        try {
            $this->pdo=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
           
        } catch (PDOException $e) {
            
            header("HTTP/1.0 500 Internal Server Error");
            render("error/500",$e->getMessage());
      
          
        }
        
        
    }
 

}