<?php

require_once 'app/config/Router.php';
require_once 'app/config/Helper.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

Router::get("/",function(){
    return  redirect("/products");
});


Router::get("/products",'ProductController',"index");

Router::direct($uri, $requestMethod);