<?php
function  render($path,$message = null):void{
    $GLOBALS['message']=$message;
    
}
require_once 'app/config/Router.php';
require_once 'app/config/Helper.php';

Class RoutesTest extends \PHPUnit\Framework\TestCase {
    
    protected function setUp():void{
        parent::setUp();
        $this->router= new Router();
    }
    public function test_that_initial_route_is_empty(){
        return $this->assertEmpty($this->router::$routes['GET']);
    }
    public function test_that_can_register_route(){
       
        $route = "/products";
        $controller = "ProductController";
        $action = "index";
        $METHOD="GET";



        $this->router::$METHOD($route,$controller,$action);

        $expected =[
            $METHOD=>[
                $route=>[
                    $controller,
                    $action
                ]
            ]
        ];
      
        $this->assertEquals($expected[$METHOD],$this->router::$routes[$METHOD]);

    }
    public function test_no_registered_routes(){

        Router::post("/products/store",'ProductController',"store");
        Router::direct("/products/store", "GET");

        $this->assertEquals($GLOBALS['message'],"No route defined for this URI.");
    }
    public function test_invalid_request_type(){
        Router::post("/products/store",'ProductController',"store");
        Router::direct("/products/store", "PATCH");

        $this->assertEquals($GLOBALS['message'],"Invalid request type.");
    }
    public function test_controller_not_exists(){
        Router::get("/products",'UserController',"store");
        Router::direct("/products", "GET");

        $this->assertEquals($GLOBALS['message'],"The controller UserController not exists.");
    }
    public function test_method_controller_not_exists(){
        Router::get("/products",'ProductController',"forceDelete");
        Router::direct("/products", "GET");

        $this->assertEquals($GLOBALS['message'],"ProductController does not respond to the forceDelete action.");
    }
   

  
}