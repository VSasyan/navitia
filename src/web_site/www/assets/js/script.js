var journeys;
var uri_server = 'http://localhost/navitia/';

document.addEventListener("DOMContentLoaded", function() {
	var navitia = new Navitia(uri_server + 'index.php/navitia/');
	var map = L.map('map').setView([48.858578, 2.351828], 12);
	var options = {
		navitia : navitia,
		map : map,
		from : '.address#from',
		to : '.address#to',
		datetime_represents : '#datetime_represents input',
		date : '#date input',
		time : '#time input',
		order_by : '#order_by input',
		go : '#go',
		results : '#journeys'
	};
	journeys = new Journeys(options);

	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	map.on('click', function(e) {journeys.LatLngMap(e);});

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(e) {
			journeys.getCurrentPosition(e);
		});
	}
});
