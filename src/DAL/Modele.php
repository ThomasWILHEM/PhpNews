<?php

class Modele
{
    public function chargeNewsParPageM(array &$dVueErreur, $page, $nbNewsParPage, &$nbPage): array
    {
        global $base, $user, $mdp;
        $tabNews = [[]];
        $ng = new NewsGateway(new Connection($base, $user, $mdp));
        $nbNewsTotal = $ng->getNbNews();
        if ($nbNewsTotal == 0)
            return [];
        if ($nbNewsParPage == 0) {
            $dVueErreur[] = "Problème avec le nombre de news à afficher par page (0)";
            return [];
        }
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
}