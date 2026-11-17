<?php

function plusGrand( ?int $x , ?int $y) : int {
    return ($x>$y) ? $x : $y;
}

print plusGrand(1,2) . "\n";
print plusGrand(454,2);