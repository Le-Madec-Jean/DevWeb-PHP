<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../seance7/vendor/autoload.php");
session_start();



if (!(isset( $_SESSION["playlist"] ))) {
    $_SESSION["playlist"] = new \Iutnc\Deefy\Audio\Lists\Playlists("test");
    
}
    
   
//session_destroy();




