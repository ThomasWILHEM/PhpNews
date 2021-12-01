<?php

class Modele
{
    public function chargeNewsParPageM(array &$dVueErreur, $page, $nbNewsParPage, &$nbPage): array
    {
        global $base, $user, $mdp;
        $tabNews = [[]];
        $ng = new NewsGateway(new Connection($base, $user, $mdp));
        $nbNewsTotal = $ng->getNbNews();
        $nbPage = ceil($nbNewsTotal / $nbNewsParPage);
        if (empty($page) || $page <= 0 || $page > $nbPage) {
            $dVueErreur[] = "Problème avec l'indice de la page";
            return [];
        }
        $tabNews[0] = $ng->findNews($page, $nbNewsParPage);
        $sg = new SiteGateway(new Connection($base, $user, $mdp));
        for ($i = 0; $i < count($tabNews[0]); $i++)
            $tabNews[1][$i] = $sg->findSite($tabNews[0][$i]->getIdSite());
        return $tabNews;
    }

    public function chargerPageAdminM()
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
}