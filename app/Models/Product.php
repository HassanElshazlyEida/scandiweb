<?php

require_once 'app/config/Model.php';
require_once 'app/config/Database.php';

class Product extends Database implements Model  {

    protected static $table="products";
    
    public  static function all(){
        $pdo=(new self)->pdo();
        $stm=$pdo->query("SELECT * FROM ".self::$table);
        return  $stm->fetchAll(PDO::FETCH_OBJ);
    }
    public  function find($id){

    }
    public  function store($data){

    }
    public  function update($id,$data=[]){

    }
    public  function delete($id){
      
    }
}