<?php


/**
 * функция преобразования числа из двоичной в десятичную СС
 * @param string $str
 * @return float
 */
function binaryToDecimal(string $str): float {
    if(!is_string($str)){
        throw new Exception("Ошибка: входной параметр {$str} не является строкой");
    }
    $len = strlen($str);
    $result = 0;
    for($i = 0; $i < $len; $i++){
        if($str[$i] === '1' || $str[$i] === '0'){
            $result += $str[$i] * exponentiation(2, $len-$i-1);
        } else{
            throw new Exception("Ошибка: входной параметр {$str} не является двоичным числом");
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
 * @param int $num
 * @return string
 */
function decimalToBinary(int $num): string {    
    if(!is_int($num)){
        throw new Exception("Входной параметр {$num} не является целым десятичным числом");
    }
    $result = '';
    while($num !== 0){
        $result = ($num % 2) . $result;        
        $num = intdiv($num, 2);        
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
 * @param int $num
 * @return array
 */
function getFibonacci(int $num): array {   
    $array = [];
    if($num <= 0 || !is_int($num)){            
        throw new Exception("Ошибка: элемента ряда Фибоначчи с таким порядковым номером = {$num}  не существует");
    }    
    for($i = 1; $i <= $num; $i++){
        array_push($array, numberFibonacci($i));
    }
    return $array;    
}

try{
    debug(getFibonacci(13));
} catch (Exception $e){
    echo 'An exception was thrown in the getFibonacci(): ' . $e->getMessage() . '<br>'; 
}


/**
 * рекурсивная функция находит N-й элемент ряда Фибоначчи
 * @param int $num
 * @return int
 */
function numberFibonacci(int $num): int {
    if(!is_int($num) || $num <= 0){
        throw new Exception("Входной параметр {$num} не является целым десятичным числом");
    }
    if($num === 0 || $num < 0){
        return 0;
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
 * @param float $base
 * @param int $exponent
 * @return float
 */
function exponentiation(float $base, int $exponent): float {   
    if(!is_int($exponent) || !is_float($base)){
        throw new Exception("Входной параметр {$base} не float или {$exponent} не integer ");
    }
    $result = 1;    
    if($exponent === 0){
        return 1;
    }
    for($i = 0; $i < abs($exponent); $i++){        
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
 * функция проверки валидности IP-адреса для версии ipv4
 * @param string $str
 * @return bool
 */
function isValidIP(string $str): bool {    
    if(!is_string($str)){
        throw new Exception("Ошибка: входной параметр {$str} не является строкой");
    }
    $array = explode('.', $str);
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
 * @param string $str
 * @return bool
 */
function isValidIpPregMatch(string $str): bool {
    $reg = '/^(([01]?\\d\\d?|2[0-4]\\d|25[0-5])\\.){3}([01]?\\d\\d?|2[0-4]\\d|25[0-5])$/';    
    return (bool) preg_match($reg, $str);
}

/**
 * функция подсчитывает процентное соотношение чисел в массиве по заданным параметрам
 * @param array $array
 * @param string $callback
 * @return float
 */
function calculatePercentages($array, string $callback): float {    
    if(!is_array($array)){
        throw new Exception("Ошибка: входной параметр {$array} не является массивом");
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
 * @param int $num
 * @return bool
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
 * @param float $num
 * @return bool
 */
function isPositive(float $num): bool {
    return $num > 0;
}

/**
 * функция проверки входного параметра на отрицательное число
 * @param float $num
 * @return bool
 */
function isNegative(float $num): bool {
    return $num < 0;
}

/**
 * функция проверки входного параметра на ноль
 * @param int $num
 * @return bool
 */
function isZero(int $num): bool {
    return $num === 0;
}

/**
 * сортировка массива по возрастанию/убыванию $flag = true/false
 * @param array $array
 * @param string $callback
 * @param bool $flag
 * @return array
 */
function sortArray($array, string $callback, bool $flag = true): array {    
    if(!is_array($array)){
        throw new Exception("Ошибка: входной параметр {$array} не является массивом");
    }
    $length = count($array);
    for($i = 0; $i < $length-1; $i++){
        for($j = 0; $j < $length-1-$i; $j++){ 
            $array = $callback($array, $j);
        }
    }
    return ($flag === true) ? $array : array_reverse($array);
}

try{
    debug(sortArray($arrForSort, 'sortAscending', true)) . '<br>';
} catch (Exception $e){
    echo 'An exception was thrown in the sortArray($array, $callback, true): ' . $e->getMessage() . '<br>';        
}  


/**
 * callback функция для перестановки элементов массива по возрастанию
 * @param array $array
 * @param int $num
 * @return array
 */
function sortAscending(array $array, int $num): array{
    if($array[$num + 1] < $array[$num]){
        $temp = $array[$num + 1];
        $array[$num + 1] = $array[$num];
        $array[$num] = $temp;
    }
    return $array;    
}

$testMatrix = array(
    array(1, 2, 3, 1),
    array(3, 5, 0, -6),
    array(5, 9, -8, 12)
);

/**
 * функция удаляет строки матрицы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 * @param array $array 
 * @return array
 */
function delRowMatrixByCond($array): array {    
    $result = [];
    if(!is_array($array) || !is_array($array[0])){
        throw new Exception("Ошибка: входной параметр не является массивом/матрицей");
    }
    $rowIndex = 0;
    $colIndex = 0;
    $row = count($array);
    $column = count($array[0]);
    for($i = 0; $i < $row; $i++){
        if(!is_array($array[$i]) || (count($array[$i]) !== count($array[0]))){
            throw new Exception("Ошибка: входной параметр не является матрицей");
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
 * @param array $array
 * @return array
 */
function delColMatrixByCond($array): array {    
    $result = [];
    if(!is_array($array) || !is_array($array[0])){
        throw new Exception("Ошибка: входной параметр не является массивом/матрицей");
    }           
    $rowIndex = 0;
    $colIndex = 0;
    $row = count($array);
    $column = count($array[0]);
    for($j = 0; $j < $column; $j++){            
        $sum = 0;
        for($i = 0; $i < $row; $i++){
            if(!is_array($array[$i]) || (count($array[$i]) !== count($array[0]))){
                throw new Exception("Ошибка: входной параметр не является матрицей");
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
 * @param array $array
 * @param mixed $rowIndex
 * @return array
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
 * @param array $array
 * @param mixed $colIndex
 * @return array
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
 * @param mixed $array
 * @return array
 */
function transposeMatrix($array): array{   
    $result = [];    
    if(!is_array($array)){
        throw new Exception("Ошибка: входной параметр не является массивом");
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
 * @param array $array
 * @param array $arr
 * @return array
 */
function sumMatrix($array, $arr): array{    
    if(!is_array($arr) || !is_array($array)){
        throw new Exception("Ошибка: входной параметр не является массивом");
    }        
    if(count($array) !== count($arr) && count($array[0]) !== count($arr[0])){
        throw new Exception("Ошибка: размеры матриц не совпадают");
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
 * рекурсивная функция возведения числа N в степень M
 * @param float $base
 * @param int $exponent
 * @return float
 */
function recursExponentiation(float $base, int $exponent): float {
    if(!is_int($exponent) || !is_float($base)){
        throw new Exception("Входной параметр {$base} не float или {$exponent} не integer ");
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
 * рекурсивная функция которая обходит и выводит все значения любого массива и любого уровня вложенности
 * @param mixed $array
 * @param int $level
 * @return mixed
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
 * @param array $array
 * @param string $tab
 * @param string $result
 * @return string
 */
function getTree(array $array, string $tab = '', string $result = ''): string {
    if(!is_array($array)){
        throw new Exception("Входной параметр {$array} не является массивом");
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
 * @param mixed $data
 * @param bool $die
 * @return void
 */
function debug($data, $die = false){
    echo "<pre>" . print_r($data, true) . "</pre>";
    if($die){
        die;
    }
}