<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../seance7/vendor/autoload.php");
session_start();





if ((isset( $_SESSION["playlist"] ))) {

    $piste = $_SESSION["playlist"]->liste_pistes[0];
    $podcastRender = new \Iutnc\Deefy\Render\PodcastRender($piste);

   
    print $podcastRender->render(1);
    
} 
