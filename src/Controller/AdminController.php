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
    }

    /**
     * Charge la page administrateur.
     */
    private function chargePageAdmin()
    {
        global $rep, $vues;
        $model = new AdminModele();
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

        if (Validation::isValidSite($nomSite, $lienSite, $logoSite, $fluxRSS, $dVueErreur)) {
            $model = new AdminModele();
            $model->ajouterSiteM($dVueErreur, $nomSite, $lienSite, $logoSite, $fluxRSS);
            if (empty($dVueErreur))
                header("Location: index.php?action=admin");
        } else
            $dVueErreur[] = "Erreur validation du site";
    }

    /**
     * Supprime le site qui est récupéré avec $_GET.
     * @param array $dVueErreur Tableau des erreurs
     */
    private function supprimerSite(array &$dVueErreur)
    {
        $idWebsite = $_REQUEST['idWebsite'];
        if (Validation::isValidURL($idWebsite, $dVueErreur)) {
            $model = new AdminModele();
            $model->supprimerSiteM($dVueErreur, $idWebsite);
            if (empty($dVueErreur))
                header("Location: index.php?action=admin");
        } else
            $dVueErreur[] = "Erreur de validation";
    }

    private function deconnexion(){
        $adminMdl = new AdminModele();
        $adminMdl->deconnexion();
        header("Location: index.php");
    }
}