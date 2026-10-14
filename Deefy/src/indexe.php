<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once  __DIR__ . '/../vendor/autoload.php';

session_start();

$dispatcher = new \Iutnc\Deefy\dispatch\Dispatcher();

$dispatcher
    ->addRoute('default', \Iutnc\Deefy\action\DefaultAction::class)
    ->addRoute('playlist', \Iutnc\Deefy\action\DisplayPlaylistAction::class)
    ->addRoute('add-playlist', \Iutnc\Deefy\action\AddPlaylistAction::class)
    ->addRoute('add-track', \Iutnc\Deefy\action\AddPodcastTrackAction::class);

$dispatcher->run();