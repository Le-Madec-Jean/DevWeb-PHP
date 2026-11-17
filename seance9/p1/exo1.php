<?php


if (isset($_COOKIE["chocolat1"])) {
    var_dump($_COOKIE["chocolat1"]);
    print "<p> existe </p>";
} else {
    setcookie("chocolat1", "buiscuit1", time() + 60, "/DevWeb-PHP/seance9/storageCookie");
    print "<p> creation cookie </p>";
};


