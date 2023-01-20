<?php

class Controller  {

    protected $repository;
    protected bool $with_paginate = false;
    protected array $options =[];
    protected $stmt;
    public function all()
    {
        $obj=$this->repository->model();
        return $obj->all();
    }   
    public function paginate()
    {
        $obj=$this->repository->model();
        return $obj->paginate($this->stmt ?? null);
    }  

    public function index()
    {
        if($this->with_paginate){
            $data=$this->paginate();
        }else {
            $data=$this->all();
        }
        return $this->view("index",$data + $this->options);
    }   
    public function create()
    {
        return $this->view("create",[]);
    }

    public function store($parameters,$query)
    {
        $obj=$this->repository->model();
        $obj->store($_POST);
        redirect($this->repository->redirect());
    }
    public function delete($parameters,$query)
    {
    }
    public function deleteAll($parameters,$query)
    {
        $obj=$this->repository->model();
        $obj->deleteAll($query["ids"]);
    }
    public function validate($parameters,$query){
        $validator= $this->repository->validator();
        $validationResult = $validator->validate($query);

        if($validationResult !== true) {
            echo  $validator->firstError();
        }else {
            echo true;
        }
       
    }

    protected function view($filename="",$data=[]){
        $file="views/".$this->repository->views().$filename.'.'.'php';
            
        $this->includeHeader();

        if (file_exists($file)) {
            require_once $file;
        }

        $this->includeFooter();
       
    }
    public function includeHeader() {
        require_once 'views/layouts/header.php';
    }
    public function includeFooter() {
        require_once 'views/layouts/footer.php';
    }
    
}