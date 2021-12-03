<?php

//Chargement de la configuration
require_once(__DIR__ . '/Config/config.php');

//Chargement de l'Autoloader pour charger automatiquement les classes
require_once(__DIR__ . '/Config/Autoload.php');
Autoload::charger();

//Démarrage de la session
session_start();


//Création du controleur
$Controller = new FrontController();

