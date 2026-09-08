<?php

$playlist = [
    "nom"=> " my personnal best of",
    "genre"=> "rock",
    "createur"=> " john doe",
    "date"=> " 28-08-2022",
    "nbpistes"=> 56,
    "duree"=>  10080 ,
];


function display(array $playlist) : void {
    $str = "\$playlist : ";

    foreach ($playlist as $key => $value) {
        
        
        switch ($key) {
            case "nom":
                $str .= $value;
                break;
            case "genre":
                $str .= "($value)";
                break;
            case "createur":
                $str .= " par $value";
                break;
            case "date":
                $str .= " le $value ";
                break;
            case "nbpistes":
                $str .= " $value";
                break;
            
            
            case "duree":
                $str .= " pour une durée total de $value s";
            
            
            default:
                
                break;
        }

        
    }


    print $str;
    
}


display($playlist);