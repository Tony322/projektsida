<?php

//echo 'model initiated </br>';

class ProductModel {

    public function getAllGames() {
        try {
            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'tony';
            $pw = 'Vennberg';

            $pdocon = new PDO($details, $usr, $pw);


            $querystr = "call h15tonve_getAllProducts()";

            //Printa frågan..
            //echo "<b>Executed Query:</b> \"$querystr\" </br>";

            $query = $pdocon->prepare($querystr);

            $query->execute();

            $games = $query->fetchAll();
            //
            $pdocon = NULL;
            return $games;
        } catch (PDOException $pdoexp) {
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }
    }

    public function getGamesByCategoryName($name) {
        try {
            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'tony';
            $pw = 'Vennberg';

            $pdocon = new PDO($details, $usr, $pw);

            $querystr = 'CALL h15tonve_getProductsByCategoryName(\'' . $name . '\')';

            //Printa frågan..
            //echo "<b>Executed Query:</b> \"$querystr\" </br>";

            //Förbered frågan
            $query = $pdocon->prepare($querystr);

            //Kör frågan
            $query->execute();

            //Ta emot resultat som en array.
            $games = $query->fetchAll();
            $pdocon = NULL;

            //$games = array('asdad','asdasd');
            return $games;
        } catch (PDOException $pdoexp) {
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }
    }

    public function getGameByName($name) {
        try {

            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'tony';
            $pw = 'Vennberg';

            $pdocon = new PDO($details, $usr, $pw);
            $querystr = 'call h15tonve_getProductByName(\'' . $name . '\')';


            //Printa frågan..
            //echo "<b>Executed Query:</b> \"$querystr\" </br>";

            //Förbered frågan
            $query = $pdocon->prepare($querystr);

            //Kör frågan
            $query->execute();

            //Ta emot resultat som en array.
            $games = $query->fetchAll();
            $pdocon = NULL;

            //$games = array('asdad','asdasd');
            return $games;
        } catch (PDOException $pdoexp) {
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }
    }

    public function getGameById($id) {
        try {
            
            //Konvertera potentiell sträng till int för att query ska fungera.
            $id = intval($id);
            
            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'tony';
            $pw = 'Vennberg';

            $pdocon = new PDO($details, $usr, $pw);

            $querystr = 'CALL h15tonve_getProductById(\'' . $id . '\')';

            //Printa frågan..
            //echo "<b>Executed Query:</b> \"$querystr\" </br>";

            //Förbered frågan
            $query = $pdocon->prepare($querystr);

            //Kör frågan
            $query->execute();

            //Ta emot resultat som en array.
            $games = $query->fetchAll();
            $pdocon = NULL;

            return $games;
        } catch (PDOException $pdoexp) {
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }
    }

    public function getUserById() {
        try {
            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'tony';
            $pw = 'Vennberg';

            $pdocon = new PDO($details, $usr, $pw);
            $querystr = 'call h15tonve_getUserByUserId()';

            //Förbered frågan
            $query = $pdocon->prepare($querystr);

            //Kör frågan
            $query->execute();

            //Ta emot resultat som en array.
            $games = $query->fetchAll();
            $pdocon = NULL;

            return $games;
        }
        catch (PDOException $pdoexp){
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }


    }

    public function checkUser($username, $password) {
        try {

            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'tony';
            $pw = 'Vennberg';

            $pdocon = new PDO($details, $usr, $pw);
            $querystr = 'call h15tonve_authUser(?, ?)';

            //Förbered frågan
            $query = $pdocon->prepare($querystr);

            $query->bindValue(1, $username, PDO::PARAM_STR);
            $query->bindValue(2, $password, PDO::PARAM_STR);

            //Kör frågan
            $query->execute();

            //Ta emot resultat som en array.
            $games = $query->fetchAll();
            $pdocon = NULL;

            return $games;
        }
        catch (PDOException $pdoexp){
            $pdocon = NULL;
            throw new Exception('Databasfel!');
        }
    }
}

?>