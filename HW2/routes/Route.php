<?php

namespace routes;

use \configs\Config;

class Route {

    private static $instance;

    private $routes;

    private function __construct() {
        $this->routes = Config::route();
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function route(){
        $uri = trim($_SERVER["REQUEST_URI"], " \t\r\n\\/");
        $routes = $this->routes[$_SERVER["REQUEST_METHOD"]];
        if($routes !== null){
            foreach($routes as $route){
                // "#^calc/([0-9]+)/([0-9]+)/(.+)$#, "calc/234/123/plus"
                if(preg_match("#^" . $route["uri"] ."$#", $uri)){
                    // "#^calc/([0-9]+)/([0-9]+)/(.+)$#, "$1/$2/$3", "calc/234/123/plus"
                    // "234/123/plus"
                    // ["234", "123", "plus"]
                    $params = preg_replace("#^".$route["uri"]."$#", $route["params"], $uri);
                    $params = explode("/", $params);

                    if(class_exists($route["controller"])){
                        $controller = new $route["controller"]();
                        if(method_exists($controller, $route["action"])){
                            call_user_func_array([$controller, $route["action"]], $params);
                            return true;
                        }
                    }
                    return false;
                }
            }
        }
        return false;
    }
}