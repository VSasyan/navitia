var map;
var from = false;
var to = false;
var navitia;

document.addEventListener("DOMContentLoaded", function() {
	navitia = new Navitia('requete.php?r=');
	to = new Adresse(navitia, 'to', 'Arrivée', L.icon({
		iconUrl: 'js/images/marker-icon-red.png',
		iconRetinaUrl: 'js/images/marker-icon-red-x2.png'
	}));
	from = new Adresse(navitia, 'from', 'Départ', L.icon({
		iconUrl: 'js/images/marker-icon-green.png',
		iconRetinaUrl: 'js/images/marker-icon-green-x2.png'
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
		if (!(from.getId() === false) && !(to.getId() == false)) {
			$('#itineraire').html('').addClass('load');
			navitia.journeys({
				from : from.getId(),
				to : to.getId(),
				datetime : '20160209T0830'
			}, function(retour) {
				var r = JSON.parse(retour);
				var html = '';

				// Changer de propositions :
				html += '<div id="links">';
					html += view_link(r.api, 'prev');
					html += view_link(r.api, 'next');
				html += '</div>';

				// Afficher le trajet :
				html += '<div id="journeys">';
					html += view_journeys(r.api);
				html += '</div>';

				$('#itineraire').html(html).removeClass('load');
				map.invalidateSize();
			});
		}
	});
});