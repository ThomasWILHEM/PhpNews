<?php

class UserController
{
    /**
     * Constructeur du controleur utilisateur.
     * Le constructeur agit en fonction de l'action demandé par l'utilisateur.
     */
    function __construct()
    {
        global $rep, $vues;
        $dVueErreur = array();

        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL:
                    $this->chargeParPage($dVueErreur);
                    break;
                case 'click':
                    $this->click($dVueErreur);
                    break;
                default:
                    $dVueErreur[] = "Action demandée inconnue (UserController)";
            }
        } catch (PDOException $e) {
            $dVueErreur[] = "Erreur lors de la connexion à la base de données";
        } catch (Exception $e2) {
            $dVueErreur[] = "Erreur inattendue!!!";
        }
        if (!empty($dVueErreur))
            require($rep . $vues['erreur']);
        exit(0);
    }

    /**
     * Redirige vers le lien cliqué.
     * Vérification du site récupéré en $_REQUEST
     * @param array $dVueErreur Tableau des erreurs
     */
    private function click(array &$dVueErreur)
    {
        $redirectWebsite = $_REQUEST['redirectWebsite'];
        if (Validation::isValidURL($redirectWebsite, $dVueErreur))
            header('Location: ' . $redirectWebsite);
        $dVueErreur[] = "L'URL de redirection n'est pas valide";
    }

    /**
     * Affiche la liste des news en fonction du nombre de news à afficher par page.
     * Le nombre qui permet de savoir quelle page doit être affiché est vérifié.
     * @param array $dVueErreur
     */
    private function chargeParPage(array &$dVueErreur)
    {
        global $rep, $vues;
        $nbPage = 0;
        $model = new Modele();
        $page = $_REQUEST['page'] ?? 1;
        $nbNewsParPage = 5; //A set plus tard dans la base
        $tabNews = $model->chargeNewsParPageM($dVueErreur, $page, $nbNewsParPage, $nbPage);
        if (empty($dVueErreur))
            require($rep . $vues['principale']);
    }
}