<?php


$env_values=[];
function    env_prepare(){
    $lines = explode("\n", file_get_contents('./.env'));
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line);
            $GLOBALS['envValues'][$key] = $value;
        }
    }
}
env_prepare();
// Helper functions 
if (!function_exists('redirect')) {
    function redirect($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
   }
} 
if (!function_exists('render')) {
    function    render($path, $data =[]){
        $file="views/".$path.'.'.'php';

        if (file_exists($file)) {
            require_once $file;
        }
        exit();
   }
} 
if (!function_exists('env')) {
    function    env($key,$if_not_exists =null){
       
        if (array_key_exists($key,$GLOBALS['envValues'])) {
            return $GLOBALS['envValues'][$key];
        }elseif($if_not_exists){
            return $if_not_exists;
        }else {
            return null;
        }
      
   }
} 
 

 

