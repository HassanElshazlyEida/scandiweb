<?php

class Controller  {

    protected $repository;
    protected bool $with_paginate = false;
    

    public function all()
    {
        $obj=$this->repository->model();
        return $obj->all();
    }   
    public function paginate()
    {
        $obj=$this->repository->model();
        return $obj->paginate();
    }  

    public function index()
    {
        if($this->with_paginate){
            $data=$this->paginate();
        }else {
            $data=$this->all();
        }
        return $this->view("index",$data);
    }
    public function create()
    {
        return $this->view("create",[]);
    }

    public function store()
    {
    }
    public function delete($parameters,$query)
    {
    }
    public function deleteAll($parameters,$query)
    {
        $obj=$this->repository->model();
        $obj->deleteAll($query["ids"]);
        
    }

    protected function view($filename="",$data=[]){
        $file="views/".$this->repository->views().$filename.'.'.'php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
    
}