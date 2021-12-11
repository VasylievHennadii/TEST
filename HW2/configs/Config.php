<?php

namespace configs;

class Config {

    private function __construct()
    {
    }

    public static function route(){
        return [
            "GET" => [
                [
                    "uri" => "",
                    "controller" => "\\controllers\\UserController",
                    "params" => "",
                    "action" => "index",
                ], [
                    "uri" => "user",
                    "controller" => "\\controllers\\UserController",
                    "params" => "",
                    "action" => "getAll",
                ], [
                    "uri" => "user/([0-9]+)/edit",
                    "controller" => "\\controllers\\UserController",
                    "params" => "$1",
                    "action" => "getById",
                ], [
                    "uri" => "user/remove",
                    "controller" => "\\controllers\\UserController",
                    "params" => "",
                    "action" => "remove",
                ], [
                    "uri" => "calc/([0-9]+)/([0-9]+)/(.+)",
                    "controller" => "\\controllers\\UserController",
                    "params" => "$1/$2/$3",
                    "action" => "calc",
                ],
            ],
        ];
    }

}