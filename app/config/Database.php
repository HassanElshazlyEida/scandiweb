<?php

class Database  {


    protected $db_name;
    protected $username;
    protected $password;
    protected $host;
    protected PDO $pdo;
    protected static $obj=PDO::FETCH_OBJ;

    public function __construct()
    {
        $this->db_name = env("DB_DATABASE");
        $this->username= env("DB_USERNAME");
        $this->password= env("DB_PASSWORD");
        $this->host= env("DB_HOST").((env("DB_PORT"))?":".env("DB_PORT"):'');
        
        try {
            $this->pdo=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
           
        } catch (PDOException $e) {
            
            header("HTTP/1.0 500 Internal Server Error");
            render("error/500",$e->getMessage());
      
          
        }
        
        
    }
 

}