<?php

require_once 'vendor\autoload.php';

//require_once 'iutnc/deefy/loader/Psr4ClassLoader.php';
//$loader = new \Seance7\Iutnc\Deefy\Loader\Psr4ClassLoader("Iutnc\\Deefy\\", "iutnc/deefy");
//$loader->register(); 
$album = new \Iutnc\Deefy\Audio\track\AlbumTrack("titre", "audio/01-Im_with_you_BB-King-Lucille.mp3", "album", 1);
$podcast = new \Iutnc\Deefy\Audio\track\PodcastTrack("20/09/2026", "titre", "path");

//echo $album->title . " " . $album->album . " " . $album->nom_fichier . " " . $album->numero_pistes . "\n";
//print_r($album->__tostring());
//echo $podcast->__tostring();
//var_dump($album2->__tostring());

// affichage att

//print $album->nom_fichier;
//print $podcast->nom_fichier;

//$album->artiste = "moi";

//print $album->artiste;

//$trackRender = new AlbumTrackRender($album);
//$podcastRender = new PodcastRender($podcast);

//print $podcastRender->render(1);
//print $trackRender->render(1);

try {
    //$album->dure = 160;
    $album->duree = -999;

} catch (\Iutnc\Deefy\Exception\InvalidPropertyNameException $th) {
    print $th->getMessage();
    //print "$th->getTrace()";
} catch (\Iutnc\Deefy\Exception\InvalidPropertyValueException $e) {
    print $e->getMessage();
    //print "$th->getTrace()";
}