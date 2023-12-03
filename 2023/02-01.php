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

$redCubes = 12;
$greenCubes = 13;
$blueCubes = 14;
$possibleGames = \array_filter(
    $games,
    function(array $sets) use($blueCubes, $redCubes, $greenCubes) {
        foreach($sets as $set) {
            foreach($set as $ball) {
                [$ballCount, $ballColor] = \sscanf($ball, '%d %s');
                \assert(\is_numeric($ballCount));
                $passing = match($ballColor) {
                    'red' => $ballCount <= $redCubes,
                    'blue' => $ballCount <= $blueCubes,
                    'green' => $ballCount <= $greenCubes
                };
                if(!$passing) {
                    return false;
                }
            }
        }
        return true;
    }
);

$answer = \array_sum(\array_keys($possibleGames));
echo "\nThe answer is :$answer";