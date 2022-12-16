<?php

class TestController {

    public function index(){
        return $this->view("test",['name'=>"Hassan"]);
    }

    private function view($filename="",$data=[]){
        $file="views/".$filename.'.'.'php';

        if (file_exists($file)) {
            require_once $file;
        }
       
      
    }
}