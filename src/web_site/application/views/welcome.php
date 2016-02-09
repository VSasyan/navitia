<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Navitia</title>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/pageStyle.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/formStyle.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/resultStyle.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/leaflet.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>font-awesome-4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>entities/fr-idf/fr-idf.css" />
		<script type="text/javascript" src="<?php echo asset_url();?>js/jquery-2.2.0.min.js"></script>
		<script typz="text/javascript" src="<?php echo asset_url();?>js/leaflet.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/script.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/form.js"></script>
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
				<div class="adresse input" id="from">
					<span class="icon">De</span>
					<input value="" placeholder="Station, lieu, adresse" />
					<span class="localization"><i class="fa fa-spinner fa-pulse"></i></span>
				</div>

				<div class="adresse input" id="to">
					<span class="icon">À</span>
					<input value="" placeholder="Station, lieu, adresse" />
					<span class="localization"><i class="fa fa-spinner fa-pulse"></i></span>
				</div>

				<div class="hr"></div>

				<div class="choice" data-value="" id="datetime_represents">
					<span data-value="departure">Départ</span>
					<span data-value="arrival">Arrivée</span>
				</div>

				<div class="input" id="date">
					<span class="icon"><i class="fa fa-calendar"></i></span>
					<input value="<?php echo date("d/m/Y"); ?>" title="Date" />
				</div>

				<div class="input" id="time">
					<span class="icon"><i class="fa fa-clock-o"></i></span>
					<input value="<?php echo date("H:i"); ?>" title="Heure" />
				</div>

				<div class="hr"></div>

				<div class="choice" data-value="" id="order_by">
					<span data-value="duration" title="Préférer les trajets les plus courts">Durée</span>
					<span data-value="walking" title="Préférer les trajets avec le moins de marche">Marche</span>
					<span data-value="trasnfer" title="Préférer les trajets avec le moins de transfert(s)">Transfert</span>
				</div>

				<div class="search">
					<button id="go">Chercher</button>
				</div>
			</div>
			<div id="journeys"></div>
			<div id="map"></div>
		</section>
	</body>
</html>