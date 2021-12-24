<?php


/**
 * функция преобразования числа из двоичной в десятичную СС
 */
function binaryToDecimal(string $binaryString): float {
    if(!is_string($binaryString)){
        throw new Exception("Error: input parameter {$binaryString} is not a string");
    }
    $len = strlen($binaryString);
    $result = 0;
    for($i = 0; $i < $len; $i++){
        if($binaryString[$i] === '1' || $binaryString[$i] === '0'){
            $result += $binaryString[$i] * exponentiation(2, $len-$i-1);
        } else{
            throw new Exception("Error: input parameter {$binaryString} is not binary");
        }
        
    }
    return $result;    
}

try{
    debug(binaryToDecimal('11110101'));
} catch (Exception $e){
    echo 'An exception was thrown in the binaryToDecimal(): ' . $e->getMessage() . '<br>'; 
}


/**
 * функция преобразования числа из десятичной в двоичную СС
 */
function decimalToBinary(int $num): string {    
    if(!is_int($num)){
        throw new Exception("The input parameter {$num} is not an integer decimal number");
    }
    $result = '';
    $absValue = abs($num);
    while($absValue !== 0){
        $result = ($absValue % 2) . $result;        
        $absValue = intdiv($absValue, 2);        
    }
    return $result;
}

try{
    debug(decimalToBinary(75));
} catch (Exception $e){
    echo 'An exception was thrown in the decimalToBinary(): ' . $e->getMessage() . '<br>'; 
}


/**
 * функция получает первые N чисел Фибоначчи
 */
function getFibonacci(int $num): array {   
    $arrayFibonacciNumbers = [];
    if($num <= 0 || !is_int($num)){            
        throw new Exception("Error: an element of the Fibonacci series with this ordinal number = {$num} does not exist");
    }    
    for($i = 1; $i <= $num; $i++){        
        $arrayFibonacciNumbers[$i] = numberFibonacci($i);
    }
    return $arrayFibonacciNumbers;    
}

try{
    debug(getFibonacci(13));
} catch (Exception $e){
    echo 'An exception was thrown in the getFibonacci(): ' . $e->getMessage() . '<br>'; 
}


/**
 * рекурсивная функция находит N-й элемент ряда Фибоначчи
 */
function numberFibonacci(int $num): int {
    if(!is_int($num) || $num <= 0){
        throw new Exception("The input parameter {$num} is not an integer decimal number");
    }    
    if($num === 1 || $num === 2){
        return 1;
    }
    return numberFibonacci($num - 1) + numberFibonacci($num - 2);    
}

try{
    debug(numberFibonacci(13));
} catch (Exception $e){
    echo 'An exception was thrown in the numberFibonacci(): ' . $e->getMessage() . '<br>'; 
}


/**
 * функция возведения числа N в степень M
 */
function exponentiation(float $base, int $exponent): float {   
    if(!is_int($exponent) || !is_float($base)){
        throw new Exception("The input parameter {$base} is not a float or {$exponent} is not an integer ");
    }
    $result = 1; 
    $absExponent = abs($exponent);    
    if($exponent === 0){
        return 1;
    }
    for($i = 0; $i < $absExponent; $i++){        
        $result *= $base;
    }
    if($exponent < 0){
        return 1 / $result;
    }
    return $result;    
}

try{
    echo exponentiation(5, -3) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the exponentiation(): ' . $e->getMessage() . '<br>';        
}   


/**
 * рекурсивная функция возведения числа N в степень M
 */
function recursExponentiation(float $base, int $exponent): float {
    if(!is_int($exponent) || !is_float($base)){
        throw new Exception("The input parameter {$base} is not a float or {$exponent} is not an integer");
    }
    if ($exponent === 0) {
        return 1;
    }
    if ($exponent < 0) {
        return recursExponentiation(1/$base, -$exponent);
    }
    return $base * recursExponentiation($base, $exponent-1);
}

try{
    echo recursExponentiation(5, -3) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the recursExponentiation(): ' . $e->getMessage() . '<br>';        
}  


/**
 * функция проверки валидности IP-адреса для версии ipv4
 */
function isValidIP(string $stringIP): bool {    
    if(!is_string($stringIP)){
        throw new Exception("Error: input parameter {$stringIP} is not a string");
    }
    $array = explode('.', $stringIP);
    if(count($array) === 4){
        foreach($array as $value){
            if($value > 255 || $value < 0 || !ctype_digit($value)){
                return false;
            }
        }
    } else {
    return false;
    }
    return true;
}

