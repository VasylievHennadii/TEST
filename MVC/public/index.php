<?php

//http://mvc/pages/view/
// echo $query = $_SERVER['REQUEST_URI'] . '<br>'; //    /pages/view/
// echo $query = $_SERVER['QUERY_STRING']; //    pages/view/
$query = $_SERVER['QUERY_STRING'];

require '../vendor/core/Router.php';

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);

print_r(Router::getRoutes());