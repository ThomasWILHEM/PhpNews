<?php

include("Site.php");
require_once("Connection.php");

class SiteGateway
{
    private Connection $con;

    /**
     * @param $con
     */
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insert(Site $s){
        $query='INSERT INTO site VALUES(:nom,:lienSite,:logo,:fluxRSS)';

        $this->con->executeQuery($query,array(
            ':nom' => array($s->getNom(),PDO::PARAM_STR),
            ':lienSite' => array($s->getLienSite(),PDO::PARAM_STR),
            ':logo' => array($s->getLogo(),PDO::PARAM_STR),
            ':fluxRSS' => array($s->getFluxRSS(),PDO::PARAM_STR),
        ));
    }

    public function delete(Site $s){
        $query='DELETE FROM site WHERE fluxRSS=:fluxRSS';
        $this->con->executeQuery($query,array(':fluxRSS' => array(
            $s->getFluxRSS(),PDO::PARAM_STR)
        ));
    }

    public function findAllSite():array{
        $query='SELECT * from site';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $row)
            $tabSites[]=new Site($row['nom'],$row['lienSite'],$row['logo'],$row['fluxRSS']);
        return $tabSites;
    }
}