try{
    echo isValidIP('250.03.156.123') . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the isValidIP(): ' . $e->getMessage() . '<br>';        
}  


/**
 * функция проверки валидности IP-адреса для версии ipv4 с помощью регулярного выражения
 */
function isValidIpPregMatch(string $stringIP): bool {
    $reg = '/^(([01]?\\d\\d?|2[0-4]\\d|25[0-5])\\.){3}([01]?\\d\\d?|2[0-4]\\d|25[0-5])$/';    
    return (bool) preg_match($reg, $stringIP);
}


/**
 * функция подсчитывает процентное соотношение чисел в массиве по заданным параметрам
 */
function calculatePercentages($array, string $callback): float {    
    if(!is_array($array)){
        throw new Exception("Error: input parameter {$array} is not an array");
    }
    $number = 0;   
    foreach($array as $value){
        if($callback($value)){            
            $number++;
        }
    } 
    return $number / count($array) * 100;     
}

$arrForSort = [1, 25, -3, 0, 17, -5, 30, -3, 8, 156, -324, 88, 111, 1, 0];
try{
    echo calculatePercentages($arrForSort, 'isPositive') . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the calculatePercentag($array, $callback): ' . $e->getMessage() . '<br>';        
}

/**
 * функция проверки входного параметра на простое число
 */
function isPrime(int $num): bool {
    $max = sqrt($num);
    for($i = 2; $i <= $max; $i++){
        if($num % $i === 0){
            return false;
        }
    }
    return $num >= 1;
}

/**
 * функция проверки входного параметра на положительное число
 */
function isPositive(float $num): bool {
    return $num > 0;
}

/**
 * функция проверки входного параметра на отрицательное число
 */
function isNegative(float $num): bool {
    return $num < 0;
}

/**
 * функция проверки входного параметра на ноль
 */
function isZero(int $num): bool {
    return $num === 0;
}


/**
 * сортировка массива по возрастанию/убыванию
 */
