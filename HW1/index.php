<?php 
declare(strict_types=1);

error_reporting(-1);

require_once 'functions.php';


echo isPrime(11);
echo '<br>';
echo isPositive(11.5);
echo '<br>';
echo isNegative(-11.456);
echo '<br>';
echo isZero(0);
echo '<br>';

debug(getFibonacci(13));
echo '<br>';

debug(recursFibonacci(13));
echo '<br><br><br><br>';

$zeroArr = [[1, 3], [1], [], 5, [4]];

$arrForSort = [1, 25, -3, 0, 17, -5, 30, -3, 8, 156, -324, 88, 111, 1, 0];
echo calculatePercentages($arrForSort, 'isPositive') . '% - Positive <br>';
echo calculatePercentages($arrForSort, 'isPrime') . '% - Prime <br>';
echo calculatePercentages($arrForSort, 'isNegative') . '% - Negative <br>';
echo calculatePercentages($arrForSort, 'isZero') . '% - Zero <br>';
debug(sortAscend($arrForSort));
debug(sortDescend($arrForSort));
echo '<br>';
echo exponentiation(5, -3);
echo '<br>';
echo recursExponentiation(5, -3);
echo '<br>';
debug(decimalToBinary(75));
echo '<br>';
debug(bindec('11110101'));
echo '<br>';
debug(binaryToDecimal('11110101'));
echo '<br>';
echo isValidIP('250.03.156.123');
echo '<br>';
echo isValidIpPregMatch('250.03.156.123');


$trans = array(
    array(1, 2, 9, 1),
    array(3, 4, 9, 1),
    array(5, 6, 9, 1)
);
echo '<br><br><br><br>';
echo '$trans';
debug($trans);
echo 'transposeMatrix($trans)';
debug(transposeMatrix($trans));
$sumArray = array(
    array(1, 2, 3, 1),
    array(3, 5, 7, 9),
    array(5, 9, 8, 12)
);
echo 'sumMatrix($trans, $sumArray)';
debug(sumMatrix($zeroArr, $sumArray));
echo '<br>';
$testMatrix = array(
    array(1, 2, 3, 1),
    array(3, 5, 0, -6),
    array(5, 9, -8, 12)
);
echo '$testMatrix';
debug($testMatrix);
echo '<br>';
echo 'delRowMatrixByCond($testMatrix)';
debug(delRowMatrixByCond($testMatrix));
echo '<br>';
echo 'delColMatrixByCond($testMatrix)';
debug(delColMatrixByCond($testMatrix));

echo '<br><br><br><br>';


$array = [[5, 5], 1, 2, 3, [1, 2, 3, [1, [11, 11, [12, 12], 11]]], 8, 13, [12, 9]];
$result = arrayTreeOutput($array);
echo '<br><br><br><br>';
echo getTree($array);
echo '<br><br><br><br>';
debug(getTree($array));
echo '<br><br><br><br>';
$tree = [
    "level 1" => ["level 1.1", "level 1.2"],
    "level 2",
    "level 3" => ["level 3.1", "level 3.2" => ["level 3.2.1", "level 3.2.2"], 
    "level 3.3"],
    "level 4" => ["level 4.1", "level 4.2", "level 4.3", "level 4.4"],
    "level 5"
];
echo getTree($tree);



