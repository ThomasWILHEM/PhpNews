<?php
    include("Class/Validation.php");

    $login=$_POST['username'];
    $mdp=$_POST['password'];

    if(!Validation::isValidLogin($login,$mdp)){
        echo "Mettre ici la vue d'erreur </br>";
    }else{
        if($login=='root' && $mdp=='mdp')
            header('Location: index.php?action=pageAdmin');
        else
            echo("Mot de passe ou login incorrects </br>");
    }
