<?php

function processNumbers(array $numbers, callable $callback): array
{
    // array_mapは配列の各要素に関数を適用する
    return array_map($callback, $numbers);
}

function squareNumber(int $number): int
{
    return pow($number, 2);
}

$numbers = [1, 2, 3, 4];
$squaredNumbers = processNumbers($numbers, 'squareNumber');
print_r($squaredNumbers); // Output: Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 )