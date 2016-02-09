var map;
var from = false;
var to = false;
var navitia;

document.addEventListener("DOMContentLoaded", function() {
	navitia = new Navitia('http://localhost/navitia/web_site/www/index.php/navitia/');
	to = new Adresse(navitia, 'to', 'Arrivée', L.icon({
		iconUrl: 'http://localhost/navitia/web_site/www/assets/js/images/marker-icon-red.png',
		iconRetinaUrl: 'http://localhost/navitia/web_site/www/assets/js/images/marker-icon-red-x2.png'
	}));
	from = new Adresse(navitia, 'from', 'Départ', L.icon({
		iconUrl: 'http://localhost/navitia/web_site/www/assets/js/images/marker-icon-green.png',
		iconRetinaUrl: 'http://localhost/navitia/web_site/www/assets/js/images/marker-icon-green-x2.png'
	}));
	map = L.map('map').setView([48.858578, 2.351828], 12);

	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	map.on('click', function(e) {
		if (from.getLatlng() === false) {from.setLatlng(e.latlng);}
		else {to.setLatlng(e.latlng);}
	});

	$('#map').on('resize', function() {console.log('resize');map.invalidateSize();});

	$('#chercher').click(function() {
		//if (!(from.getId() === false) && !(to.getId() == false)) {
			$('#journeys').html('').addClass('load');
			navitia.journeys({
				from : from.getId(),
				to : to.getId(),
				datetime : '20160209T0830'
			}, function(retour) {
				var r = JSON.parse(retour);
				var html = r.html;
				$('#journeys').html(html).removeClass('load');
				map.invalidateSize();
			});
		//}
	});

	marker.on("drag", function(e) {
		var marker = e.target;
		var position = marker.getLatLng();
		map.panTo(new L.LatLng(position.lat, position.lng));
	});
});