<?php

session_start();




if (isset($_SESSION['u1-s']) && isset($_SESSION['u1-s'])) {
    $_SESSION['u3-s'] = $_SESSION['u1-s'] + $_SESSION['u2-s'];
    $_SESSION['u1-s'] = $_SESSION['u2-s'];
    $_SESSION['u2-s'] = $_SESSION['u3-s'];

    
     $_SESSION['temp'][] = $_SESSION['u3-s'] ;
   
    

} else {

    if (isset($_GET['u1'])) {

        $_SESSION['u1-s'] = $_GET['u1'];
    } else {

        $_SESSION['u1-s'] = 0;
    }
    ;

    if (isset($_GET['u2'])) {

        $_SESSION['u2-s'] = $_GET['u2'];
    } else {

        $_SESSION['u2-s'] = 1;
    }
    ;
    
    $_SESSION['temp'] = []; 
}


print "<p>" . $_SESSION['u1-s'] . " visites</p>";
print "<p>" . $_SESSION['u2-s'] . " visites</p>";


session_destroy();