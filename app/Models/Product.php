<?php

require_once 'app/config/Model.php';


class Product  extends Model  {

    protected $table="products";
    public $fillable=[
        "sku",
        "name",
        "price",
    
    ];
    
}