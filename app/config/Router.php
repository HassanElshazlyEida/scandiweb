<?php

class Router {
    public static function handle($method="GET",$path="/",$controller=""){
      
        $currentMethod=$_SERVER['REQUEST_METHOD'];
        $currentUri=$_SERVER['REQUEST_URI'];
        if($currentMethod != $method){
            return false;
        }
        
        $root="";
        $pattern='#^'.$root.$path.'$#siD';
     
        if(preg_match($pattern,$currentUri)){
           
            if(is_callable($controller)){
                $controller();
            }else {
                require_once 'app/Controllers/'.$controller.'.'.'php';
            }
            exit();
        }

    }
    public static function put($path="/",$controller =""){
        return self::handle('PUT',$path,$controller);
    }
    public static function patch($path="/",$controller =""){
        return self::handle('PATCH',$path,$controller);
    }
    public static function delete($path="/",$controller =""){
        return self::handle('DELETE',$path,$controller);
    }
    public static function post($path="/",$controller =""){
        return self::handle('POST',$path,$controller);
    }
    public static function get($path="/",$controller =""){
        return self::handle('GET',$path,$controller);
    }
}