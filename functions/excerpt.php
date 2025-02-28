<?php


function ajouteUn(int $number): int {
    return $number + 1;
}

function double(int $number): int {
    return $number * 2;
}

function divide(int $a, int $b): float {
    if ($b <= 0) {
        return 0;
    }
    return $a / $b;
}