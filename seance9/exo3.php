<?php


if (isset($_COOKIE["compt"])) {

    var_dump($_COOKIE["compt"]);
     setcookie("compt",$_COOKIE["compt"] + 1, time() + 60*5);
    print "<p> existe </p>";
} else {
    setcookie("compt", 1, time() + 60*5);
    print "<p> creation cookie </p>";
};