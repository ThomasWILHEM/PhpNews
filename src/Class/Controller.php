<?php

class Controller
{

    public function __construct()
    {
        session_start();

        $dVueErreur=array();
        $dsn='mysql:host=localhost;dbname=dbphpnews';
        $user="admin";
        $mdp="mdp";

        try {
            $action=$_REQUEST['action'];
            $con=new Connection($dsn,$user,$mdp);

            switch ($action){
                case null:
                    $ng=new NewsGateway($con);
                    $tabNews=$ng->findAllNews();
                    require ("pagePrincipale.php");
                    break;
                case 'loginAdmin':
                    require ("login.php");
                    break;
                case 'pageAdmin':
                    $sg=new SiteGateway($con);
                    $tabSites=$sg->findAllSite();
                    require ("admin.php");
                    break;
                case 'ajouterSite':
                    $nomSite=$_REQUEST['nomsite'];
                    $lienSite=$_REQUEST['liensite'];
                    $logoSite=$_REQUEST['logosite'];
                    $fluxRSS=$_REQUEST['fluxrss'];

                    if(Validation::isValidSite($nomSite,$lienSite,$logoSite,$fluxRSS,$dVueErreur))
                    {
                        $sg=new SiteGateway($con);
                        if($sg->canInsert($fluxRSS))
                            $sg->insert(new Site($nomSite,$lienSite,$logoSite,$fluxRSS));
                        else
                            $dVueErreur[]="Impossible d'inserer ".$fluxRSS;
                        header("Location: index.php?action=pageAdmin");
                    }
                    else{
                        $dVueErreur[]="Erreur validation";
                        echo "Erreur validation";
                    }
                    break;
                default:

            }
        }catch (PDOException $PDOException){
            $dVueErreur[]="Erreur innatendu (PDO)";
        }catch (Exception $exception){
            $dVueErreur[]="Erreur innatendu";
        }
    }
}