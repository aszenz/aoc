<?php

declare(strict_types=1);

$input = \file_get_contents('./01.txt');
$lines = \explode("\n", $input);

$total = 0;

foreach($lines as $line) {
    $chars = \str_split($line);
    $numerics = [];
    $calibrationValue = 0;
    foreach($chars as $char) {
        if(\is_numeric($char)) {
            $numerics[] = $char;
        }
    }
    $calibrationValue = $numerics[0].$numerics[\count($numerics) - 1];
    \assert(\is_numeric($calibrationValue));
    $total += (int) $calibrationValue;
}

echo 'Total is '. $total;