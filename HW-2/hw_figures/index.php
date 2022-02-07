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


echo $rectangle->perimeter() . '<br>';
echo $rectangle->square() . '<br>';

echo $triangle->perimeter() . '<br>';
echo $triangle->square() . '<br>';

echo $circle->perimeter() . '<br>';
echo $circle->square() . '<br>';