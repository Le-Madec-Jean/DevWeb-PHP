<?php
session_start();

if (isset($_SESSION['sess_counter'])) {
    $comp = $_SERVER["QUERY_STRING"];
    echo " <p> ". $comp[-1] . "</p>";
    $_SESSION['sess_counter'] +=  $comp[-1];
} else {
    $comp = $_SERVER["QUERY_STRING"];
    $_SESSION['sess_counter'] = $comp[-1];
};


var_dump($_SERVER);

echo "<p>" . $_SESSION['sess_counter'] . " visites</p>";


//session_destroy();

