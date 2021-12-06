<?php 
// declare(strict_types=1);

// error_reporting(-1);

ini_set("display_errors", '0');

require_once 'functions.php';



echo 'decimalToBinary(75)' . '<br>';
try{
    debug(decimalToBinary(75));
} catch (Exception $e){
    echo 'An exception was thrown in the decimalToBinary(): ' . $e->getMessage() . '<br>'; 
}

echo "binaryToDecimal('11110101')" . '<br>';
try{
    debug(binaryToDecimal('11110101'));
} catch (Exception $e){
    echo 'An exception was thrown in the binaryToDecimal(): ' . $e->getMessage() . '<br>'; 
}

echo "getFibonacci()" . '<br>';
try{
    debug(getFibonacci(13));
} catch (Exception $e){
    echo 'An exception was thrown in the getFibonacci(): ' . $e->getMessage() . '<br>'; 
}

echo "numberFibonacci()" . '<br>';
try{
    debug(numberFibonacci(13));
} catch (Exception $e){
    echo 'An exception was thrown in the numberFibonacci(): ' . $e->getMessage() . '<br>'; 
}

echo '<br><br>';

$zeroArr = [[1, 3], [1], [], 5, [4]];

$arrForSort = [1, 25, -3, 0, 17, -5, 30, -3, 8, 156, -324, 88, 111, 1, 0];

echo 'calculatePercentages($arrForSort, "isPositive")' . '<br>';
try{
    echo calculatePercentages($arrForSort, 'isPositive') . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the calculatePercentag($array, $callback): ' . $e->getMessage() . '<br>';        
} 

echo 'calculatePercentages($arrForSort, "isPrime")' . '<br>';
try{
    echo calculatePercentages($arrForSort, 'isPrime') . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the calculatePercentag($array, $callback): ' . $e->getMessage() . '<br>';        
}  

echo 'calculatePercentages($arrForSort, "isNegative")' . '<br>';
try{
    echo calculatePercentages($arrForSort, 'isNegative') . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the calculatePercentag($array, $callback): ' . $e->getMessage() . '<br>';        
}  

echo 'calculatePercentages($arrForSort, "isZero")' . '<br>';
try{
    echo calculatePercentages($arrForSort, 'isZero') . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the calculatePercentag($array, $callback): ' . $e->getMessage() . '<br>';        
}  
echo '<br><br>';

echo "debug(sortArray($arrForSort, 'sortAscending', true))" . '<br>';
try{
    debug(sortArray($arrForSort, 'sortAscending', true)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the sortArray($array, $callback, true): ' . $e->getMessage() . '<br>';        
}
echo '<br>';

echo "debug(sortArray($arrForSort, 'sortAscending', false))" . '<br>';
try{
    debug(sortArray($arrForSort, 'sortAscending', false)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the sortArray($array, $callback, true): ' . $e->getMessage() . '<br>';        
}
echo '<br>';

echo "exponentiation(5, -3)" . '<br>';
try{
    echo exponentiation(5, -3) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the exponentiation(): ' . $e->getMessage() . '<br>';        
} 

echo "recursExponentiation(5, -3)" . '<br>';
try{
    echo recursExponentiation(5, -3) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the recursExponentiation(): ' . $e->getMessage() . '<br>';        
}  

echo '<br>';

echo "isValidIP('250.03.156.123')". '<br>';
try{
    echo isValidIP('250.03.156.123') . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the isValidIP(): ' . $e->getMessage() . '<br>';        
}   

echo '<br>';
echo "isValidIpPregMatch('250.03.156.123')". '<br>';
echo isValidIpPregMatch('250.03.156.123');


$trans = array(
    array(1, 2, 9, 1),
    array(3, 4, 9, 1),
    array(5, 6, 9, 1)
);
$transs = '5';
echo '<br><br><br><br>';
echo '$trans';
debug($trans);

echo 'transposeMatrix($trans)';
try{
    debug(transposeMatrix($trans)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the transposeMatrix($array): ' . $e->getMessage() . '<br>';        
}  

$sumArray = array(
    array(1, 2, 3, 1),
    array(3, 5, 7, 9),
    array(5, 9, 8, 12)
);
echo 'sumMatrix($trans, $sumArray)';
try{
    debug(sumMatrix($trans, $sumArray)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the sumMatrix($array): ' . $e->getMessage() . '<br>';        
}  
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
try{
    debug(delRowMatrixByCond($testMatrix)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the delRowMatrixByCond($array): ' . $e->getMessage() . '<br>';        
}  
echo '<br>';

echo 'delColMatrixByCond($testMatrix)';
try{
    debug(delColMatrixByCond($testMatrix)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the delColMatrixByCond($array): ' . $e->getMessage() . '<br>';        
}  

echo '<br><br><br><br>';


$array = [[5, 5], 1, 2, 3, [1, 2, 3, [1, [11, 11, [12, 12], 11]]], 8, 13, [12, 9]];

echo 'arrayTreeOutput($array)' . '<br><br>';
arrayTreeOutput($array);
echo '<br><br>';

echo 'debug(getTree($array))' . '<br>';
try{
    debug(getTree($array)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the getTree(): ' . $e->getMessage() . '<br>';        
}  
echo '<br><br>';

$tree = [
    "level 1" => ["level 1.1", "level 1.2"],
    "level 2",
    "level 3" => ["level 3.1", "level 3.2" => ["level 3.2.1", "level 3.2.2"], 
    "level 3.3"],
    "level 4" => ["level 4.1", "level 4.2", "level 4.3", "level 4.4"],
    "level 5"
];

echo 'debug(getTree($tree))';
try{
    debug(getTree($tree)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the getTree(): ' . $e->getMessage() . '<br>';        
}  



