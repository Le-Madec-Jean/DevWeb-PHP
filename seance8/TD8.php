<?php

/*
 * Si la désactivation de la temporisation de sortie ne fonctionne pas avec le .htaccess 
 * fourni, il est possible de forcer l'envoi les données du tampon de sortie et d'éteindre 
 * la temporisation de sortie avec la fonction ob_end_flush() au début du script.
 */


$methode = $_SERVER["REQUEST_METHOD"];
$protocole = $_SERVER["SERVER_PROTOCOL"];
$ressource = $_SERVER["PHP_SELF"];


echo '<pre>'; 

echo '<p> ' . $methode . " " . $ressource ." ". $protocole .' </p>';

var_dump($_SERVER);
