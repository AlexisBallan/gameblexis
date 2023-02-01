<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $usager = 'facture';
    $motdepasse = 'q8fWa@g+R-X79tY%X88$';
    $hote = 'localhost';
    $base = 'facture';
    //$charset = 'utf8mb4'; // $charset = 'utf8';

    $dsn = "mysql:host=$hote;dbname=$base;";
    $basededonnees = new PDO($dsn, $usager, $motdepasse);