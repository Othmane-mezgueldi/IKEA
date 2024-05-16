<?php
// https://www.php.net/manual/fr/book.pdo.php

try {
    $db = new PDO('mysql:dbname=sheinv3;host=localhost', 'root', '', [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //  FETCH_OBJ or FETCH_ASSOC or FETCH_CLASS
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\Throwable $e) {
    echo "Error Database";
    die();
}

function dd($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit;
}

// $couleurs = $db->query("SELECT DISTINCT couleur FROM produits ORDER BY couleur")->fetchAll();


// foreach ($couleurs as $key => $c) {
//     $db->query("INSERT INTO couleurs SET nom = '$c->couleur'");
// }

// $produits = $db->query("SELECT id,couleur FROM produits")->fetchAll();

// foreach ($produits as $key => $p) {
//     $produit_id = $p->id;
//     $couleur_nom = $p->couleur;

//     $couleur_id = $db->query("SELECT id FROM couleurs WHERE nom = '$couleur_nom' LIMIT 1")->fetch()->id;

//     $db->query("UPDATE produits SET couleur_id = $couleur_id WHERE id = $produit_id");
// }



// dd($produits);
