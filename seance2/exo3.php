<?php

function puissance(int $x, int $n): float
{

    $total = 1;
    while ($n > 0) {
        $total *= $x;
        $n--;
    }
    ;

    return $total;
}

print puissance(2 , 8);