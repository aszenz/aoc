<?php

declare(strict_types=1);

$input = \file_get_contents('./02.txt');
$lines = \explode("\n", $input);

$games = [];
foreach($lines as $line) {
    [$gameId, $sets] = \sscanf($line, 'Game %d: %[^$]s');
    $sets = \explode(';', $sets);
    $sets = \array_map(fn(string $set) => \explode(', ', $set), $sets);
    $games[$gameId] = $sets;
}

$gamesPowerSets = \array_map(
    function(array $sets) {
        $maxRed = 0;
        $maxBlue = 0;
        $maxGreen = 0;
        foreach($sets as $set) {
            foreach($set as $ball) {
                [$ballCount, $ballColor] = \sscanf($ball, '%d %s');
                \assert(\is_numeric($ballCount));
                switch($ballColor) {
                    case 'red':
                        if($ballCount > $maxRed) {
                            $maxRed = $ballCount;
                        }
                        break;
                    case 'blue':
                        if($ballCount > $maxBlue) {
                            $maxBlue = $ballCount;
                        }
                        break;
                    case 'green': 
                        if($ballCount > $maxGreen) {
                            $maxGreen = $ballCount;
                        }
                        break;
                };
            }
        }
        return $maxRed * $maxGreen * $maxBlue;
    },
    $games
);

$answer = \array_sum(\array_values($gamesPowerSets));
echo "\nThe answer is :$answer";