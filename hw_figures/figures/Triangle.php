<?php

namespace figures;

use Exception;

class Triangle extends Figure {

    public $sideA;
    public $sideB;
    public $sideC;

    public function __construct($sideA, $sideB, $sideC) {
        if($sideA <= 0 || $sideB <= 0 || $sideC <= 0){
            throw new Exception('The input parameter - side of a triangle, is less than or equal to 0');
        }
        $this->sideA = $sideA;
        $this->sideB = $sideB;
        $this->sideC = $sideC;

    }

    public function calculatePerimeter() {
        return $this->sideA + $this->sideB + $this->sideC;        
    }

    public function calculateSquare() {
        $halfPerimeter = $this->calculatePerimeter() / 2;
        return sqrt($halfPerimeter * ($halfPerimeter - $this->sideA) * ($halfPerimeter - $this->sideB) * ($halfPerimeter - $this->sideC));
    }

}