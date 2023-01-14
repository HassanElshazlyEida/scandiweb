<?php
require_once 'app/config/Seeder.php';
require_once 'app/Models/DVD.php';
require_once 'app/config/Database.php';
require_once 'app/Traits/SQLStmt.php';


class DVDSeeder extends Database implements Seeder 
{
    use SQLStmt;
   
    protected $sql="";
    protected $stmt="";
    protected $table="";
    protected DVD $model;
  

    public function __construct(){
        parent::__construct();
        $this->model = new DVD();
        $this->table=$this->model->table;
        
    }

    public function prepare(){

        // prepare sql statements
        $this->sql = "CREATE TABLE $this->table (
            id INT AUTO_INCREMENT PRIMARY KEY,
            size DECIMAL(10,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";

        // create table 
        $this->pdo->exec($this->sql);

       
        
    }
    public function run(){
      
        $this->stmt();
        // Create an array of products
        $dvds = [
            ['500'],
            ['500'],
            ['500'],
            ['500'],
            ['500'],
            ['500'],
           
            
          
        ];
       
  
        foreach($dvds as $dvd) {
            $this->stmt->execute($dvd);
        }


    }
}