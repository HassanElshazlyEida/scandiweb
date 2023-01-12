<?php

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
   }
} 
