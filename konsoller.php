<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Coolaspelsidan - HEM</title>
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
	
		<header id="logoheader">Logo</header>
		<header id="header">Page Header</header>

		  		  
        <nav id="nav">Lokal Navigation</nav>
		<nav id="mainnav">
		<ul id="breadcrumbs">
			<li><a href="index.php">Hem /</a></li>
			<li><a href="konsoller.php">Konsoller /</a></li>
		</ul>
		
		
		</nav>
		
		
        <main>
          <article>
		  
            <h1>Våra awesome konsoller!</h1>
			<h2>Senaste skiten</h2>          
			<ul>
				<li><a href="xbox.php">XBOX</a></li>
				<li><a href="nintendo.php">Nintendo</a></li>
				<li><a href="sony.php">Sony</a></li>
			</ul>
          </article>
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
