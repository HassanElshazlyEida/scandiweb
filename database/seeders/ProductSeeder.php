<?php
require_once 'app/config/Seeder.php';
require_once 'app/Models/Product.php';
require_once 'app/config/Database.php';
require_once 'app/Traits/SQLStmt.php';


class ProductSeeder extends Database implements Seeder 
{
    use SQLStmt;

    protected $sql="";
    protected $stmt="";
    protected $table="";
    protected Product $model;
  

    public function __construct(){
        parent::__construct();
        $this->model = new product();
        $this->table=$this->model->table;
        
    }

    public function prepare(){

        // prepare sql statements
        $this->sql = "CREATE TABLE $this->table (
            id INT AUTO_INCREMENT PRIMARY KEY,
            sku VARCHAR(255) UNIQUE NOT NULL,
            name VARCHAR(255) NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            type_id INT NOT NULL,
            type ENUM('Furniture', 'DVD', 'Book') NOT NULL,
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
        $products = [
            ['SKU1', 'Product 1', '10.00',"Furniture",1],
            ['SKU2', 'Product 2', '15.00',"Furniture",2],
            ['SKU3', 'Product 3', '20.00',"Furniture",3],
            ['SKU4', 'Product 4', '25.00',"Furniture",4],
            ['SKU5', 'Product 5', '30.00',"Furniture",5],
            ['SKU6', 'Product 1', '10.00',"DVD",1],
            ['SKU7', 'Product 2', '15.00',"DVD",2],
            ['SKU8', 'Product 3', '20.00',"DVD",3],
            ['SKU9', 'Product 4', '25.00',"DVD",4],
            ['SKU10', 'Product 5', '30.00',"DVD",5],
            ['SKU11', 'Product 1', '10.00',"Book",1],
            ['SKU12', 'Product 2', '15.00',"Book",2],
            ['SKU13', 'Product 3', '20.00',"Book",3],
            ['SKU14', 'Product 4', '25.00',"Book",4],
            ['SKU15', 'Product 5', '30.00',"Book",5],
          
        ];
       
        // Insert the products into the "products" table
        foreach($products as $product) {
            $this->stmt->execute($product);
        }

         


    }
   
}