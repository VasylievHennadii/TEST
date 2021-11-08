<?php

/**
 * рекурсивная функция находит N-й элемент ряда Фибоначчи
 * @param mixed $num
 * @return mixed
 */
function recursFibo($num){
    if($num == 0) return 0;
    if($num == 1 || $num == 2){
        return 1;
    }
    return recursFibo($num - 1) + recursFibo($num - 2);   
     
}

/**
 * функция выводит первые N чисел Фибоначчи
 * @param mixed $num
 * @return array
 */
function fibonacci($num){   
    $array[0] = 0;
    $array[1] = 1;
    for($i = 2; $i < $num; $i++){
        $array[$i] = $array[$i-2] + $array[$i-1];
    }
    return $array;
}

// function recFibo($num){
//     // $result = '';
//     $i = 2;
//     $array[0] = 0;
//     $array[1] = 1;
//     $array[$i] = (recFibo($num - 1) + recFibo($num - 2));
//     $i++;
//     return $array;
// }

/**
 * функция проверки входного параметра на простое число
 * @param int $num
 * @return bool
 */
function isPrime($num){
    $max = sqrt($num);
    for($i = 2; $i <= $max; $i++){
        if($num % $i === 0){
            return false;
        }
    }
    return $num > 1;
}

/**
 * рекурсивная функция которая обходит и выводит все значения любого массива и любого уровня вложенности
 * @param mixed $array
 * @param int $level
 * @return mixed
 */
function processArray($array, $level = 0) 
{    
    if (!is_array($array)) {        
        echo str_repeat('* ', $level) . $array . '<br>';       
        return $array;
    }
    $level++;
    
    foreach ($array as $arrayItem) {
        processArray($arrayItem, $level);
    }
}

/**
 * рекурсивная функция которая обходит и выводит все значения любого массива и любого уровня вложенности
 * @param mixed $array
 * @param string $tab
 * @param string $result
 * @return string
 */
function tree($array, $tab = '', $result = '')
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result .= "{$tab}[$key] <i style='color:red;'>(array)</i><br>";
            $result .= tree($value, $tab . str_repeat('&nbsp;', 8));
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
    echo "<pre>" . print_r($data, 1) . "</pre>";
    if($die){
        die;
    }
}