<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Navitia</title>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/leaflet.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>font-awesome-4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>entities/fr-idf/fr-idf.css" />
		<script type="text/javascript" src="<?php echo asset_url();?>js/jquery-2.2.0.min.js"></script>
		<script typz="text/javascript" src="<?php echo asset_url();?>js/leaflet.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/script.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/class/Navitia.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/class/Adresse.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/view/journeys.js"></script>
	</head>
	<body>
		<section>
			<h1>Navitia</h1>
		</section>
		<section>
			<div id="form">
				<div id="trajet">
					<div class="from adresse"><input value="" placeholder="Adresse de départ" title="Adresse de départ" /></div>
					<div class="vers">==></div>
					<div class="to adresse"><input value="" placeholder="Adresse de destination" title="Adresse de destination" /></div>
					<div class="chercher"><button id="chercher">Chercher</button></div>
				</div>
				<div id="journeys"></div>
			</div>
			<div id="map"></div>
		</section>
	</body>
</html>