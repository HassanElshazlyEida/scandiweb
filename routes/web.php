<?php

require_once 'app/config/Router.php';
require_once 'app/config/Helper.php';

Router::get("/",function(){
    return  redirect("/products");
});

// Method 1
Router::get("/products",'ProductController',"index");

// Method 2

// Router::get("/products",ProductController::class,"test");


// Method 3

// Router::get("/products",function(){
//     echo "is_callable";
//     exit();
// });
