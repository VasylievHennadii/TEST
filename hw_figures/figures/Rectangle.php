<?php

namespace figures;

use Exception;

class Rectangle extends Figure {

    private $width;
    private $height;


    public function __construct($width, $height) {
        if($width <= 0 || $height <= 0){
            throw new Exception('The input parameter $width or $height is less than or equal to 0');
        }
        $this->width = $width;
        $this->height = $height;
    }

    public function calculatePerimeter() {
        return ($this->width + $this->height) * 2;        
    }

    public function calculateSquare() {
        return $this->width * $this->height;
    }

}