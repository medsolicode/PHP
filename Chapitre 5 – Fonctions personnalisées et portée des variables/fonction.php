<?php
function saluer() {
    echo "Bonjour tout le monde ! <br>";
}
saluer();

function addition($a, $b) {
    return $a + $b;
}
echo "Somme : " . addition(5, 10)."<br>";

function bienvenue($nom = "visiteur") {
    echo "Bienvenue " . $nom."<br>"  ;
}
bienvenue(); // Affiche "Bienvenue visiteur"

$compteur = 0;

function incrementer() {
    static $compteur = 0;
    $compteur++;
    echo $compteur ."<br>";
}
incrementer(); // Affiche 1
incrementer(); // Affiche 2
