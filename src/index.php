<?php
//ini_set('display_errors','Off');

//Chargement de la configuration
require_once(__DIR__ . '/Config/config.php');

//Chargement de l'Autoloader pour charger automatiquement les classes
require_once(__DIR__ . '/Config/Autoload.php');
Autoload::charger();

//Démarrage de la session
session_start();

//Récupère la page précédente pour la redirection en cas d'erreur
if(isset($_SERVER['HTTP_REFERER']))
    $_SESSION['previous']=$_SERVER['HTTP_REFERER'];

//Création du controleur
$Controller = new FrontController();

