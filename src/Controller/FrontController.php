<?php

class FrontController
{
    public function __construct()
    {
        global $rep,$vues;
        $dVueErreur=array();

        $actions_admin=array('admin','ajouterSite','supprimerSite','deconnexion');
        try {
            //verifie isAdmin avec le modèle admin
            $admin=null;

            $action=$_REQUEST['action'];
            if(in_array($action,$actions_admin)){
                if($admin==null)
                    require ($rep.$vues['login']);
                else
                    new AdminController();
            }
            else
                new UserController();
        } catch (PDOException $PDOException) {
            $dVueErreur[] = "Erreur innatendu (PDO)";
        } catch (Exception $exception) {
            $dVueErreur[] = "Erreur innatendu";
        }

        if(!empty($dVueErreur))
            require ($rep.$vues['erreur']);

        exit(0);
    }
}