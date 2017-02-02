<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex, nofollow"/>
        <meta name=“description” content="Speldalen - Köp senaste konsolspelen till playstation Wii U/Wii U i Borlänge till de senaste konsolerna"/>
        <title>Speldalen - Playstation</title>
        <style type="text/css">
            body {
                background-color:#FFFFFF;
                color:#000000;    
            }
            .clearfix {
                clear:both;
            }
        </style>
        <link rel="stylesheet" style="text/css" href="hemstyle.css" />

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
        <div id="container">

            <header class="logoheader">
                <?php
                include('headerlogo.html');
                ?>
            </header>
            <header class="header">
                <?php
                include('header.html');
                ?>
            </header>

            <nav class="nav">
                <?php
                include('nav.html');
                ?>
            </nav>  		  

            <nav class="mainnav">
                <ul class="breadcrumbs">
                    <li><a href="index.php?home">Hem /</a></li>
                    <li><a href="index.php?products/categories">Konsoler /</a></li>
                    <li><a href="index.php?products/category/playstation">Playstation</a></li>
                </ul>
            </nav>

            <main>
                <article>

                    <?php
                    echo "SPEL - ANTAL: " . count($games) . " </br>";

                    foreach ($games as $game) {
                        echo "<li> ID:{$game['id']} {$game['name']} DESC: {$game['description']} CATID: {$game['category']} CATNAME: {$game['categoryname']} PRICE:{$game['price']} STOCK:{$game['stock']} </li>";
                        
                        //Knapp som kör javascript och skickar in det nuvarande artikel idt som argument.
                        echo "<button onclick='addToCart({$game['id']})'>Köp</button>";
                    }

                    echo 'END SPEL </br>';
                    ?>
                </article>
            </main>

            <footer class="footer">
                <?php
                include('footer.html');
                ?>
            </footer>
        </div>


        <!-- W3C logos for valid HTML5 and CSS3 -->
        <div class="clearfix"></div>
        <div>
            <p>
                <a href="http://validator.w3.org/check?uri=referer">
                    <img src="http://www.w3.org/html/logo/downloads/HTML5_Logo_64.png" alt="Valid HTML5" height="50" width="50"
                         style="border:0;" />
                </a>
            </p>
            <p>
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                         alt="Valid CSS!" />
                </a>
            </p>
        </div>
    </body>
</html>
