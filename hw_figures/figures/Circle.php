<?php

namespace figures;

use Exception;

class Circle extends Figure {

    public $radius;

    const PI = 3.1416;

    public function __construct($radius) {
        if($radius <= 0){
            throw new Exception('The input parameter $radius is less than or equal to 0');
        }
        $this->radius = $radius;
    }

    public function calculatePerimeter() {
        return self::PI * ($this->radius * 2);
    }

    public function calculateSquare() {
        return self::PI * pow($this->radius, 2);
    }

}