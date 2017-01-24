<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
	<meta name="robots" content="noindex, nofollow"/>
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
			<li><a href="konsoler.php">Konsoler</a></li>
		</ul>
		
		
		</nav>
		
		
        <main>
          <article>
		  
            <h1>Välj bland de hetaste konsolerna för att komma till dess produkter.</h1>
			<table class="konsollisttable">
			<tr>
				<td>
					<p>Nintendo Wii/U</p>
					<a href="nintendo/"><img src="bilder/nintendo.jpg" alt="Nintendo konsol"/></a>
				</td>
				<td>
					<p>Microsoft Xbox</p>
					<a href="xbox/"><img src="bilder/xbox.jpg" alt="Xbox konsol"/></a>
				</td>
				<td>
					<p>Sony Playstation</p>
					<a href="playstation/"><img src="bilder/ps4.jpg" alt="Playstation konsol"/></a>
				</td>
			</tr>
			</table>
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
