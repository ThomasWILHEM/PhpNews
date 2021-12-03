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

    public function verifAdmin(string $login,string $password):bool{
        $query='SELECT * FROM admin WHERE login=:login';
        $this->con->executeQuery($query,array(
            ':login' => array($login,PDO::PARAM_STR)
        ));
        $results = $this->con->getResults();

        if(count($results)!=1){
            return false;
        }
        return password_verify($password,$results[0]['hash_password']);
    }


}