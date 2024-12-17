<?php

namespace Abruno\Rubrica;

class Route {

    private static array $get = [];
    private static array $post = [];

    public static function Resolve(): RouteConfig{

        $uri = $_SERVER['REQUEST_URI'];

        if ($_SERVER['REQUEST_METHOD'] == "GET"){

            foreach(self::$get as $value){
                if($value->pattern == $uri){
                    return $value;                    
                }
            };

            return new RouteConfig("*", function() {
                return "not-found";
            });
            
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $matching = array_filter(self::$post, fn($config) => $config->pattern == $uri);
            return $matching[0];
        }

        throw new \Exception("Method not allowed");
    }
    public static function Get(string $route, callable $delegate){
        self::$get[] = new RouteConfig($route, $delegate);
    }
    public static function Post(string $route, callable $delegate){
        self::$post[] = new RouteConfig($route, $delegate);
    }

}