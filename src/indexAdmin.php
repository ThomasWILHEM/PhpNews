<?php


//Chargement de la configuration
require_once(__DIR__ . '/Config/config.php');

//Chargement de l'Autoloader pour charger automatiquement les classes
require_once(__DIR__ . '/Config/Autoload.php');
Autoload::charger();

//Création du controleur
$aController = new AdminController();

