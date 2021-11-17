<?php

require_once ("Connection.php");
class NewsGateway
{
    private $con;

    public function __construct(Connection $c)
    {
        $this->con=$c;
    }

    public function insert(string $titre, string $description, string $lien, string $date){
        $query='INSERT INTO news VALUES(:titre,:description,:lien,:date);';
        $this->con->executeQuery($query,array(
            ':titre'=> array($titre,PDO::PARAM_STR),
            ':description'=> array($description,PDO::PARAM_STR),
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':date'=> array($date,PDO::PARAM_STR)
        ));
    }

    public function delete(string $lien){
        $query='DELETE FROM news WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR)
        ));
    }

    public function update(string $lien,array $parameters){
        $query='UPDATE news SET  WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> $parameters
        ));
    }

    public function findAllNews() : array{
        $query='SELECT * FROM news';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $row)
            $tabNews[]=new News($row['titre'],$row['description'],$row['lien'],$row['date']);
        return $tabNews;
    }

}
