<?php error_reporting(-1);

require_once 'functions.php';


echo isPrime(11);
echo '<br>';

debug(fibonacci(13));
echo '<br>';

debug(recursFibo(13));




$array = [[5,5],1,2,3,[1,2,3,[1,[11,11,[12,12],11]]],8,13,[12,9]];
$result = processArray($array);
echo '<br><br><br><br>';
echo tree($array);
echo '<br><br><br><br>';
$tree = [
    "level 1" => ["level 1.1", "level 1.2"],
    "level 2",
    "level 3" => ["level 3.1", "level 3.2" => ["level 3.2.1", "level 3.2.2"], 
    "level 3.3"],
    "level 4" => ["level 4.1", "level 4.2", "level 4.3", "level 4.4"],
    "level 5"
];
echo tree($tree);



