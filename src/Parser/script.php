<?php

include('XMLParser.php');

require_once(__DIR__ . '/../Config/config.php');

require_once(__DIR__ . '/../Config/Autoload.php');
Autoload::charger();

echo '<a href="../index.php">Accueil</a>';

$rss=new SimpleXMLElement("https://www.jeuxvideo.com/rss/rss-pc.xml",0,true);
$tabNews=[];
foreach ($rss->channel->item as $news)
{
    $date=date('Y-m-d H:i:s',strtotime($news->pubDate));
    $tabNews[]=new News($news->title,$news->description,$news->link,$date,'https://www.jeuxvideo.com/rss/rss-pc.xml');
}

//foreach ($tabNews as $news)
//{
//    echo $news->getTitre()."</br>";
//    echo $news->getDescription()."</br>";
//    echo $news->getLien()."</br>";
//    echo $news->getDate()."</br>";
//    echo $news->getIdSite()."</br>";
//    echo "</br>";
//}

global $base,$user,$mdp;
$ng=new NewsGateway(new Connection($base,$user,$mdp));
foreach ($tabNews as $news)
{
    try {
        $ng->insert($news->getTitre(),$news->getDescription(),$news->getLien(),$news->getDate(),$news->getIdSite());
    }catch (PDOException $PDOException){
        $PDOException->getMessage();
    }
}

//try {
//    $ng=new NewsGateway(new Connection($base,$user,$mdp));
//    $ng->insert($tabNews[0]->getTitre(),$tabNews[0]->getDescription(),$tabNews[0]->getLien(),$tabNews[0]->getDate(),$tabNews[0]->getIdSite());
//}catch (PDOException $PDOException){
//    echo $PDOException->getMessage();
//}

$news = $tabNews[0];

$raw_date=$news->getDate();
echo date('Y-m-d H:i:s',strtotime($raw_date))."</br>";

//$parser=new XMLParser("rss.xml");
//$parser->parse();
//$result=$parser->getResult();
//echo $result;
