<?php

class AdminModele
{
    public function connection(string $login, string $password, array &$dVueErreur)
    {
        global $base, $user, $mdp;
        if (Validation::isValidString($login, $dVueErreur) && Validation::isValidString($password, $dVueErreur)) {
            $ga = new AdminGateway(new Connection($base, $user, $mdp));
            if ($ga->verifAdmin($login, $password)) {
                $_SESSION['role'] = 'admin';
                $_SESSION['login'] = $login;
            } else
                $dVueErreur[] = "Le mot de passe/login n'est pas bon";
        } else
            $dVueErreur[] = "Mot de passe/login non valides";
    }

    public function deconnexion()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public function isAdmin(array &$dVueErreur)
    {
        if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
            if (Validation::isValidString($_SESSION['login'], $dVueErreur) && Validation::isValidString($_SESSION['role'], $dVueErreur)) {
                $login = $_SESSION['login'];
                $role = $_SESSION['role'];
                return new Admin($login, $role);
            } else
                return null;
        }
        return null;
    }

    public function chargerPageAdminM(): array
    {
        global $base, $user, $mdp;
        $sg = new SiteGateway(new Connection($base, $user, $mdp));
        return $sg->findAllSite();
    }

    public function ajouterSiteM(array &$dVueErreur, string $nomSite, string $lienSite, string $logoSite, string $fluxRSS)
    {
        global $base, $user, $mdp;
        $sg = new SiteGateway(new Connection($base, $user, $mdp));
        if ($sg->canInsert($fluxRSS)) {
            $sg->insert(new Site($nomSite, $lienSite, $logoSite, $fluxRSS));
        } else
            $dVueErreur[] = "Impossible d'inserer " . $fluxRSS;
    }

    public function supprimerSiteM(array &$dVueErreur, string $idWebsite)
    {
        global $base, $user, $mdp;
        $sg = new SiteGateway(new Connection($base, $user, $mdp));
        if ($sg->exists($idWebsite)) {
            $sg->delete($idWebsite);
        } else
            $dVueErreur[] = "Impossible de supprimer " . $idWebsite;
    }

    public function modifierNbNewsM(int $nb, array &$dVueErreur)
    {
        //implémenter la méthode qui change la valeur dans la bd
    }
}