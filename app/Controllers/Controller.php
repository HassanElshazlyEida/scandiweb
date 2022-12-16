<?php

class Controller {

    protected function view($filename="",$data=[]){
        $file="views/".$filename.'.'.'php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
    
}