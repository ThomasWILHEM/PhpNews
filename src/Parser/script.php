<?php

include('XMLParser.php');

echo '<a href="../index.php">Accueil</a>';

$parser=new XMLParser("https://www.reddit.com/.rss");
$parser->parse();
$result=$parser->getResult();
echo $result;

//$parser=new XMLParser("rss.xml");
//$parser->parse();
//$result=$parser->getResult();
//echo $result;
