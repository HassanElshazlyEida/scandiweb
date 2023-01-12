<?php
require_once 'app/config/Seeder.php';
require_once 'app/Models/Product.php';
require_once 'app/config/Database.php';
require_once 'app/Traits/SQLStmt.php';


class ProductSeeder extends Database implements Seeder 
{
    use SQLStmt;
    protected $table="products";
    protected $sql="";
    protected $stmt="";
    protected Product $model;

    public function __construct(){
        parent::__construct();
        $this->model = new product();
        
    }

    public function prepare(){

        // prepare sql statements
        $this->sql = "CREATE TABLE products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            sku VARCHAR(255) UNIQUE NOT NULL,
            name VARCHAR(255) NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";

        // // create table 
        $this->pdo->exec($this->sql);

        $this->stmt();
        
    }
    public function run(){

        $this->prepare();
        // Create an array of products
        $products = [
            ['SKU1', 'Product 1', '10.00'],
            ['SKU2', 'Product 2', '15.00'],
            ['SKU3', 'Product 3', '20.00'],
            ['SKU4', 'Product 4', '25.00'],
            ['SKU5', 'Product 5', '30.00'],
          
        ];
       
        // Insert the products into the "products" table
        foreach($products as $product) {
            $this->stmt->execute($product);
        }


    }
}