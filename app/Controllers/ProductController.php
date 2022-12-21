<?php

require_once "app/Controllers/Controller.php";
require_once "app/Models/Product.php";
require_once "app/Repositories/ProductRepository.php";

class ProductController  extends Controller {

    public function __construct(){
        $this->repository = new ProductRepository();
    }
    public function test(){
        echo 2;
    }

}