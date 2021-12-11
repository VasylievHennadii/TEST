<?php

namespace autoloader;

class ClassLoader {

    private static $instance;

    private function __construct(){

    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function init(){
        spl_autoload_register([self::$instance, "loader"]);
    }

    public function loader($className){
        $path = str_replace("\\", "/", trim($className, "\s\t\r\n\\/")) . ".php";

        if(!file_exists($path)){
            throw new \Exception("File with name: " . $path . " not found");
        }

        require_once($path);
    }

    private function __sleep()
    {
    }

    private function __wakeup()
    {
    }
}