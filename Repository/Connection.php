<?php

// // Creation de la connexion a la base de données

try {
    $bdd = new PDO('mysql:host=localhost;dbname=devparty;charset=utf8', 'root', 'root');
//  $bdd = new PDO('mysql:host=localhost;dbname=devparty;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur lors de la connection a la base : ' . $e->getMessage());
}
