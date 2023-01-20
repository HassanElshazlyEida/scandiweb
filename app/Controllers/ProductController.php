<?php

require_once "app/Controllers/Controller.php";
require_once "app/Models/Product.php";
require_once "app/Repositories/ProductRepository.php";

class ProductController  extends Controller {

    protected $stmt;
    public function __construct(){
        $this->repository = new ProductRepository();
        $this->with_paginate = true;
        // Additional value  (Optional)
        $this->options=[
            "Furniture"=>"Dimension",
            "Dvd"=>"Size",
            "Book"=>"Weight"
        ];
        // index stmt (Optional)
        $this->stmt="
        SELECT products.*, books.weight as Book , dvds.size as Dvd  , GROUP_CONCAT(CONCAT(furniture.height, ' x ', furniture.width, ' x' , furniture.length) SEPARATOR ';') as Furniture 
        FROM products
            LEFT JOIN books ON products.type = 'Book' AND products.type_id = books.id
            LEFT JOIN dvds ON products.type = 'Dvd' AND products.type_id = dvds.id
            LEFT JOIN furniture ON products.type = 'Furniture' AND products.type_id = furniture.id 
        GROUP BY products.id
        LIMIT ? OFFSET ?
        ";
    }
    // Override for custom methods  ... 



}