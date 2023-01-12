<?php

trait SQLStmt {
    public function stmt(){
        $keys=implode(" , ",$this->model->fillable);
        $values=implode(',', array_fill(0, count($this->model->fillable) ," ? "));
        $this->stmt = $this->pdo->prepare("INSERT INTO $this->table ($keys)  VALUES ($values)");
    }
}