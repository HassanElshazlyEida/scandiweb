<?php

require_once 'app/config/Model.php';


class DVD  extends Model  {

    public $table="dvds";
    protected $itemsPerPage = null;
    public $fillable=[
        "size"
    
    ];  

    
}