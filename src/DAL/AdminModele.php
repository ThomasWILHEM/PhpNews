<?php

class AdminModele
{
    public function connection(string $login, string $password,array &$dVueErreur){
        global $base,$user,$mdp;
        $login=Validation::isValidString($login);
        $password=Validation::isValidString($password);
        $ga=new AdminGateway(new Connection($base,$user,$mdp));
        if($ga->verifAdmin($login,$password)){
            $_SESSION['role']='admin';
            $_SESSION['login']=$login;
        }else{
            $dVueErreur[]="Le mot de passe/login n'est pas bon";
        }

    }

    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public function isAdmin(){
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login=Validation::isValidString($_SESSION['login']);
            $role=Validation::isValidString($_SESSION['role']);
            return new Admin($login,$role);
        }
        else
            return null;
    }
}