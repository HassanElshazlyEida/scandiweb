<?php 
class Router
{
    protected static $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
    ];

    public static function get($uri, $controller, $method = null)
    {
        self::addRoute('GET', $uri, $controller, $method);
    }

    public static function post($uri, $controller, $method = null)
    {
        self::addRoute('POST', $uri, $controller, $method);
    }

    public static function put($uri, $controller, $method = null)
    {
        self::addRoute('PUT', $uri, $controller, $method);
    }

    public static function delete($uri, $controller, $method = null)
    {
        self::addRoute('DELETE', $uri, $controller, $method);
    }

    public static function addRoute($requestType, $uri, $controller, $method)
    {
        $uri = preg_replace('/{[\w]+}/', '([\w-]+)', $uri);
        self::$routes[$requestType][$uri] = [$controller, $method];
    }

    public static function direct($uri, $requestType)
    {
        if (!array_key_exists($requestType, self::$routes)) {
            render("error/500",'Invalid request type.');
            exit();
        }

        $parameters = [];
        foreach (self::$routes[$requestType] as $route => $action) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                $parameters = array_slice($matches, 1);
                return self::callAction($action[0], $action[1], $parameters, $_GET);
            }
        }
        render("error/500",'No route defined for this URI.');
        exit();
    }
    public static function callAction($controller, $method, $parameters, $query)
    {
        if (is_callable($controller)) {
            return $controller($parameters, $query);
        }
        $controllerNameSpace = "app/Controllers/";
        $file= $controllerNameSpace.$controller.".php";
        if (! file_exists($file)) {
            render("error/500","The controller {$controller} not exists.");
            exit();
        }
        require_once $file;
        $controller = new $controller;
        if (! method_exists($controller, $method)) {
            render("{$controller} does not respond to the {$method} action.");
        }
        return $controller->$method($parameters, $query);
    }
}