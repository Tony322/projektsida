<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
	<meta name="robots" content="noindex, nofollow"/>
    <title>Speldalen - Konsollspel till Xbox, Nintendo och Playstation.</title>
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
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  3000);

		});
	</script>
  </head>
 
  <body>
    <div id="container">
	
		<header id="logoheader">
			<?php
				include('headerlogo.html');
			?>
		</header>
		<header id="header">
			<?php
				include('header.html');
			?>
		</header>

		  		  
        <nav id="nav">
		<?php
		include('nav.html');
		?>
		
		</nav>
		<nav id="mainnav">
			<ul id="breadcrumbs">
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
			
			<section class="news">
				<h3>NYHETER!!!</h3>
			</section>
			<section class="offers">
				<h3>ERBJUDANDEN!!</h3><p>5 FÖR PRISET AV EN!</p>
			</section>
			
        </main>
		
        <footer id="footer">
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
