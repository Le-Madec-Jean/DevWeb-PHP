<?php

use Iutnc\Deefy\Render\Renderer;

require_once("../seance7/vendor/autoload.php");

$albumtrack = new \Iutnc\Deefy\Audio\track\AlbumTrack("test", "path", "OG", 99);

$stock = serialize($albumtrack);

setcookie("track", $stock, time() + 60*2);

print var_dump($_COOKIE["track"]);

$affiche = new \Iutnc\Deefy\Render\AlbumTrackRender(unserialize($_COOKIE["track"]));

print $affiche->render(Renderer::LONG);

