<?php

session_start();

//Exploda urlen vid /
$queryArray = explode('/', $_SERVER['QUERY_STRING']);

//Kolla om en controller finns med det namnet
if (file_exists("./controllers/{$queryArray[0]}.php")) {
    //Inkludera och instansiera controllern som finns i URLen i indexplats 0.
    include_once "./controllers/{$queryArray[0]}.php";
    $cont = new $queryArray[0]();
} else {
    //Om inte, använd default controller (home)
    include_once "./controllers/home.php";
    $cont = new home();
}


//Kolla metod att köra och parametrar...
//
        //Endast metod är satt.
if (isset($queryArray[1]) && !isset($queryArray[2])) {
    //echo 'Kör för extra arg <br/>';
    $cont->{$queryArray[1]}();
}
//Metod och para är satt
else if (isset($queryArray[1]) && isset($queryArray[2])) {
    //echo "kör metod och para {$queryArray[1]} {$queryArray[2]}";
    $cont->{$queryArray[1]}($queryArray[2]);
}

