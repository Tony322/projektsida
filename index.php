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
          <article>
		  
	<div id="slideshow">
		<div>
			<img src="bilder/battle2.jpg">
			</div>
			<div>
			<img src="bilder/justcause.jpg">
		</div>
		<div>
			<img src="bilder/rainbow.jpg">
		</div>
	</div>
		  
            <h1>Lorem ipsum dolor</h1>
<h2> Göran was here!</h2>          
		  <p>Lorem ipsum ea sea quot nonumy, te per detracto sadipscing. Te nec assum percipit intellegam, dicam bonorum fabellas
            qui te. Prodesset signiferumque mea eu, eu homero denique perfecto eam, te vix cetero commune. Atqui omittam no nam. Te
            vis harum fuisset recusabo, ne has possim adolescens. Et eam noster quodsi apeirian. Ut has sint quaestio, ei usu
            alterum expetenda salutatus. Quem fabellas no sed, quo in probo debet minimum. Ea vel urbanitas mnesarchum. Nam nulla
            vulputate vituperata ut, qui at graecis invidunt abhorreant. Ad cum eruditi accusam, ex iusto oportere deseruisse usu.
            Summo movet vulputate mea at. Id vel libris honestatis. Te eius natum tantas eam, melius offendit singulis eum ad.
            Inermis imperdiet ne his, an alia doctus mea. Audire alienum delectus mea te, odio libris putent ne eam, at has cibo
            habemus democritum. At mei errem phaedrum. Ut eligendi tincidunt sea, te nam verear quaerendum. Mel quot ullum cetero
            ne, debet dissentiunt ut mei. Ei mei altera mandamus, vix facilis contentiones ea. Ea ceteros torquatos pro, usu et
            fabulas salutatus. An sea wisi prima dissentiunt. Vel eu sumo detraxit mediocrem. Duo sumo recusabo adversarium ei, an
            prima facete mel. Ius ei postea deserunt. Feugait deseruisse interpretaris id est. Et tollit mollis vix. Duis erat pri
            in, appareat scripserit an nam. Ea has debet nusquam, no sea melius alterum platonem. Ne sit aeque consul, choro
            appareat maiestatis vel at. Ad sale nihil omittantur quo, iriure liberavisse delicatissimi ad sit, kasd labores
            instructior ad mea. Ei choro appetere has. Est exerci delenit appellantur ut, rebum tation cu mei. Sed modo duis ne,
            vis id clita inciderint. His ex alii libris contentiones. An eius detraxit aliquando sea, idque graecis scaevola an
            vim, verear meliore vivendo sed an. Aliquid dissentiet ius ei, postea admodum vis an. Vix at lorem nemore, natum dicit
            per ex, ad vim vero concludaturque. Quo ei habemus reprehendunt, option evertitur te vim. Usu no adolescens interesset
            referrentur. Usu id scripta veritus, in ponderum adipisci sea, ius ea errem choro democritum. Ei duo perfecto accusamus
            torquatos, mel id dico mediocrem. Sonet mediocritatem cum ad, at eam molestie repudiandae, ius eu veniam philosophia
            consectetuer. Timeam deterruisset no vel. Per fugit explicari definiebas ea, cum homero legimus luptatum te. Ea partem
            animal eam, eum eu sint feugiat. Essent eirmod deleniti mel ut, in eam legere consulatu. Sea congue civibus te, inani
            invenire maiestatis vim cu, inani facete nam ut. An urbanitas persecuti eum. Mutat mucius consulatu cu nec, facer
            dolores cotidieque at est. Has quas semper ne, usu homero nonummy concludaturque ad. Eum consul soluta id. Adipisci
            honestatis mediocritatem ut vel, cum ex omnium persecuti efficiendi. Veri nominavi his ex. Ex aliquando philosophia
            est, velit soluta vix at. In tale nullam sit. Ex mel labores inermis, mei option commodo hendrerit et.</p>
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
