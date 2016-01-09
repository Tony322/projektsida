<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
	<meta name="robots" content="noindex, nofollow"/>
	<meta name="description" content="Speldalen, vi har dom senaste spelen till dom senaste konsolerna. Beställ bekvämt hemifrån på hemsidan eller direkt i vår lokala butik i Borlänge. Vi har spel till Sony playstion, Nicrosoft Xbox och Nintendo WiiU."/>
    <title>Speldalen - Konsolspel till Xbox, Nintendo och Playstation.</title>
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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script>
		$(function() {

			$("#slideshow > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow > div:first')
			    .fadeOut(0)
			    .next()
			    .fadeIn(0)
			    .end()
			    .appendTo('#slideshow');
			},  3000);

		});
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
				<li><a href="index.php">Hem /</a></li>
			</ul>
		</nav>
		
		
        <main>
		
			<div id="slideshow">
				<div>
					<img src="bilder/battle2.jpg" alt="Battle">
				</div>
				<div>
					<img src="bilder/justcause.jpg" alt="justcause">
				</div>
				<div>
					<img src="bilder/rainbow.jpg" alt="rainbow">
				</div>
			</div>
			<h2 class="welcome">Välkommen till Speldalen!</h2>
			<p class="welcome">Hos oss finner du spel till de populäraste spelkonsolerna, som just nu är Microsoft Xbox, Nintendo Wii och Sony Playstation.</p>
			<br>

			
			<section class="news">
			
				<h1>Nyheter till Xbox, Nintendo och Playstation!</h1>
				 <p><strong>Nyheter till Xbox One</strong><br>
				  <a href="http://www.mards.se/xbox/products/blackops.php">Call of Duty- Black OPS !</a><br><br>
				  <strong>Nyheter till Playstation</strong><br>
				  <a href="http://mards.se/playstation/products/battlefront.php">Battlefront!</a><br><br>
				 <strong>Nyheter till Nintendo</strong><br>
				 <a href="http://mards.se/nintendo/products/mariokart.php">Mariokart 8!</a><br>
				</p>
				</section>
				
			<section class="offers">
				<h1>Erbjudanden!</h1>
				<p>Mellandagsrea:<br>Köp 5 spel och få ett spel på köpet.<br>Köp tio spel och betala för 15!</p>
			</section>
			
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
