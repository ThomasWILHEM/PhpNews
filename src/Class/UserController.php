<?php

class UserController
{
    function __construct()
    {
        global $rep,$vues,$base,$user,$mdp;
        session_start();
        $dVueErreur = array();



        try{
            $action=$_REQUEST['action'];
            switch($action) {
                case NULL:
                    $this->chargeParPage($dVueErreur,$base,$user,$mdp);
                    break;
                case 'click':
                    $this->click($dVueErreur);
                    break;
                default:
                    $dVueErreur[] =	"Action demandée inconnu";
            }
        } catch (PDOException $e) {
            $dVueErreur[] =	"Erreur lors de la connexion à la base de données";
        }
        catch (Exception $e2) {
            $dVueErreur[] =	"Erreur inattendue!!!";
        }
        if(!empty($dVueEreur)){
            require ($rep.$vues['erreur']);
        }
        exit(0);
    }


    private function click(array &$dVueErreur){
        $redirectWebsite=$_REQUEST['redirectWebsite'];
        if(Validation::isValidURL($redirectWebsite,$dVueErreur))
            header('Location: '.$redirectWebsite);
        $dVueErreur[]="L'URL de redirection n'est pas valide";
    }

    private function chargeParPage(array &$dVueErreur, string $dsn,string $user, string $mdp){
        global $rep,$vues;
        $nbPage=0;
        $model=new Modele();
        $page=isset($_REQUEST['page'])? $_REQUEST['page'] : 1;
        $nbNewsParPage=5; //A set plus tard dans la base
        $tabNews=$model->chargeNewsParPageM($page,$nbNewsParPage,$nbPage);
        require($rep.$vues['principale']);
    }
}