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

		  		  
        <nav id="nav">
			<ul id="sidenavlist">
				<li><a href="index.php">Hem</a></li>
				<li><a href="konsoller.php">Konsoller</a></li>
				<li><a href="xbox.php">Om oss</a></li>
				<li><a href="xbox.php">Villkor & skit</a></li>
			</ul>
		
		</nav>
		<nav id="mainnav">
			<ul id="breadcrumbs">
				<li><a href="index.php">Hem /</a></li>
				<li><a href="index.php">Nyhetsbrev</a></li>
			</ul>
		
		
		</nav>
		
		
        <main>
          <article class="newsForm">
			<?php
			if(isset($_POST['email']) and isset($_POST['wantNews'])){
				if($_POST['email'] != "") {
					print('<h2>Tack för din registrering!</h2>');
				}
				
			}
			else{
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
