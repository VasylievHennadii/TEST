<?php

namespace controllers;

class UserController {

    public function __construct() {

    }

    public function index(){ 
        $query = $_SERVER['DOCUMENT_ROOT'];       
        $query1 = $_SERVER["REQUEST_URI"];       
        $query2 = $_SERVER["REQUEST_METHOD"];       
        echo "$query" . '<br>';
        echo "$query1" . '<br>';
        echo "$query2" . '<br>';
        echo __DIR__;
        echo __FILE__;
    }

    public function getAll(){
        echo "getAll";
    }

    public function getById($id){
        echo "getById: " . $id;
    }

    public function remove(){
        echo "remove";
    }

    public function calc($operand1, $operand2, $operator){
        $result = 0;

        switch($operator){
            case "plus": $result = (int)$operand1 + (int)$operand2; break;
            case "minus": $result = (int)$operand1 - (int)$operand2; break;
            case "div": $result = (int)$operand1 / (int)$operand2; break;
            case "mult": $result = (int)$operand1 * (int)$operand2; break;
        }

        echo $result;
    }
}