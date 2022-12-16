<?php

require_once "app/Controllers/Controller.php";
require_once "app/Models/Product.php";
class TestController  extends Controller {

    public function index(){
        $products=new Product();
        print_r($products->store([
            "name"=>"lol",
            "price"=>"2",
            "sku"=>"2"
        ]));
        return $this->view("test",['name'=>"Hassan"]);
    }
    

}