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
        // $keys=implode(",",array_keys($data));
        // $values=implode("','",array_values($data));

        // $this->pdo->query("INSERT INTO $this->table ($keys) VALUES('$values') ");
    }

    
}