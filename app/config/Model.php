<?php


require_once 'app/config/QueryBuilder.php';
require_once 'app/config/Database.php';

class Model extends Database implements QueryBuilder {
    protected $itemsPerPage = 10;
    protected $table="";
    protected $stmt;
    public function all(){
       
        $stm=$this->pdo->query("SELECT * FROM $this->table ");
        return  $stm->fetchAll(self::$obj);
    }
    public function paginate(){
        

        $currentPage = $_GET['page'] ?? 1 ; //current page
        $offset = (($_GET['page'] ?? 1 ) - 1) * $this->itemsPerPage; // start collecting from offset number
      
        if($this->stmt){
            $stmt = $this->pdo->prepare($this->stmt);
        }else {
            $stmt = $this->pdo->prepare("SELECT * FROM  $this->table LIMIT ? OFFSET ?");
        }       
        $stmt->bindValue(1, $this->itemsPerPage, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
      
        
        $totalItems=$this->pdo->query("SELECT COUNT(*) FROM $this->table ")->fetchColumn();

        $data=[
            "totalItems"=> $totalItems,
            "currentPage"=>$currentPage,
            "totalPages"=> ceil($totalItems / $this->itemsPerPage),
            "data"=>$stmt->fetchAll()
        ];
    
        return $data;
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
    public  function deleteAll($ids){
        $sql = "DELETE FROM $this->table WHERE id IN (". implode(',', array_fill(0, count($ids), '?')).")";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($ids);
    }

}