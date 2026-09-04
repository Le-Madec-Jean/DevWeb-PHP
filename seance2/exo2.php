<?php

function exo2 (int $max, int $div= 2) : void {

    
    for ($i= $max; $i > 0 ; $i--) { 
        if ($i%$div === 0) {
            print $i . " divisible par $div \n";
        }


    }
}


exo2 (20,2);