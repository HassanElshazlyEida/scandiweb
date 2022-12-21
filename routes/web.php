<?php

require_once 'app/config/Router.php';
require_once 'app/config/Helper.php';

Router::get("/",function(){
    return  redirect("/products");
});

Router::get("/products",'ProductController',"index");

// Router::get("/products",ProductController::class,"test");

// Router::get("/products",function(){
//     echo "is_callable";
//     exit();
// });
