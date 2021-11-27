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
                /*case NULL:
                    $this->showNews($base,$user,$mdp);
                    break;*/
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

    private function showNews(string $dsn,string $user, string $mdp){
        global $rep,$vues;
        $ng = new NewsGateway(new Connection($dsn,$user,$mdp));
        $tabNews=$ng->findAllNews();
        require($rep."Vues/pagePrincipale.php");
    }

    private function click(array &$dVueErreur){
        $redirectWebsite=$_REQUEST['redirectWebsite'];
        if(Validation::isValidURL($redirectWebsite,$dVueErreur))
            header('Location: '.$redirectWebsite);
        $dVueErreur[]="L'URL de redirection n'est pas valide";
    }

    private function chargeParPage(array &$dVueErreur, string $dsn,string $user, string $mdp){
        global $rep,$vues;
        $tabNews=[[]];
        $con = new Connection($dsn,$user,$mdp);
        $ng=new NewsGateway($con);
        $page=isset($_REQUEST['page'])? $_REQUEST['page'] : 1;
        $nbNewsParPage=3; //A set plus tard dans la base
        $nbNewsTotal=$ng->getNbNews();
        $nbPage=ceil($nbNewsTotal/$nbNewsParPage);
        if(empty($page) && $page != 0){
            $dVueErreur[]="Problème avec l'indice de la page";
            require ($rep.$vues['erreur']);
        }
        if($page <= 0)
            $page=1;
        if($page >$nbPage)
            $page=$nbPage;
        $tabNews[0]=$ng->findNews($page,$nbNewsParPage);
        $sg=new SiteGateway($con);
        for($i=0;$i<count($tabNews[0]);$i++)
            $tabNews[1][$i]=$sg->findSite($tabNews[0][$i]->getIdSite());
        require($rep."Vues/pagePrincipale.php");
    }
}