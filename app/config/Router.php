<?php

class Router {

    protected static $passed_by_controller = 0;

    public static function handle($method="GET",$path="/",$controller="",$action=null){
      
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
                $file='app/Controllers/'.$controller.'.'.'php';
                if (file_exists($file)) {
                    require_once $file;
                    $controller= new $controller();
                    if(method_exists($controller,$action)){
                        $controller->$action();
                    }
                }else {
                    self::Redirect("/products", false);
                }
        


            }
            exit();
        }
    }
    public static function put($path="/",$controller ="",$action= null){
        return self::handle('PUT',$path,$controller,$action);
    }
    public static function patch($path="/",$controller ="",$action= null){
        return self::handle('PATCH',$path,$controller,$action);
    }
    public static function delete($path="/",$controller ="",$action= null){
        return self::handle('DELETE',$path,$controller,$action);
    }
    public static function post($path="/",$controller ="",$action= null){
        return self::handle('POST',$path,$controller,$action);
    }
    public static function get($path="/",$controller ="",$action= null){
        return self::handle('GET',$path,$controller,$action);
    }

}