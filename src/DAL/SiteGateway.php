<?php

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
        $query='INSERT INTO site VALUES(:fluxRSS,:nom,:lienSite,:logo)';

        $this->con->executeQuery($query,array(
            ':nom' => array($s->getNom(),PDO::PARAM_STR),
            ':lienSite' => array($s->getLienSite(),PDO::PARAM_STR),
            ':logo' => array($s->getLogo(),PDO::PARAM_STR),
            ':fluxRSS' => array($s->getFluxRSS(),PDO::PARAM_STR),
        ));
    }

    public function findImage(string $fluxRSS):string{
        $query='SELECT logo from site WHERE fluxrss=:fluxrss';
        $this->con->executeQuery($query,array(
            ':fluxrss' => array($fluxRSS,PDO::PARAM_STR)
        ));
        return $this->con->getResults()[0][0];
    }

    public function delete(String $nom){
        $query='DELETE FROM site WHERE nom=:nom';
        $this->con->executeQuery($query,array(
            ':nom' => array($nom,PDO::PARAM_STR)
        ));
    }

    public function canInsert(string $fluxRSS) :bool{
        $query='SELECT * from site WHERE fluxrss=:fluxrss';
        $this->con->executeQuery($query,array(
            ':fluxrss' => array($fluxRSS,PDO::PARAM_STR)
        ));
        return empty($this->con->getResults());
    }

    public function exists(string $nom) :bool{
        $query='SELECT * from site WHERE nom=:nom';
        $this->con->executeQuery($query,array(
            ':nom' => array($nom,PDO::PARAM_STR)
        ));
        return !empty($this->con->getResults());
    }

    public function findAllSite():array{
        $query='SELECT * from site';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $row)
            $tabSites[]=new Site($row['nom'],$row['lien'],$row['logo'],$row['fluxrss']);
        return $tabSites;
    }

    public function findSite(string $fluxRSS):Site{
        $query='SELECT * from site WHERE fluxrss=:fluxrss';
        $this->con->executeQuery($query,array(
            ':fluxrss' => array($fluxRSS,PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();

        return new Site($results[0]['nom'],$results[0]['lien'],$results[0]['logo'],$results[0]['fluxrss']);

    }
}