<?php
function plusGrand( ?int $x , ?int $y) : int {
    return ($x>$y) ? $x : $y;
}

function exo2 (int $max, int $div= 2) : void {

    
    for ($i= $max; $i > 0 ; $i--) { 
        if ($i%$div === 0) {
            print $i . " divisible par $div \n";
        }


    }
}

function puissance(int $x, int $n): int
{

    $total = 1;
    while ($n > 0) {
        $total *= $x;
        $n--;
    }
    ;

    return $total;
}

function exo4(int $x, int $y, int $z) : int | string   {
    $total = 0;
    switch ($x) {
        case 1:
            $total = plusGrand($y, $z);
            break;
        case 2:
            exo2($y, $z);
            break;
        
        case 3:
            $total = puissance($y, $z);
            break;
        default:
            $total = "aucune fonction associé";
            break;
    }

    return $total;
}

print exo4(2,50,4) ."\n";
print exo4(1,50,4) ."\n";
print exo4(3,50,4) ."\n";
print exo4(4,50,4) ."\n";