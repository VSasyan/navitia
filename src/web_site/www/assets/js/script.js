var journeys;

document.addEventListener("DOMContentLoaded", function() {
	var navitia_ = new Navitia_('http://localhost/navitia/index.php/navitia/');
	var map = L.map('map').setView([48.858578, 2.351828], 12);
	var options = {
		proxy : 'http://localhost/navitia/index.php/navitia/',
		navitia_ : navitia_,
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
	journeys = new Navitia(options);

	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	map.on('click', function(e) {journeys.LatLngMap(e);});

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(e) {
			//journeys.getCurrentPosition(e);
		});
	}
});