<?php

class AdminController
{

    /**
     * Constructeur du controleur administrateur.
     * Le constructeur agit en fonction de l'action demandé par l'administrateur.
     */
    public function __construct()
    {
        global $rep, $vues;
        $dVueErreur = array();

        $adminMdl = new AdminModele();
        $admin = $adminMdl->isAdmin($dVueErreur);
        if ($admin == null) {
            throw new Exception("Appel au controleur sans être admin");
        }

        try {
            $action = $_REQUEST['action'];

            switch ($action) {
                case 'admin':
                    $this->chargePageAdmin();
                    break;
                case 'ajouterSite':
                    $this->ajouterSite($dVueErreur);
                    break;
                case 'supprimerSite':
                    $this->supprimerSite($dVueErreur);
                    break;
                case 'modifierNbNews':
                    $this->modifierNbNews($dVueErreur);
                    break;
                case 'deconnexion':
                    $this->deconnexion();
                    break;
                default:
                    $dVueErreur[] = "Erreur - Action inconnue";
            }
        } catch (PDOException $PDOException) {
            $dVueErreur[] = "Erreur innatendu (PDO)";
        } catch (Exception $exception) {
            $dVueErreur[] = "Erreur innatendu";
        }
        if (!empty($dVueErreur))
            require($rep . $vues['erreur']);

        exit(0);
    }

    /**
     * Charge la page administrateur.
     */
    private function chargePageAdmin()
    {
        global $rep, $vues;
        $model = new AdminModele();
        $nbNewsParPage = $model->getNbNewsParPage();
        $tabSites = $model->chargerPageAdminM();
        require($rep . $vues['admin']);
    }

    /**
     * Ajoute un site si les informations sont valides.
     * Si le même flux RSS est ajouté deux fois alors une erreur est fixé dans dVueErreur.
     * @param array $dVueErreur Tableau des erreurs
     */
    private function ajouterSite(array &$dVueErreur)
    {
        $nomSite = $_REQUEST['nomsite'];
        $lienSite = $_REQUEST['liensite'];
        $logoSite = $_REQUEST['logosite'];
        $fluxRSS = $_REQUEST['fluxrss'];

        if (isset($nomSite) && isset($lienSite) && isset($logoSite) && isset($fluxRSS)) {
            if (Validation::isValidSite($nomSite, $lienSite, $logoSite, $fluxRSS, $dVueErreur)) {
                $model = new AdminModele();
                $model->ajouterSiteM($dVueErreur, $nomSite, $lienSite, $logoSite, $fluxRSS);
                if (empty($dVueErreur)) {
                    $_REQUEST['action'] = 'admin';
                    new FrontController();
                }
            } else
                $dVueErreur[] = "Erreur validation du site";
        } else
            $dVueErreur[] = "Tentative d'ajout d'un site sans les informations requises";
    }

    /**
     * Supprime le site qui est récupéré avec $_GET.
     * @param array $dVueErreur Tableau des erreurs
     */
    private function supprimerSite(array &$dVueErreur)
    {
        $idWebsite = $_REQUEST['idWebsite'];
        if (isset($idWebsite)) {
            if (Validation::isValidURL($idWebsite, $dVueErreur)) {
                $model = new AdminModele();
                $model->supprimerSiteM($dVueErreur, $idWebsite);
                if (empty($dVueErreur)) {
                    $_REQUEST['action'] = 'admin';
                    new FrontController();
                }
            } else
                $dVueErreur[] = "Erreur de validation";
        } else
            $dVueErreur[] = "Tentative de suppression d'un site sans les informations requises";
    }

    private function deconnexion()
    {
        $adminMdl = new AdminModele();
        $adminMdl->deconnexion();
        unset($_REQUEST['action']);
        new FrontController();
    }

    private function modifierNbNews(array &$dVueErreur)
    {
        $nb = $_REQUEST['newsnumber'];
        if (!Validation::isValidInt($nb, $dVueErreur)) {
            $dVueErreur[] = "Erreur de validation de l'entier";
            return;
        }
        if ($nb < 1) {
            $dVueErreur[] = "Le nombre de news par page doit être supérieur à 0";
            return;
        }
        $adminml = new AdminModele();
        $adminml->modifierNbNewsM($nb, $dVueErreur);
        if (empty($dVueErreur)) {
            $_REQUEST['action'] = 'admin';
            new FrontController();
        }
    }
}