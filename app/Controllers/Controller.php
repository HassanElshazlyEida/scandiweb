<?php

class Controller  {

    protected $repository;

    public function all()
    {
        $obj=$this->repository->model();
        return $obj->all();
    }   

    public function index()
    {
        return $this->view("index",$this->all());
    }
    public function create()
    {
        return $this->view("create",[]);
    }

    public function store()
    {
    }

    protected function view($filename="",$data=[]){
        $file="views/".$this->repository->views().$filename.'.'.'php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
    
}