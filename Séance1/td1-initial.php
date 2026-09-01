<?php
print "<!DOCTYPE html>";
print ' <html lang="en"> ';

print '<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Morpion</title> </head>';

print "<body>";
echo "<strong> Allo le monde ?\n </strong> " ;
print " <h1>a l'eau, limande ?\n</h1>";

$uneVariable = "menthe\n";

print "<h2>" . $uneVariable . "Halo  \n </h2>" ;

print "<h3>céfini \n </h3>";

print "</body>";
print "</html>";


$v1 = 42;
$v2 = 73;

print gettype( $v1 ) . " " . gettype( $v2 ) ;

$somme = $v1+$v2;
$diff = $v2-$v1;

print "$somme" . "</br>";

print "$diff";

$v1 = "442";
print gettype( $v1 );
$somme = $v1+$v2;
print "$somme \n </br>";

$v3 = 1337;
$v4 = 01337;
$v5 = 0x1337;
$v6 = 3.141559;
$v7 = "yopyop";
$v8 = 'yepyep';
$v9 = True;
$v10 = False;


print 'la variable $v3 est du type ' . gettype( $v3 ) . " est à pour valeur : $v3 \n </br>";
print 'la variable $v4 est du type ' . gettype( $v4 ) . " est à pour valeur : $v4 \n </br>";
print 'la variable $v5 est du type ' . gettype( $v5 ) . " est à pour valeur : $v5 \n </br>";
print 'la variable $v6 est du type ' . gettype( $v6 ) . " est à pour valeur : $v6 \n </br>";
print 'la variable $v7 est du type ' . gettype( $v7 ) . " est à pour valeur : $v7 \n </br>";
print 'la variable $v8 est du type ' . gettype( $v8 ) . " est à pour valeur : $v8 \n </br>";
print 'la variable $v9 est du type ' . gettype( $v9 ) . " est à pour valeur : $v9 \n </br>";
print 'la variable $v10 est du type ' . gettype( $v10 ) . " est à pour valeur : $v10 \n </br>";

print "variable v1 : $v1 \n </br>" ;
print 'variable v2 : $v2 \n </br>';

$v1 = 42;

print "la variable \$v1 vaut $v1 \n </br>";
print "la variable \"\$v2\" vaut $v2 \n </br>";


