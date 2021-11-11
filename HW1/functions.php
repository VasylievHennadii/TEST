<?php
declare(strict_types=1);

/*Написать функцию которая по параметрам принимает число из десятичной
системы счисления и преобразовывает в двоичную. 
Написать функцию которая выполняет преобразование наоборот.*/

/**
 * функция преобразования числа из двоичной в десятичную СС
 * @param string $str
 * @return float
 */
function binaryToDecimal(string $str): float{
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
function decimalToBinary(int $num): string{    
    $result = '';
    while($num != 0){
        $result = ($num % 2) . $result;        
        $num = intdiv($num, 2);        
    }
    return $result;
}


/*Написать функцию которая находит первые N чисел фибоначчи*/

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


/*Написать функцию, возведения числа N в степень M*/

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


/*Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных
IP-адресов. Вычислить для версии ipv4.*/

/**
 * функция проверки валидности IP-адреса для версии ipv4
 * @param string $str
 * @return bool
 */
function isValidIP(string $str): bool{
    $array = explode('.', $str);
    if(count($array) == 4){
        foreach($array as $n){
            if($n > 255 || $n < 0 || !ctype_digit($n)){
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
function isValidIpPregMatch(string $str): bool{
    $reg = '/^(([01]?\\d\\d?|2[0-4]\\d|25[0-5])\\.){3}([01]?\\d\\d?|2[0-4]\\d|25[0-5])$/';    
    return (bool) preg_match($reg, $str);
}


/*Для одномерного массива
    - Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел
    - Отсортировать элементы по возрастанию/убыванию */

/**
 * функция подсчитывает процентное соотношение чисел в массиве по заданным параметрам
 * @param array $array
 * @param string $callback
 * @return float
 */
function calculatePercentages(array $array, string $callback): float {
    $k = 0;   
    foreach($array as $value){
        if($callback($value)){            
            $k++;
        }
    } 
    return $k / count($array) * 100;
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
                $tmp = $array[$j+1];
                $array[$j+1] = $array[$j];
                $array[$j] = $tmp;
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
function sortDescend($array){
    $length = count($array);
    for($i = 0; $i < $length-1; $i++){
        for($j = 0; $j < $length-1-$i; $j++){            
            if($array[$j+1] > $array[$j]){
                $tmp = $array[$j+1];
                $array[$j+1] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;
}




/*Для двумерных массивов
    - Транспонировать матрицу
    - Сложить две матрицы
    - Удалить те строки, в которых сумма элементов положительна и 
        присутствует хотя бы один нулевой элемент. 
    - Аналогично для столбцов.*/

/**
 * функция транспонирования матрицы
 * @param mixed $array
 * @return array
 */
function transposeMatrix(array $array): array{
    $result = [];
    $line = count($array);
    $column = count($array[0]);
    for($i = 0; $i < $line; $i++){
        for($j = 0; $j < $column; $j++){
            $result[$j][$i] = $array[$i][$j];
        }
    }
    return $result;    
}


/*----------------Рекурсии---------------------------------------------------
    - Все задачи на циклы которые можно реализовать с помощью рекурсии,
        переписать с помощью рекурсивных функций
    - Написать рекурсивную функцию которая будет обходить и выводить все
        значения любого массива и любого уровня вложенности*/

/**
 * рекурсивная функция находит N-й элемент ряда Фибоначчи
 * @param int $num
 * @return int
 */
function recursFibo(int $num): int {
    if($num == 0) return 0;
    if($num == 1 || $num == 2){
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
    if ($exponent == 0) {
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
            $result .= getTree($value, $tab . str_repeat('&nbsp;', 8));
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