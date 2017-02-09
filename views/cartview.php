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
                    <li><a href="index.php?cart/view">Kundvagn /</a></li>
                </ul>
            </nav>

            <main>
                <article>

                    <?php
                    //Håller totalsumma
                    $summa = 0.0;

                    //Få en array som innehåller antal av varje id
                    $amount = array_count_values(array_map(function($value){return $value['id'];}, $games));
                    
                    //Se till att arrayen innehåller unika rader.
                    $games = array_unique($games, SORT_REGULAR);

                    foreach ($games as $game) {
                        //Spelets id
                        $id = $game['id'];

                        //Antal per id lagras i $count
                        $count = $amount[$id];

                        //Summan per produkt beräknas (priset * antal)
                        $sumPerProduct = $game['price'] * $count = $amount[$id];

                        //Skriver ut..
                        echo "<li> Artikelnr: {$game['id']} Produktnamn: <a href='index.php?products/name/{$game['name']}'>{$game['name']}</a> Antal: {$count} Pris/st: {$game['price']} Pris/total: {$sumPerProduct}";
                        echo "&nbsp" . "<a href='index.php?cart/remove/$id'><button type='button'>-</button></a>";
                        echo "&nbsp" . "<a href='index.php?cart/addincart/$id'><button type='button'>+</button></a>";
                        echo "&nbsp" . "<a href='index.php?cart/purge/$id'><button type='button'>ta bort</button></a>";
                        echo "</li>";

                        //Adderar totalsumman
                        $summa += $sumPerProduct;
                    }
                    //Skriv ut totalsumma.
                    echo "Summa: " . $summa . ":-" . "<br>";
                    echo "&nbsp" . "<a href='index.php?cart/dumpcart/$id'><button type='button'>dump cart</button></a>";
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
