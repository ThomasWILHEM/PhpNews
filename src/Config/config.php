<?php

$rep = __DIR__ . '/../';
$logFile="log.txt";

//A changer selon la base!!!
$base = "mysql:host=localhost;dbname=dbphpnews;charset=utf8";
$user = "admin";
$mdp = "mdp";

$vues['erreur'] = "Vues/erreur.php";
$vues['principale'] = "Vues/pagePrincipale.php";
$vues['login'] = "Vues/login.php";
$vues['admin'] = "Vues/admin.php";