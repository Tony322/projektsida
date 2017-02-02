<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta charset="UTF-8"/>
        <meta name="robots" content="noindex, nofollow"/>
        <link rel="stylesheet" style="text/css" href="hemstyle.css" />
    </head>


    <body>

        <?php
        session_start();
        
        
        
        //Exploda urlen vid /
        $queryArray = explode('/', $_SERVER['QUERY_STRING']);

        //Inkludera och instansiera controllern som finns i URLen i indexplats 0.
        include_once "./controllers/{$queryArray[0]}.php";
        $cont = new $queryArray[0]();

        //Skriv ut innehållet i arrayen
        //print_r($queryArray);
        //echo '<br />';

        
        //Bara metod är satt.
        if (isset($queryArray[1]) && !isset($queryArray[2])) {
            //echo 'Kör för extra arg <br/>';
            $cont->{$queryArray[1]}();
        }
        //Metod och para är satt
        else if(isset($queryArray[1]) && isset($queryArray[2])){
            //echo "kör metod och para {$queryArray[1]} {$queryArray[2]}";
            $cont->{$queryArray[1]}($queryArray[2]);
        }
        else if(!isset($queryArray[1]) && !isset($queryArray[2])){
            //$cont->
        }
        
        /*
        //Om metod och para är satt
        if (isset($queryArray[1]) && isset($queryArray[2])) {
            //echo 'Kör för extra arg <br/>';
            $cont->{$queryArray[1]}($queryArray[2]);
        }
        //Om bara ett argument
        else if (isset($queryArray[1]) && !isset($queryArray[2])) {
            //echo 'Bara ett argument i index <br/>';
            $cont->{$queryArray[1]}($queryArray[2]);
        } else {
            $cont->{$queryArray[0]}();
        }
        */
        //echo 'DONE';
        ?>

    </body>
</html>
