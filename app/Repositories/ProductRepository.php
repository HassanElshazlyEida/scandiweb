<?php


require_once "app/Models/Product.php";
require_once "app/Validations/ProductValidation.php";
require_once "app/Repositories/Repository.php";

class ProductRepository implements Repository
{
    
    public  function model()
    {
        return new Product;
    }
    public  function views()
    {
        return "products/";
    }
    public  function Validator()
    {
        return  new ProductValidation();
    }
}
