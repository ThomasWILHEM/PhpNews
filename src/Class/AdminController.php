<?php

class AdminController
{

    public function __construct()
    {
        global $rep,$vues,$base,$user,$mdp;
        session_start();
        $dVueErreur=array();

        try {
            $action=$_REQUEST['action'];
            $con=new Connection($base,$user,$mdp);

            switch ($action){
                case null:
                    $this->chargePageLogin();
                    break;
                case 'verifLogin':
                    $this->verifLogin($dVueErreur);
                    break;
                case 'pageAdmin':
                    $this->chargePageAdmin($con);
                    break;
                case 'ajouterSite':
                    $this->ajouterSite($dVueErreur,$con);
                    break;
                case 'supprimerSite':
                    $this->supprimerSite($dVueErreur,$con);
                    break;
                default:
                    $dVueErreur[]="Erreur - Action inconnue";
            }
        }catch (PDOException $PDOException){
            $dVueErreur[]="Erreur innatendu (PDO)";
        }catch (Exception $exception){
            $dVueErreur[]="Erreur innatendu";
        }
        if(!empty($dVueErreur))
            require($rep.$vues['erreur']);
    }


    private function chargePageLogin(){
        global $rep,$vues;
        require ($rep.$vues['login']);
    }

    private function chargePageAdmin(Connection $con){
        global $rep,$vues;
        $sg=new SiteGateway($con);
        $tabSites=$sg->findAllSite();
        require ($rep.$vues['admin']);
    }

    private function ajouterSite(array &$dVueErreur, Connection $con){
        $nomSite=$_REQUEST['nomsite'];
        $lienSite=$_REQUEST['liensite'];
        $logoSite=$_REQUEST['logosite'];
        $fluxRSS=$_REQUEST['fluxrss'];

        if(Validation::isValidSite($nomSite,$lienSite,$logoSite,$fluxRSS,$dVueErreur))
        {
            $sg=new SiteGateway($con);
            if($sg->canInsert($fluxRSS)){
                $sg->insert(new Site($nomSite,$lienSite,$logoSite,$fluxRSS));
                header("Location: indexAdmin.php?action=pageAdmin");
            }
            else
                $dVueErreur[]="Impossible d'inserer ".$fluxRSS;
        }
        else{
            $dVueErreur[]="Erreur validation du site";
        }
    }

    private function supprimerSite(array &$dVueErreur, Connection $con) {
        $nomSite=$_REQUEST['searchfordelete'];
        if(Validation::isValidString($nomSite,$dVueErreur)){
            $sg=new SiteGateway($con);
            if($sg->exists($nomSite)) {
                $sg->delete($nomSite);
                header("Location: indexAdmin.php?action=pageAdmin");
            }
            else {
                $dVueErreur[] = "Impossible de supprimer " . $nomSite;
            }
        }else {
            $dVueErreur[] = "Erreur de validation";
        }

    }

    private function verifLogin(array &$dVueErreur){
        $login=$_POST['username'];
        $mdp=$_POST['password'];
        if(!Validation::isValidLogin($login,$mdp)){
            $dVueErreur[] ="Les informations ne sont pas valides";
        }else{
            if($login=='root' && $mdp=='mdp')
                header('Location: indexAdmin.php?action=pageAdmin');
            else
                $dVueErreur[] ="Mot de passe ou login incorrects";
        }
    }

}