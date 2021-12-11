<?php

class NewsGateway
{
    private $con;

    public function __construct(Connection $c)
    {
        $this->con = $c;
    }

    public function insert(string $titre, string $description, string $lien, string $date, string $idSite)
    {
        $query = 'INSERT INTO news VALUES(:titre,:description,:lien,:date,:idSite);';
        $this->con->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':lien' => array($lien, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':idSite' => array($idSite, PDO::PARAM_STR)
        ));
    }

    public function delete(string $lien)
    {
        $query = 'DELETE FROM news WHERE lien=:lien';
        $this->con->executeQuery($query, array(
            ':lien' => array($lien, PDO::PARAM_STR)
        ));
    }

    public function updateTitre(string $lien, string $newTitre)
    {
        $query = 'UPDATE news SET titre=:newTitre WHERE lien=:lien';
        $this->con->executeQuery($query, array(
            ':lien' => array($lien, PDO::PARAM_STR),
            ':newTitre' => array($newTitre, PDO::PARAM_STR)
        ));
    }

    public function updateDescription(string $lien, string $newDescription)
    {
        $query = 'UPDATE news SET description=:newDescription WHERE lien=:lien';
        $this->con->executeQuery($query, array(
            ':lien' => array($lien, PDO::PARAM_STR),
            ':newDescription' => array($newDescription, PDO::PARAM_STR)
        ));
    }

    public function updateDate(string $lien, string $newDate)
    {
        $query = 'UPDATE news SET date=:newDate WHERE lien=:lien';
        $this->con->executeQuery($query, array(
            ':lien' => array($lien, PDO::PARAM_STR),
            ':newDate' => array($newDate, PDO::PARAM_STR)
        ));
    }

    public function findAllNews(): array
    {
        $query = 'SELECT * FROM news ORDER BY date DESC';
        $this->con->executeQuery($query);
        $results = $this->con->getResults();
        foreach ($results as $row)
            $tabNews[] = new News($row['titre'], $row['description'], $row['lien'], $row['date'], $row['idSite']);
        return $tabNews;
    }

    public function findNews(int $page, int $nbNewsParPage): array
    {
        $first = ($page - 1) * $nbNewsParPage;
        $query = 'SELECT * FROM news ORDER BY date DESC LIMIT :first,:nbNews';
        $this->con->executeQuery($query, array(
            ':first' => array($first, PDO::PARAM_INT),
            ':nbNews' => array($nbNewsParPage, PDO::PARAM_INT)
        ));
        $results = $this->con->getResults();
        foreach ($results as $row)
            $tabNews[] = new News($row['titre'], $row['description'], $row['lien'], $row['date'], $row['idSite']);
        return $tabNews;
    }

    public function getNbNews(): int
    {
        $query = "SELECT COUNT(*) FROM news";
        $this->con->executeQuery($query);
        $tab = $this->con->getResults();
        return $tab[0][0];
    }

    public function getLastDate(string $idSite)
    {
        $query = "SELECT date FROM news WHERE idSite=:idSite ORDER BY  date DESC LIMIT 1";
        $this->con->executeQuery($query, array(':idSite' => array($idSite, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        return $results[0]['date'];
    }
}
