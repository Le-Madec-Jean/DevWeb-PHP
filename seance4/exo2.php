<?php

require_once("AlbumTrack.php");

$album = new AlbumTrack("titre", "album", "path", 1);
$album2 = new AlbumTrack("titre1", "album2", "path2", 2);

echo $album->title . " " . $album->album . " " . $album->nom_fichier . " " . $album->numero_pistes . "\n";
//print_r($album->__tostring());

var_dump($album2->__tostring());