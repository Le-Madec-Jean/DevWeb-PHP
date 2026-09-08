<?php

$playlist = [
    "nom"=> " my personnal best of",
    "genre"=> "rock",
    "createur"=> " john doe",
    "date"=> " 28-08-2022",
    "nbpistes"=> 56,
    "duree"=>  10080 ,
];

$piste = [
    "titre" => "Blinding Lights",
    "artiste" => "The Weeknd",
    "album" => "After Hours",
    "annee" => "2020",
    "genre" => "Synth-pop",
    "numero" => "1",
    "duree" => 160,
];

$piste2 = [
    "titre" => "Shape of You",
    "artiste" => "Ed Sheeran",
    "album" => "÷ (Divide)",
    "annee" => "2017",
    "genre" => "Pop",
    "numero" => "2",
    "duree" => 500,
];

$piste3 = [
    "titre" => "Get Lucky",
    "artiste" => "Daft Punk",
    "album" => "Random Access Memories",
    "annee" => "2013",
    "genre" => "Disco",
    "numero" => "3",
    "duree" => 200,
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


//display($playlist);


function display_track(array $piste_par, string $affichage = "court") : void {
    
    switch ($affichage) {
    case 'complet':
            print "{$piste_par['numero']} - {$piste_par['titre']} - {$piste_par['artiste']} - {$piste_par['album']} - {$piste_par['duree']} - {$piste_par['annee']} - {$piste_par['genre']}";
            break;
        case 'etendu':
            print "{$piste_par['numero']} - {$piste_par['titre']} - {$piste_par['artiste']} - {$piste_par['album']} - {$piste_par['duree']}";
            break;
        default:
            print "{$piste_par['numero']} - {$piste_par['titre']} - {$piste_par['artiste']}";
            break;
    }
        
    
}

//display_track($piste);

function play_track(array $piste_par) : void {
    print $piste_par['titre'] . "\n";
    
    for ($i=1; $i < $piste_par['duree']; $i++) { 
        print "$i.";
    }

}

play_track($piste);



