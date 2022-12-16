<?php

require_once "app/Controllers/Controller.php";
require_once "app/Models/Product.php";
class TestController  extends Controller {

    public function index(){
        $products=Product::all();
        print_r($products);
        return $this->view("test",['name'=>"Hassan"]);
    }
    

}