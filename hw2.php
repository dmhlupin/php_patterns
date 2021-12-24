<?php
// Реализовать удаление элемента массива по его значению. Обратите внимание на возможные дубликаты!

// Идея: На первом этапе применить наиболее быстрый поиск - интерполяционный.
// Он позволит попасть в ту область массива, где содержатся искомые числа.
// Но: Если массив неравномерный, например - такой: 1,2,8,8,8,8,8,8,8,8,8,8,9,10
// То мы попадем в середину области восьмерок, и нам нужно найти левый и правый индексы интервала с восьмерками.
// Это делаем с помощью перебора влево и вправо.
// Затем с помощью array_splice удаляем область.


function InterpolationDelete($myArray, $num)
{
    $start = 0;
    $last = count($myArray) - 1;


    while (($start <= $last) && ($num >= $myArray[$start]) && ($num <= $myArray[$last])) {

        $pos = floor($start + ((($last - $start) / ($myArray[$last] - $myArray[$start])) * ($num - $myArray[$start])));
        if ($myArray[$pos] == $num) {
            
            $left = $pos;
            $right = $pos;
            while($myArray[$left-1] == $myArray[$left]) { // Перебор влево, ищем левый индекс
                $left--;
            }
            while($myArray[$right+1] == $myArray[$right]) { // Перебор вправо, ищем правый индекс
                $right++;
            }
            array_splice($myArray, $left, $right - $left + 1); // Удаляем область
            return $myArray;
        }

        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        }

        else {
            $last = $pos - 1;
        }
    }
    return null;
}

$arr = [1,2,8,8,8,8,8,8,8,10,12,14,17,17,17,17,23];
$resultArr = InterpolationDelete($arr, 8);
for($i = 0; $i < count($resultArr); $i++) {
    echo $resultArr[$i] . PHP_EOL;
}
