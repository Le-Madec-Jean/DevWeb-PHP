<?php
require_once("AudioTrack.php");

require_once("AlbumTrack.php");
require_once("AlbumTrackRender.php");
require_once("PodcastTrack.php");

$album = new AlbumTrack("titre", "audio/01-Im_with_you_BB-King-Lucille.mp3", "album", 1);
$podcast = new PodcastTrack("20/09/2026", "titre", "path");

//echo $album->title . " " . $album->album . " " . $album->nom_fichier . " " . $album->numero_pistes . "\n";
//print_r($album->__tostring());
echo $podcast->__tostring();
//var_dump($album2->__tostring());

$trackRender = new AlbumTrackRender($album);

print $trackRender->render(1);