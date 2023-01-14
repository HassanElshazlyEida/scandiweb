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

    
}