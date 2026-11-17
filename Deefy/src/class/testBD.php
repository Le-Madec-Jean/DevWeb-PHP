<?php

require_once  __DIR__ . '/../../vendor/autoload.php';

\Iutnc\Deefy\repository\DeefyRepository::setConfig(__DIR__ . '/config/db.config.ini');

$repo = \Iutnc\Deefy\repository\DeefyRepository::getInstance();

$playlists = $repo->findAllPlaylists();
foreach ($playlists as $pl) {
    print "playlist  : " . $pl->nom . ":". $pl->id . "\n";
}


$pl = new \Iutnc\Deefy\Audio\Lists\Playlists('test');
$pl = $repo->saveEmptyPlaylist($pl);
print "playlist  : " . $pl->nom . ":". $pl->id . "\n";

// 1. Instanciation correcte selon ton PodcastTrack.php actuel
$track = new \Iutnc\Deefy\Audio\Track\PodcastTrack('2021-01-01', 'Mon Podcast', 'test.mp3');
$track->artiste = 'auteur';
$track->genre = 'genre';
$track->duree = 10;

// 2. Utilisation de la méthode savePiste du dépôt (et non savePodcastTrack)
$track = $repo->savePiste($track);

print "track 2 : " . $track->title . ":" . get_class($track) . "\n";

// 3. Pour l'ajout à la playlist, utilise ta méthode savePlayliste définie dans le repository
$repo->savePlayliste($pl, $track);


