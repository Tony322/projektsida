<?php

class adminModel
{
    private $pdocon;

    public function __construct() {
        $this->setConnection();
    }

    public function getAllGames() {

            $querystr = "call h15tonve_getAllProducts()";

            $query = $this->pdocon->prepare($querystr);

            $query->execute();

            $games = $query->fetchAll();

            $this->pdocon = NULL;
            return $games;
    }

    public function deleteProduct($id) {

        $querystr = "call h15tonve_deleteProduct($id)";

        $query = $this->pdocon->prepare($querystr);

        $query->execute();

        $this->pdocon = NULL;
    }

    public function setConnection() {

        try {
            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'rene';
            $pw = 'Eriksson';

            $pdocon = new PDO($details, $usr, $pw);
        } catch (PDOException $pdoexp) {
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }

        $this->pdocon = $pdocon;
    }
    
    public function checkUser($username, $password) {
        try {
            $querystr = 'call h15tonve_authUser(?, ?)';

            //Förbered frågan
            $query = $this->pdocon->prepare($querystr);

            $query->bindValue(1, $username, PDO::PARAM_STR);
            $query->bindValue(2, $password, PDO::PARAM_STR);

            //Kör frågan
            $query->execute();

            //Ta emot resultat som en array.
            $games = $query->fetchAll();
            $this->pdocon = NULL;

            return $games;
        }
        catch (PDOException $pdoexp){
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }
    }
}

?>