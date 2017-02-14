<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex, nofollow"/>
        <meta name=“description” content="Speldalen - Köp senaste konsolspelen till playstation Wii U/Wii U i Borlänge till de senaste konsolerna"/>
        <title>Speldalen - Playstation</title>

        <link rel="stylesheet" type="text/css"  href="./hemstyle.css" />
        <style type="text/css">
            body {
                background-color:#FFFFFF;
                color:#000000;
            }
            .clearfix {
                clear:both;
            }
        </style>


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
                    <li><a href="index.php?products/category/<?php echo ucfirst($games[0]['categoryname']); ?>"><?php echo ucfirst($games[0]['categoryname']); ?></a></li>
                </ul>
            </nav>

            <main>
                <article>

                    <?php
                    echo "<div class='productdetail'>";
                    echo $games[0]['name'] . "</br>";
                    echo "<img src='./bilder/{$games[0]['categoryname']}/{$games[0]['imgurl']}'>" . $games[0]['description'] . "</br>";
                    echo $games[0]['price'] . "kr&nbsp&nbsp" . "<button onclick='addToCart({$games[0]['id']})'>Lägg i varukorgen.</button><br>";
                    echo "</div>"
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
