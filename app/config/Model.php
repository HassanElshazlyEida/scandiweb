<?php


require_once 'app/config/QueryBuilder.php';
require_once 'app/config/Database.php';

class Model extends Database implements QueryBuilder {

    public function all(){
        $stm=$this->pdo->query("SELECT * FROM $this->table ");
        return  $stm->fetchAll(self::$obj);
    }
    public  function find($id) {
        if (is_array($id) && empty($id)) return [];

        $stm=$this->pdo->prepare("SELECT * FROM $this->table WHERE id= ?");
        $stm->bindValue(1,$id);
        $stm->execute();

        return $stm->fetch(self::$obj);
    }
    public  function store($data){
        $keys=implode(",",array_keys($data));
        $values=implode("','",array_values($data));

        $this->pdo->query("INSERT INTO $this->table ($keys) VALUES('$values') ");
    }
    public  function update($id,$data=[]){}
    public  function delete($id){}

}