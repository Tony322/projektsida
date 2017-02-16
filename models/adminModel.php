<?php

class adminModel {

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

    public function addProduct($product) {

        $querystr = "call h15tonve_addProduct(?, ?, ?, ?, ?, ?)";

        $query = $this->pdocon->prepare($querystr);
        $query->bindValue(1, $product->name, PDO::PARAM_STR);
        $query->bindValue(2, $product->desc, PDO::PARAM_STR);
        $query->bindValue(3, $product->category, PDO::PARAM_INT);
        $query->bindValue(4, $product->price);
        $query->bindValue(5, $product->stock, PDO::PARAM_INT);
        $query->bindValue(6, $product->imgurl, PDO::PARAM_STR);

        $query->execute();

        $this->pdocon = NULL;
    }

    public function updateProduct($product) {

        $querystr = "call h15tonve_updateProduct(?, ?, ?, ?, ?, ?, ?)";

        $query = $this->pdocon->prepare($querystr);
        $query->bindValue(1, $product->id, PDO::PARAM_INT);
        $query->bindValue(2, $product->name, PDO::PARAM_STR);
        $query->bindValue(3, $product->desc, PDO::PARAM_STR);
        $query->bindValue(4, $product->category, PDO::PARAM_INT);
        $query->bindValue(5, $product->price);
        $query->bindValue(6, $product->stock, PDO::PARAM_INT);
        $query->bindValue(7, $product->imgurl, PDO::PARAM_STR);

        $query->execute();

        $this->pdocon = NULL;
    }

    public function setConnection() {

        try {
            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'rene';
            $pw = 'Eriksson';

            $this->pdocon = new PDO($details, $usr, $pw);
        } catch (PDOException $pdoexp) {
            $this->pdocon = NULL;
            throw new Exception('Databasfel!');
        }
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
        } catch (PDOException $pdoexp) {
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }
    }

}

?>