<?php

trait SQLStmt {
    public function stmt($prepare = true){
        
        if ($GLOBALS['input'] != 'n' && $prepare){
            $this->prepare();
        }
        $keys=implode(" , ",$this->model->fillable);
        $values=implode(',', array_fill(0, count($this->model->fillable) ," ? "));

        $this->stmt = $this->pdo->prepare("INSERT INTO $this->table ($keys)  VALUES ($values)");

    }
}