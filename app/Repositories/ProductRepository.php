<?php


require_once "app/Models/Product.php";

class ProductRepository 
{
    
    function model()
    {
        return new Product;
    }
    function views()
    {
        return "products/";
    }
}
