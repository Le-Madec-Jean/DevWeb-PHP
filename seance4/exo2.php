<?php

require_once("AlbumTrack.php");
require_once("AlbumTrackRender.php");

$album = new AlbumTrack("titre", "audio/01-Im_with_you_BB-King-Lucille.mp3", "album", 1);
$album2 = new AlbumTrack("titre1", "album2", "path2", 2);

//echo $album->title . " " . $album->album . " " . $album->nom_fichier . " " . $album->numero_pistes . "\n";
//print_r($album->__tostring());
//echo $album2->__tostring();
//var_dump($album2->__tostring());

$trackRender = new AlbumTrackRender($album);

print $trackRender->render(1);