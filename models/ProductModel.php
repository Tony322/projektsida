<?php

//echo 'model initiated </br>';

class ProductModel {

    //Prefix för tabellnamn.
    public $tablePrefix = "tony_";

    public function getAllGames() {
        try {
            //Tabellnamn exkl. prefix.
            $tablePostfix = 'products';

            $tableName = $this->tablePrefix . $tablePostfix;

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
            //echo 'running getgamesbycategoryname </br>';
            //Tabellnamn exkl. prefix.
            $tablePostfix = 'products';

            $tableName = $this->tablePrefix . $tablePostfix;
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

    //Ingen procedure för denna, ta bort?
/*    public function getGamesByCategoryId($id) {
        try {
            //echo 'running getGamesByCategoryId </br>';
            //Tabellnamn exkl. prefix.
            $tablePostfix = 'products';

            $tableName = $this->tablePrefix . $tablePostfix;
            $details = 'mysql:host=mards.se;dbname=webshop';
            $usr = 'tony';
            $pw = 'Vennberg';

            $pdocon = new PDO($details, $usr, $pw);

            $querystr = "ON {$this->tablePrefix}products.category = {$this->tablePrefix}categories.id WHERE category = {$id}";

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
    }*/

    public function getGameByName($name) {
        try {
            //echo 'running getgamesbycategoryname </br>';
            //Tabellnamn exkl. prefix.
            $tablePostfix = 'products';

            $tableName = $this->tablePrefix . $tablePostfix;
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
            
            //echo 'running getgamesbycategoryname </br>';
            //Tabellnamn exkl. prefix.
            $tablePostfix = 'products';

            $tableName = $this->tablePrefix . $tablePostfix;
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
}

?>