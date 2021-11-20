<?php
    include("Class/Validation.php");

    $login=$_POST['username'];
    $mdp=$_POST['password'];

    if(!Validation::isValidLogin($login,$mdp)){
        echo "Mettre ici la vue d'erreur </br>";
    }else{
        if($login=='root' && $mdp=='mdp')
            require('admin.php');
        else
            echo("Mot de passe ou login incorrects </br>");
    }

