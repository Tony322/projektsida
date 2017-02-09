<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta charset="UTF-8"/>
        <meta name="robots" content="noindex, nofollow"/>
        <link rel="stylesheet" style="text/css" href="hemstyle.css" />
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <script>
            function addToCart(id) {
                //Objekt för att köra url request
                var xmlhttp = new XMLHttpRequest();
                //Skapa urlen
                var requestUrl = "index.php?cart/add/" + id;

                //Skapa och kör url requesten
                xmlhttp.open("GET", requestUrl, true);
                xmlhttp.send();

                //Meddela användaren att produkten är tillagd.
                alert("Lade till artikelnr: " + id + " i kundvagnen!");
            }
        </script>
    </head>


    <body>

        <?php
        session_start();
        
        //Om inte cart session finns se till att skapa skiten
        if (!$_SESSION['cart']) {
            $_SESSION['cart'] = array();
        }

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
        ?>

    </body>
</html>
