<?php

global $base, $user, $mdp, $logFile;

//Ouverture des gateways
//Recuperation des sites
try {
    $con = new Connection($base, $user, $mdp);
    $sg = new SiteGateway($con);
    $ng = new NewsGateway($con);
    $ag = new AdminGateway($con);

    $sites = $sg->findAllSite();
} catch (PDOException $exception) {
    echo $exception->getMessage() . "</br>";
    exit(1);
}

//Ouverture du fichier de log
$logStream = fopen($logFile, "a");

function trunc_str(string $text, int $max): string
{
    $final_string = "";
    if (strlen($text) < $max)
        return $text;
    foreach (explode(' ', $text) as $str) {
        if (strlen($final_string) + strlen($str) > $max - 3)
            return $final_string . "...";
        $final_string .= " " . $str;
    }
    return $final_string;
}

foreach ($sites as $site) {
    try {
        $rss = new SimpleXMLElement($site->getFluxRSS(), 0, true);

        $last_date = $ng->getLastDate($site->getFluxRSS());

        foreach ($rss->channel->item as $news) {
            $titre = $news->title;
            $titre = filter_var($titre, FILTER_SANITIZE_STRING);
            $titre = trunc_str($titre, 100);

            $description = $news->description;
            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $description = trunc_str($description, 500);

            $lien = $news->link;
            $lien = filter_var($lien, FILTER_SANITIZE_URL);
            if (strlen($lien) > 256) {
                fwrite($logStream, date("Y-m-d H:i:s") . " => Erreur sur le site: " . $site . "\n");
                fwrite($logStream, date("Y-m-d H:i:s") . " => Lien trop long(" . strlen($lien) . "): " . $lien . "\n");
                continue;
            }

            $date = date('Y-m-d H:i:s', strtotime($news->pubDate));

            if (empty($date))
                continue;
            if ($date <= $last_date)
                break;

            $ng->insert($titre, $description, $lien, $date, $site->getFluxRSS());
        }
    } catch (PDOException $exception) {
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . $exception->getMessage() . "\n");
        fwrite($logStream, date("Y-m-d H:i:s") . " => Erreur sur le site: " . $site . "\n");
    } catch (Exception $e) {
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . $e->getMessage() . "\n");
        fwrite($logStream, date("Y-m-d H:i:s") . " => Erreur sur le site: " . $site . "\n");
    }
}

$nbNewsMax = $ag->getNbNewsEnBD();
$nbToRemove = $ng->getNbNews() - $nbNewsMax;
if ($nbToRemove > 0)
    $ng->deleteNOldestNews($nbToRemove);

//Fermeture du fichier de log
fclose($logStream);
