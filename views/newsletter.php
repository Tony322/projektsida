<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex, nofollow"/>
        <title>Speldalen - Nyhetsbrev.</title>
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
                    <li><a href="index.php?newsletter">Nyhetsbrev</a></li>
                </ul>


            </nav>


            <main>
                <article class="newsForm">
                    <?php
                    /* Kolla om formen är ifylld och om den är det skriv ut tack för blabla ANNARS skriv ut formen. */
                    if (isset($_POST['email']) and isset($_POST['wantNews']) and isset($_POST['name']) and isset($_POST['lastName'])) {
                        if ($_POST['email'] != "" and $_POST['wantNews'] == "WANT") {
                            print('<h2>Tack för din registrering!</h2>');
                        }
                    } else {
                        print('
				<h1>Prenumerera på vårt nyhetsbrev!</h1>
		
			
			<form name="newsletterReg" action="newsletter.php" method="POST">
			<fieldset>
			<legend>Registrera uppgifter</legend>
			
			<span>Förnamn: </span> <br>
			<input type="text" name="name"> <br>
			
			<span>Efternamn: </span> <br>
			<input type="text" name="lastName"> <br>
			
			<span>E-post address: </span> <br>
			<input type="text" name="email" size="40"> <br> <br>
			
			<span>Jag vill ha nyhetsbrev skickat till min epost: </span>
			<input type="checkbox" name="wantNews" value="WANT" checked="checked"> <br><br>
			
			
			<input type="reset" value="Rensa">
			<input type="submit" value="Skicka">
			
			</fieldset>
			
			
			</form>
			');
                    }
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
