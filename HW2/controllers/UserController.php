<?php

namespace controllers;

class UserController {

    public function __construct() {

    }

    public function index(){
        echo "index";
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