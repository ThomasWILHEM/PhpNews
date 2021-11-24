<?php

class UserController
{
    function __construct()
    {
        global $rep,$vues;
        session_start();
        $dVueEreur = array();

        $dsn="mysql:host=localhost;dbname=dbphpnews";
        $user="admin";
        $mdp="mdp";

        try{
            $action=$_REQUEST['action'];
            switch($action) {
                case NULL:
                    $this->showNews($dsn,$user,$mdp);
                    break;
                case 'click':
                    $this->click($dVueEreur);
                    break;
                default:
                    $dVueEreur[] =	"Action demandée inconnu";
            }
        } catch (PDOException $e) {
            $dVueEreur[] =	"Erreur lors de la connexion à la base de données";
        }
        catch (Exception $e2) {
            $dVueEreur[] =	"Erreur inattendue!!!";
        }
        if(!empty($dVueEreur)){
            require ($vues['erreur']);
        }
        exit(0);
    }

    private function showNews(string $dsn,string $user, string $mdp){
        $ng = new NewsGateway(new Connection($dsn,$user,$mdp));
        $tabNews=$ng->findAllNews();
        require("pagePrincipale.php");
    }

    private function click(array &$dVueErreur){
        $redirectWebsite=$_REQUEST['redirectWebsite'];
        if(Validation::isValidURL($redirectWebsite,$dVueErreur))
            header('Location: '.$redirectWebsite);
        $dVueErreur[]="L'URL de redirection n'est pas valide";
    }
}