function sortArray(array $array, string $callback): array {    
    if(!is_array($array)){
        throw new Exception("Error: input parameter {$array} is not an array");
    }
    $length = count($array);
    for($i = 0; $i < $length-1; $i++){
        for($j = 0; $j < $length-1-$i; $j++){ 
            if($callback($array[$j], $array[$j + 1])){
                $temp = $array[$j + 1];
                $array[$j + 1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }    
    return $array;
}

try{
    debug(sortArray($arrForSort, 'sortDescending')) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the sortArray($array, $callback, true): ' . $e->getMessage() . '<br>';        
}  

/**
 * callback функция для перестановки элементов массива по возрастанию
 */
function sortAscending($arrayValue, $nextArrayValue): bool{    
    return $nextArrayValue < $arrayValue;    
}

/**
 * callback функция для перестановки элементов массива по убыванию
 */
function sortDescending($arrayValue, $nextArrayValue): bool{    
    return $nextArrayValue > $arrayValue;    
}

$testMatrix = array(
    array(1, 2, 3, 1),
    array(3, 5, 0, -6),
    array(5, 9, -8, 12)
);

/**
 * функция удаляет строки матрицы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 */
function delRowMatrixByCond($array): array {    
    $result = [];
    if(!is_array($array) || !is_array($array[0])){
        throw new Exception("Error: input parameter is not an array/matrix");
    }
    $rowIndex = 0;
    $colIndex = 0;
    $row = count($array);
    $column = count($array[0]);
    for($i = 0; $i < $row; $i++){
        if(!is_array($array[$i]) || (count($array[$i]) !== count($array[0]))){
            throw new Exception("Error: input parameter is not a matrix");
        } 
        $sum = 0;
        for($j = 0; $j < $column; $j++){
            $sum += $array[$i][$j];            
            if($array[$i][$j] === 0){
                $rowIndex = $i;
                $colIndex = $j;
            }
        }
        if($sum > 0 && $array[$rowIndex][$colIndex] === 0){            
            $result = arrayRowRemove($array, $rowIndex);
        }
    }       
    return $result;    
}

try{
    debug(delRowMatrixByCond($testMatrix)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the delRowMatrixByCond($array): ' . $e->getMessage() . '<br>';        
}  


/**
 * функция удаляет столбцы матрицы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 */
function delColMatrixByCond($array): array {    
    $result = [];
    if(!is_array($array) || !is_array($array[0])){
        throw new Exception("Error: input parameter is not an array/matrix");
    }           
    $rowIndex = 0;
    $colIndex = 0;
    $row = count($array);
    $column = count($array[0]);
    for($j = 0; $j < $column; $j++){            
        $sum = 0;
        for($i = 0; $i < $row; $i++){
            if(!is_array($array[$i]) || (count($array[$i]) !== count($array[0]))){
                throw new Exception("Error: input parameter is not a matrix");
            } 
            $sum += $array[$i][$j];            
            if($array[$i][$j] === 0){
                $rowIndex = $i;
                $colIndex = $j;
            }
        }
        if($sum > 0 && $array[$rowIndex][$colIndex] === 0){            
            $result = arrayColRemove($array, $colIndex);
        }
    }        
    return $result;    
}

try{
    debug(delColMatrixByCond($testMatrix)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the delColMatrixByCond($array): ' . $e->getMessage() . '<br>';        
}  


/**
 * функция удаления строки матрицы
 */
function arrayRowRemove(array $array, $rowIndex): array {
    if (is_array($array) && array_key_exists($rowIndex, $array)){
        unset($array[$rowIndex]);
        $array = array_values($array);
    }
    return $array;
}

/**
 * функция удаления столбца матрицы
 */
function arrayColRemove(array $array, $colIndex): array {
    if (is_array($array) && count($array)){
        foreach ($array as $rowIndex => $row){
            if (array_key_exists($colIndex, $row)){
                unset($array[$rowIndex][$colIndex]);
                $array[$rowIndex] = array_values($array[$rowIndex]);
            }
        }
    }
    return $array;
}

/**
 * функция транспонирования матрицы
 */
function transposeMatrix($array): array{   
    $result = [];    
    if(!is_array($array)){
        throw new Exception("Error: input parameter is not an array");
    }
    foreach($array as $key => $subarray){
        if(!is_array($subarray)){
            return $array;
        }
        foreach($subarray as $subkey => $value){
            $result[$subkey][$key] = $value;
        }
    }    
    return $result;   
}

$trans = array(
    array(1, 2, 9, 1),
    array(3, 4, 9, 1),
    array(5, 6, 9, 1)
);
try{
    debug(transposeMatrix($trans)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the transposeMatrix($array): ' . $e->getMessage() . '<br>';        
}  


/**
 * функция сложения двух матриц
 */
function sumMatrix($array, $arr): array{    
    if(!is_array($arr) || !is_array($array)){
        throw new Exception("Error: input parameter is not an array");
    }        
    if(count($array) !== count($arr) && count($array[0]) !== count($arr[0])){
        throw new Exception("Error: matrix sizes do not match");
    }  
    $result = [];      
    for($i = 0; $i < count($array); $i++){
        for($j = 0; $j < count($array[0]); $j++){
            $result[$i][$j] = $array[$i][$j] + $arr[$i][$j];
        }
    }
    return $result;    
}

$sumArray = array(
    array(1, 2, 3, 1),
    array(3, 5, 7, 9),
    array(5, 9, 8, 12)
);
try{
    debug(sumMatrix($trans, $sumArray)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the sumMatrix($array): ' . $e->getMessage() . '<br>';        
}


/**
 * рекурсивная функция которая обходит и выводит все значения любого массива и любого уровня вложенности
 */
function arrayTreeOutput($array, $level = 0){    
    if (!is_array($array)) {        
        echo str_repeat('* ', $level) . $array . '<br>';       
        return $array;
    }
    $level++;    
    foreach ($array as $arrayItem) {
        arrayTreeOutput($arrayItem, $level);
    }
}

/**
 * рекурсивная функция которая обходит и получает все значения любого массива и любого уровня вложенности
 */
function getTree(array $array, string $tab = '', string $result = ''): string {
    if(!is_array($array)){
        throw new Exception("Input parameter {$array} is not an array");
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result .= "{$tab}[$key] <i style='color:red;'>(array)</i><br>";
            $result .= getTree($value, $tab . str_repeat('&nbsp;', 4));
        } else {
            $result .= "{$tab}[$key] => <b>$value</b><br>";
        }
    }
    return $result;
}

$array = [[5, 5], 1, 2, 3, [1, 2, 3, [1, [11, 11, [12, 12], 11]]], 8, 13, [12, 9]];
try{
    debug(getTree($array)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the getTree(): ' . $e->getMessage() . '<br>';        
}  

/**
 * функция удобного вывода массива
 */
function debug($data, $die = false){
    echo "<pre>" . print_r($data, true) . "</pre>";
    if($die){
        die;
    }
}