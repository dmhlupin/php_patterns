<?php

function createArray($n) {
    $result = [];
    for($i = 0; $i <= $n; $i++) {
        $num = rand(1, $n);
        array_push($result, $num);
    }
    return $result;
}

function bubbleSortTemp($array){

    for($i=0; $i<count($array); $i++){
        $count = count($array);
        for($j=$i+1; $j<$count; $j++){
            if($array[$i]>$array[$j]){
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
        }
    }
    return $array;
}

function bubbleSortList($array){

    for($i=0; $i<count($array); $i++){
        $count = count($array);
        for($j=$i+1; $j<$count; $j++){
            if($array[$i]>$array[$j]){
                list($array[$j], $array[$i]) = array($array[$i], $array[$j]);
            }
        }
    }
    return $array;
}

function bubbleSortBinary($array){

    for($i=0; $i<count($array); $i++){
        $count = count($array);
        for($j=$i+1; $j<$count; $j++){
            if($array[$i]>$array[$j]){
                $array[$i] = $array[$i] ^ $array[$j] ^ ($array[$j] = $array[$i]);
            }
        }
    }
    return $array;
}

function showArray($array){
    for($i = 0; $i < count($array); $i++){
        echo $i .": " . $array[$i] . PHP_EOL;
    }
}

$array = createArray(50000);
showArray($array);

$start = microtime(true);
$sortedArray = BubbleSortBinary($array);
echo "Сортировка пузырьком с использованием XOR: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
bubbleSortTemp($array);
echo "Сортировка пузырьком с использованием temp: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
bubbleSortList($array);
echo "Сортировка пузырьком с использованием list: ".( microtime(true) - $start).PHP_EOL;


