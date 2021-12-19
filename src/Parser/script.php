<?php

global $base, $user, $mdp, $logFile;

//Ouverture des gateways
//Recuperation des sites
try {
    $con = new Connection($base, $user, $mdp);
    $sg = new SiteGateway($con);
    $ng = new NewsGateway($con);

    $sites = $sg->findAllSite();
} catch (PDOException $exception) {
    echo $exception->getMessage() . "</br>";
    exit(1);
}

//Ouverture du fichier de log
$logStream = fopen($logFile, "a");

foreach ($sites as $site) {
    try {
        $rss = new SimpleXMLElement($site->getFluxRSS(), 0, true);

        $last_date = $ng->getLastDate($site->getFluxRSS());

        foreach ($rss->channel->item as $news) {
            $titre = substr($news->title, 0, 100);
            $description = substr($news->description, 0, 500);
            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $date = date('Y-m-d H:i:s', strtotime($news->pubDate));

            if ($date <= $last_date)
                break;

            $ng->insert($titre, $description, $news->link, $date, $site->getFluxRSS());
        }
    } catch (PDOException $exception) {
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . $exception->getMessage() . "\n");
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . "Erreur sur le site: " . $site . "\n");
    } catch (Exception $e) {
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . $e->getMessage() . "\n");
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . "Erreur sur le site: " . $site . "\n");
    }
}

$nbNewsMax=400;
$nbToRemove=$ng->getNbNews()-$nbNewsMax;
if($nbToRemove > 0)
    $ng->deleteNOldestNews($nbToRemove);

//Fermeture du fichier de log
fclose($logStream);
