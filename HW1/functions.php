<?php
declare(strict_types=1);


/**
 * функция преобразования числа из двоичной в десятичную СС
 * @param string $str
 * @return float
 */
function binaryToDecimal(string $str): float {
    $len = strlen($str);
    $result = 0;
    for($i = 0; $i < $len; $i++){
        $result += $str[$i] * exponentiation(2, $len-$i-1);
    }
    return $result;
}

/**
 * функция преобразования числа из десятичной в двоичную СС
 * @param int $num
 * @return string
 */
function decimalToBinary(int $num): string {    
    $result = '';
    while($num !== 0){
        $result = ($num % 2) . $result;        
        $num = intdiv($num, 2);        
    }
    return $result;
}

/**
 * функция находит первые N чисел Фибоначчи
 * @param int $num
 * @return array
 */
function getFibonacci(int $num): array {   
    $array[0] = 0;
    $array[1] = 1;
    for($i = 2; $i < $num; $i++){
        $array[$i] = $array[$i-2] + $array[$i-1];
    }
    return $array;
}

/**
 * функция возведения числа N в степень M
 * @param float $base
 * @param int $exponent
 * @return float
 */
function exponentiation(float $base, int $exponent): float {
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

/**
 * функция проверки валидности IP-адреса для версии ipv4
 * @param string $str
 * @return bool
 */
function isValidIP(string $str): bool {
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
function calculatePercentages(array $array, string $callback): float {
    $number = 0;   
    foreach($array as $value){
        if($callback($value)){            
            $number++;
        }
    } 
    return $number / count($array) * 100;
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
 * сортировка массива по возрастанию
 * @param array $array
 * @return array
 */
function sortAscend(array $array): array {
    $length = count($array);
    for($i = 0; $i < $length-1; $i++){
        for($j = 0; $j < $length-1-$i; $j++){            
            if($array[$j+1] < $array[$j]){
                $temp = $array[$j+1];
                $array[$j+1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

/**
 * сортировка массива по убыванию
 * @param array $array
 * @return array
 */
function sortDescend(array $array): array {
    $length = count($array);
    for($i = 0; $i < $length-1; $i++){
        for($j = 0; $j < $length-1-$i; $j++){            
            if($array[$j+1] > $array[$j]){
                $temp = $array[$j+1];
                $array[$j+1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

/**
 * функция удаляет строки матрицы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 * @param array $array 
 * @return array
 */
function delRowMatrixByCond(array $array): array {
    $result = [];
    if(is_array($array) && count($array) && is_array($array[0])){
        $sum = $rowIndex = $colIndex = 0;
        $row = count($array);
        $column = count($array[0]);
        for($i = 0; $i < $row; $i++){
            if(!is_array($array[$i]) || (count($array[$i]) !== count($array[0]))){
                return[];
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
    }
    return $result;
}

/**
 * функция удаляет столбцы матрицы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 * @param array $array
 * @return array
 */
function delColMatrixByCond(array $array): array {
    $result = [];
    if(is_array($array) && count($array) && is_array($array[0])){
        $sum = $rowIndex = $colIndex = 0;
        $row = count($array);
        $column = count($array[0]);
        for($j = 0; $j < $column; $j++){            
            $sum = 0;
            for($i = 0; $i < $row; $i++){
                if(!is_array($array[$i]) || (count($array[$i]) !== count($array[0]))){
                    return[];
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
    }
    return $result;
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
function transposeMatrix(array $array): array{
    $result = [];    
    if(!is_array($array)){
        return [];
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

/**
 * функция сложения двух матриц
 * @param array $array
 * @param array $arr
 * @return array
 */
function sumMatrix(array $array, array $arr): array{
    $result = [];
    if(count($array) === count($arr) && count($array[0]) === count($arr[0])){
        for($i = 0; $i < count($array); $i++){
            for($j = 0; $j < count($array[0]); $j++){
                $result[$i][$j] = $array[$i][$j] + $arr[$i][$j];
            }
        }
        return $result;
    }
    return [];
}

/**
 * рекурсивная функция находит N-й элемент ряда Фибоначчи
 * @param int $num
 * @return int
 */
function recursFibo(int $num): int {
    if($num === 0){
        return 0;
    } 
    if($num === 1 || $num === 2){
        return 1;
    }
    return recursFibo($num - 1) + recursFibo($num - 2);   
     
}

/**
 * рекурсивная функция возведения числа N в степень M
 * @param float $base
 * @param int $exponent
 * @return float
 */
function recursExponentiation(float $base, int $exponent): float {
    if ($exponent === 0) {
        return 1;
    }
    if ($exponent < 0) {
        return recursExponentiation(1/$base, -$exponent);
    }
    return $base * recursExponentiation($base, $exponent-1);
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