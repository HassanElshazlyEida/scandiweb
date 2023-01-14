<?php

require_once 'app/config/Model.php';


class Book  extends Model  {

    public $table="books";
    protected $itemsPerPage = null;
    public $fillable=[
        "weight",
        
    ];  

    
}