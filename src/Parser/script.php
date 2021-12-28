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

//Fonction de nettoyage
function cleanString($text)
{
    $utf8 = array(
        '/[áàâãªä]/u' => 'a',
        '/[ÁÀÂÃÄ]/u' => 'A',
        '/[ÍÌÎÏ]/u' => 'I',
        '/[íìîï]/u' => 'i',
        '/[éèêë]/u' => 'e',
        '/[ÉÈÊË]/u' => 'E',
        '/[óòôõºö]/u' => 'o',
        '/[ÓÒÔÕÖ]/u' => 'O',
        '/[úùûü]/u' => 'u',
        '/[ÚÙÛÜ]/u' => 'U',
        '/ç/' => 'c',
        '/Ç/' => 'C',
        '/ñ/' => 'n',
        '/Ñ/' => 'N',
        '/–/' => '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u' => '\'', // Literally a single quote
        '/[“”«»„]/u' => '"', // Double quote
        '/ /' => ' ', // nonbreaking space (equiv. to 0x160)
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $text);
}

foreach ($sites as $site) {
    try {
        $rss = new SimpleXMLElement($site->getFluxRSS(), 0, true);

        $last_date = $ng->getLastDate($site->getFluxRSS());

        foreach ($rss->channel->item as $news) {
            $titre = $news->title;
            $titre = cleanString($titre);
            $titre = filter_var($titre, FILTER_SANITIZE_STRING);
            $titre = substr($titre, 0, 97);
            if (strlen($titre) == 97)
                $titre = str_pad($titre, 100, '.');

            $description = $news->description;
            $description = cleanString($description);
            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $description = substr($description, 0, 497);
            if (strlen($description) == 497)
                $description = str_pad($description, 500, '.');

            $lien = $news->link;
            $lien = filter_var($lien, FILTER_SANITIZE_URL);
            if (strlen($lien) > 256)
                continue;

            $date = date('Y-m-d H:i:s', strtotime($news->pubDate));

            if (empty($date))
                continue;
            if ($date <= $last_date)
                break;

            $ng->insert($titre, $description, $lien, $date, $site->getFluxRSS());
        }
    } catch (PDOException $exception) {
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . $exception->getMessage() . "\n");
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . "Erreur sur le site: " . $site . "\n");
    } catch (Exception $e) {
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . $e->getMessage() . "\n");
        fwrite($logStream, date("Y-m-d H:i:s") . " => " . "Erreur sur le site: " . $site . "\n");
    }
}

$nbNewsMax = $ag->getNbNewsEnBD();
$nbToRemove = $ng->getNbNews() - $nbNewsMax;
if ($nbToRemove > 0)
    $ng->deleteNOldestNews($nbToRemove);

//Fermeture du fichier de log
fclose($logStream);
