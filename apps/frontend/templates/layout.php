<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" xml:lang="en" lang="en">
  <head>
    <title><?php include_slot('title', 'wartajuraroweru.pl') ?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <meta property="og:title" content="WartaJuraRoweru.pl"/>
	<meta property="og:image" content="http://wartajuraroweru.pl/images/header/logo.png"/>
	<meta property="og:description" content="WartaJuraRoweru - serwis rowerowy i nie tylko"/>
	<meta property="og:url" content="http://wartajuraroweru.pl/" />
	<meta property="og:type" content="website" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
<!--[if lte IE 8]>
  <style type="text/css">  
  #INFO, #NAVI, #CONTENT_RIGHT .CONTENT_RIGHT_element {
       background:transparent;
       filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#EA000000,endColorstr=#EA000000);
       zoom: 1;
  }
  
  #INFO {
       height: expression(document.body.clientHeight > 1152? "1150px" : auto);
  }
  
  img.pig_center_img {
	   width: expression(document.body.clientWidth > 602? "600px" : "auto");
  }
  </style>
<![endif]-->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-32370965-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
	  {lang: 'pl'}
	</script>
  </head>
  <body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div id="CONTAINER">
		<div id="HEADER">
				<div id="ALTNAVI_top">
					<a href="<?php echo url_for('article') ?>">info</a>
					<a href="<?php echo url_for('pig') ?>">chlew</a>
					<a href="<?php echo url_for('trip') ?>">trip</a>
					<a href="<?php echo url_for('@shop') ?>">sklep</a>
					<a href="<?php echo url_for('@contact') ?>">kontakt</a>
				</div>
				<h1><a href="<?php echo url_for('homepage') ?>"><img src="/images/header/logo.png" alt="logo" /></a></h1>
		</div>
		<div id="CONTENT">
			<div id="CONTENT_LEFT">
				<div id="INFO">
					<div class="padding">
						<?php if ($sf_user->hasFlash('notice')): ?>
						  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
						<?php endif ?>
						<?php echo $sf_content ?>
					</div>
				</div>
			</div>
			<div id="CONTENT_RIGHT">
				<div class="CONTENT_RIGHT_element fanbar">
					<div>
						<fb:like href="http://wartajuraroweru.pl/" send="false" layout="box_count" width="450" show_faces="true" colorscheme="light"></fb:like>
					</div>
					<div>
						<div class="g-plusone" data-size="tall" data-href="http://wartajuraroweru.pl/"></div>
					</div>
				</div>
				<div id="NAVI">
					<table id="NAVINET">
						<tr>
							<td></td>
							<td></td>
							<td class="_strefa">
								<a href="<?php echo url_for('article') ?>"><img src="/images/navi/strefa_artykul.jpg" alt="strefa_artykul" /></a>
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td><td></td><td></td><td></td><td></td>
						</tr>
						<tr>
							<td class="_strefa">
								<a href="<?php echo url_for('@shop') ?>"><img src="/images/navi/strefa_uslugi.jpg" alt="strefa_uslugi" /></a>
							</td>
							<td></td>
							<td class="_strefa">
								<a href="<?php echo url_for('trip') ?>"><img src="/images/navi/strefa_trip.jpg" alt="strefa_trip" /></a>
							</td>
							<td></td>
							<td class="_strefa">
								<a href="<?php echo url_for('pig') ?>"><img src="/images/navi/strefa_swinia.jpg" alt="strefa_swinia" /></a>
							</td>
						</tr>
						<tr>
							<td></td><td></td><td></td><td></td><td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td class="_strefa">
								<a href="<?php echo url_for('@contact') ?>"><img src="/images/navi/strefa_kontakt.jpg" alt="strefa_kontakt" /></a>
							</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
				<div class="CONTENT_RIGHT_element">
					<a href="<?php echo url_for('@rental') ?>"><h3>Wypozyczalnia Rowerow</h3><p>Sprawdz oferte</p></a>
				</div>
				<div class="CONTENT_RIGHT_element">
					<a href="<?php echo url_for('@shop') ?>"><img src="/images/wizytowka_a_goslawski.png" alt="sklep" /></a>
				</div>
			</div>
		</div>
		<div id="FOOTER">
			<div class="footer_top">
			</div>
			<div class="padding">
				<div id="ALTNAVI_bottom">
					<a href="<?php echo url_for('article') ?>">info</a> -
					<a href="<?php echo url_for('pig') ?>">chlew</a> -
					<a href="<?php echo url_for('trip') ?>">trip</a> -
					<a href="<?php echo url_for('@shop') ?>">sklep</a> -
					<a href="<?php echo url_for('@contact') ?>">kontakt</a>
				</div>
				WartaJuraRoweru.pl | 2014
			</div>
			<div class="footer_bottom">
			</div>
		</div>
	</div>
  </body>
</html>
