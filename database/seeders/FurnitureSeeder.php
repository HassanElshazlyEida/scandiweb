<?php
require_once 'app/config/Seeder.php';
require_once 'app/Models/Furniture.php';
require_once 'app/config/Database.php';
require_once 'app/Traits/SQLStmt.php';


class FurnitureSeeder extends Database implements Seeder 
{
    use SQLStmt;
    protected $sql="";
    protected $stmt="";
    protected $table="";
    protected Furniture $model;
  

    public function __construct(){
        parent::__construct();
        $this->model = new Furniture();
        $this->table=$this->model->table;
    }

    public function prepare(){

        // prepare sql statements
        $this->sql = "CREATE TABLE $this->table (
            id INT AUTO_INCREMENT PRIMARY KEY,
            height DECIMAL(10,2) NOT NULL,
            width DECIMAL(10,2) NOT NULL,
            length DECIMAL(10,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";

        // create table 
        $this->pdo->exec($this->sql);

       
        
    }
    public function run(){
       
        // prepare statement
        $this->stmt();
        // Create an array of products
        $furniture = [
            ['150', '150', '150'],
            ['150', '150', '150'],
            ['150', '150', '150'],
            ['150', '150', '150'],
            ['150', '150', '150'],
            
          
        ];
       
   
        foreach($furniture as $dimensions) {
            $this->stmt->execute($dimensions);
        }


    }
}