<?php

// Helper functions 
if (!function_exists('redirect')) {
    function redirect($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
   }
} 