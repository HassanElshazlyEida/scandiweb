<?php

require_once 'app/config/Model.php';


class Furniture  extends Model  {

    public $table="furniture";
    protected $itemsPerPage = null;
    public $fillable=[
        "width",
        "height",
        "length",
    
    ];  

    
}