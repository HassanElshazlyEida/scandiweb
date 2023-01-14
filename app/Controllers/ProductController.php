<?php

require_once "app/Controllers/Controller.php";
require_once "app/Models/Product.php";
require_once "app/Repositories/ProductRepository.php";

class ProductController  extends Controller {

    public function __construct(){
        $this->repository = new ProductRepository();
        $this->with_paginate = true;
        $this->options=[
            "Furniture"=>"Dimension",
            "Dvd"=>"Size",
            "Book"=>"Weight"
        ];
        
    }
    // Override for custom methods  ... 



}