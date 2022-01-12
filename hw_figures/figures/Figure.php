<?php

namespace figures;

abstract class Figure {

    public function __construct(){
        
    }

    abstract function calculatePerimeter();

    abstract function calculateSquare();

}