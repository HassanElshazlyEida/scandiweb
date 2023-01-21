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
    protected $associated_tables=[
        "dvd"=>"dvds",
        "book"=>"books",
        "furniture"=>"furniture"
    ];
    
    // override store method
    public  function store($data){
        
        $type = $data['type'];
        
        $keys=implode(",",array_keys(json_decode($data['product_type'][0],true)));
        $values=implode("','",array_values(json_decode($data['product_type'][0],true)));
        $table=$this->associated_tables[$type];

        $this->pdo->query("INSERT INTO $table ($keys) VALUES('$values') ");

        unset($data['product_type']);
        unset($data['token']);
        
        $data['type_id']=$this->pdo->lastInsertId();
        $data['type']=ucfirst($type);

        $keys=implode(",",array_keys($data));
        $values=implode("','",array_values($data));

        $sql = "INSERT INTO $this->table ($keys) VALUES ('$values')";
        $this->pdo->query($sql);

        return true;

    }


    
}