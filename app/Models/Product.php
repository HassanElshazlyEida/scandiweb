<?php

require_once 'app/config/Model.php';


class Product  extends Model  {

    public $table="products";
    protected $itemsPerPage = 12;
    public $fillable=[
        "sku",
        "name",
        "price",
        "type",
        "type_id"
    
    ];  
    // override store method
    public  function store($data){
        
        $type = $data['type'];
        $sku=$data["sku"];
        $price=$data["price"];
        $name=$data["name"];
        
        if ($type === "book") {
            $weight = $data['product_type']['weight'];
      
            $sql = "INSERT INTO books (weight) VALUES ('$weight')";
            $this->pdo->query($sql);
            $book_id = $this->pdo->lastInsertId();
         
            $sql = "INSERT INTO products (sku, name, price , type, type_id) VALUES ('$sku', '$name', '$price', 'Book', $book_id)";
            $this->pdo->query($sql);
        } else if ($type === "furniture") {
            $height = $data['product_type']['height'];
            $width = $data['product_type']['width'];
            $length = $data['product_type']['length'];

            $sql = "INSERT INTO furniture (height, width, length) VALUES ('$height', '$width', '$length')";
            $this->pdo->query($sql);
            $furniture_id = $this->pdo->lastInsertId();

            $sql = "INSERT INTO products (sku, name, price , type, type_id) VALUES ('$sku', '$name', '$price', 'Furniture', $furniture_id)";

        $this->pdo->query($sql);
        }else if ($type === "dvd") {
            $size = $data['product_type']['size'];
            $sql = "INSERT INTO dvds (size) VALUES ('$size')";
            $this->pdo->query($sql);
            $dvd_id = $this->pdo->lastInsertId();
            $sql = "INSERT INTO products (sku, name, price , type, type_id) VALUES ('$sku', '$name', '$price', 'Dvd', $dvd_id)";
            $this->pdo->query($sql);
        }
    }

    
}