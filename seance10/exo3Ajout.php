<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
use \Iutnc\Deefy\Audio\Track\PodcastTrack;
require_once("../seance7/vendor/autoload.php");
session_start();





if ((isset( $_SESSION["playlist"] ))) {

    
    $piste = new PodcastTrack("13-05-2007","titre", "path");
    $piste->duree = 120;
    $_SESSION["playlist"]->add_piste($piste);
} else {

    
    $_SESSION["playlist"] = new \Iutnc\Deefy\Audio\Lists\Playlists("test");
    $piste = new PodcastTrack("13-05-2007","titre", "path");
    $_SESSION["playlist"]->add_piste($piste);
}
    