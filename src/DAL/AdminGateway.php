<?php

class AdminGateway
{
    private $con;

    /**
     * @param $con
     */
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getHash(string $login): string
    {
        $query = 'SELECT * FROM admin WHERE login=:login';
        $this->con->executeQuery($query, array(
            ':login' => array($login, PDO::PARAM_STR)
        ));
        return $this->con->getResults()[0]['hash_password'];
    }

    public function getNbNewsParPage(): int
    {
        $query = 'SELECT nbNewsParPage FROM admin WHERE login=\'user\'';
        $this->con->executeQuery($query);
        $results = $this->con->getResults();
        return $results[0]['nbNewsParPage'] ?? 5;
    }

    public function setNbNewsParPage(int $nb): bool
    {
        $query = 'UPDATE admin SET nbNewsParPage=:nbNewsParPage WHERE login=\'user\'';
        return $this->con->executeQuery($query, array(
            ':nbNewsParPage' => array($nb, PDO::PARAM_INT)
        ));
    }

    public function getNbNewsEnBD(): int
    {
        $query = 'SELECT nbNewsEnBD FROM admin WHERE login=\'user\'';
        $this->con->executeQuery($query);
        $results = $this->con->getResults();
        return $results[0]['nbNewsEnBD'] ?? 5;
    }

    public function setNbNewsEnBD(int $nb): bool
    {
        $query = 'UPDATE admin SET nbNewsEnBD=:nbNewsEnBD WHERE login=\'user\'';
        return $this->con->executeQuery($query, array(
            ':nbNewsEnBD' => array($nb, PDO::PARAM_INT)
        ));
    }
}