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
                    $this->chargePageAdmin();
                    break;
                case 'ajouterSite':
                    $this->ajouterSite($dVueErreur);
                    break;
                case 'supprimerSite':
                    $this->supprimerSite($dVueErreur);
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

    private function chargePageAdmin(){
        global $rep,$vues;
        $model=new Modele();
        $tabSites=$model->chargerPageAdminM();
        require ($rep.$vues['admin']);
    }

    private function ajouterSite(array &$dVueErreur){
        $nomSite=$_REQUEST['nomsite'];
        $lienSite=$_REQUEST['liensite'];
        $logoSite=$_REQUEST['logosite'];
        $fluxRSS=$_REQUEST['fluxrss'];

        if(Validation::isValidSite($nomSite,$lienSite,$logoSite,$fluxRSS,$dVueErreur))
        {
            $model=new Modele();
            $model->ajouterSiteM($dVueErreur,$nomSite,$lienSite,$logoSite,$fluxRSS);
            if(empty($dVueErreur))
                header("Location: indexAdmin.php?action=pageAdmin");

        }
        else{
            $dVueErreur[]="Erreur validation du site";
        }
    }

    private function supprimerSite(array &$dVueErreur) {
        $idWebsite=$_REQUEST['idWebsite'];
        if(Validation::isValidString($idWebsite,$dVueErreur)){
            $model=new Modele();
            $model->supprimerSiteM($dVueErreur,$idWebsite);
            if(empty($dVueErreur))
                header("Location: indexAdmin.php?action=pageAdmin");
        }
        else{
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