<?php

declare(strict_types=1);

$input = \file_get_contents('./01.txt');
$lines = \explode("\n", $input);

$total = 0;

$numbers = [
    "one" => 1, 
    "two" => 2, 
    "three" => 3, 
    "four" => 4, 
    "five" => 5, 
    "six" => 6, 
    "seven" => 7, 
    "eight" => 8, 
    "nine" => 9
];

foreach($lines as $line) {
    $chars = \str_split($line);
    $numerics = [];
    $calibrationValue = 0;
    $offset = 0;
    foreach($chars as $index => $char) {
        if(\is_numeric($char)) {
            $numerics[] = $char;
            $offset = $index + 1;
            continue;
        }
        $charsTillNow = \array_slice($chars, $offset, $index + 1);
        $charNum = \implode('', $charsTillNow);
        if(\str_contains($charNum, "one")) {
            $numerics[] = 1;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "two")) {
            $numerics[] = 2;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "three")) {
            $numerics[] = 3;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "four")) {
            $numerics[] = 4;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "five")) {
            $numerics[] = 5;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "six")) {
            $numerics[] = 6;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "seven")) {
            $numerics[] = 7;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "eight")) {
            $numerics[] = 8;
            $offset = $index + 1;
            continue;
        }
        if(\str_contains($charNum, "nine")) {
            $numerics[] = 9;
            $offset = $index + 1;
            continue;
        }
    }
    $calibrationValue = $numerics[0].$numerics[\count($numerics) - 1];
    \assert(\is_numeric($calibrationValue));
    $total += (int) $calibrationValue;
}

echo 'Total is '. $total;