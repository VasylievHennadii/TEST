<?php

use figures\Circle;
use figures\Rectangle;
use figures\Triangle;

spl_autoload_register(function ($className) {
    $path = str_replace('\\', '/', $className . '.php');
    if(file_exists($path)){
        require $path;
    }
});

$rectangle = new Rectangle(4, 3);
$triangle = new Triangle(4, 4, 3);
$circle = new Circle(5);


echo $rectangle->calculatePerimeter() . '<br>';
echo $rectangle->calculateSquare() . '<br>';

echo $triangle->calculatePerimeter() . '<br>';
echo $triangle->calculateSquare() . '<br>';

echo $circle->calculatePerimeter() . '<br>';
echo $circle->calculateSquare() . '<br>';