function view_link(api, type) {
	var links = api.links;
	var html = '<div class="link ' + type + '"></div>';
	$.each(api.links, function(i, l) {
		if (l.type == type) {
			html = '<div class="link ' + type + '" data-href="' + l.href + '"></div>'
		}
	});
	return html;
}

function view_journeys(api) {
	var html = '<h2>' + api.journeys.length + ' trajet(s) trouvée(s)</h2>';
	
	html += '<div class="journeys">';
		$.each(api.journeys, function(i, j) {html += view_journey(j, i);});
	html += '</div>';

	return html;
}

function view_journey(j, I) {
	var html = '';
	html += '<div class="journey">';
	
		html += '<h3>Trajet n°' + (I+1) + '</h3>';
		html += '<div class="info">';
			html += '<div class="departure_date_time">' + view_date_time(j.departure_date_time, j.duration) + '</div>';
			html += '<div class="duration">' + view_duration(j.duration) + '</div>';
			html += '<div class="arrival_date_time">' + view_date_time(j.arrival_date_time, j.duration) + '</div>';
		html += '</div>';

		html += '<div class="details">';
			$.each(j.sections, function(i,s) {
				html += view_section(s);
			});
		html += '</div>';

	html += '</div>';	
	return html;
}

function view_section(s) {
	var html = '';
	var color = '#000000';

	try {
		if (s.type == 'waiting') {
			html += '<div class="section waiting">';
				html += '<p class="duration">' + view_date_time(s.duration, 0) + '</p>';
			html += '</div>';
			color = '#00FF00';
		} else if (s.type == 'street_network') {
			html += '<div class="section street_network ' + s.mode + '">';
				html += '<p class="from">' + s.from.name + ' ' + view_date_time(s.departure_date_time, 0) + '</p>';
				html += '<p class="to">' + s.to.name + ' ' + view_date_time(s.arrival_date_time, 0) + '</p>';
			html += '</div>';
			color = '#000000';
		} else if (s.type == 'public_transport') {
			html += '<div class="section public_transport">';
				html += '<p class="from">' + s.from.stop_point.name + ' ' + view_date_time(s.departure_date_time, 0) + '</p>';
				html += '<p class="to">' + s.to.stop_point.name + ' ' + view_date_time(s.arrival_date_time, 0) + '</p>';
				html += '<p class="direction">' + s.display_informations.direction + '</p>';
			html += '</div>';
			color = '#0000FF';
		}

		L.geoJson(s.geojson, {
			style: {
				"color": color,
				"weight": 2,
				"opacity": 1
			}
		}).addTo(map);
	} catch (e) {
		console.log(e, s);
	}
	
	return html;
}

function view_date_time(dt, duration, precision) { // 20160209T083050
	var precision = precision || false;
	var time = '';
	if (duration < 86400) {
		time = dt.substring(9, 11) + ':' + dt.substring(11,13) + (precision ? ':' + dt.substring(13,15) : '');
	} else {
		time = dt.substring(6,8) + ' ' + view_month(dt.substring(4,6)) + ' à ' + dt.substring(9, 11) + ':' + dt.substring(11,13) + (precision ? ':' + dt.substring(13,15) : '');
	}
	return '<span class="time">' + time + '</span>';
}

function view_month(m) {
	if (m == 1) {return 'janvier';}
	else if (m == 2) {return 'février';}
	else if (m == 3) {return 'mars';}
	else if (m == 4) {return 'avril';}
	else if (m == 5) {return 'mai';}
	else if (m == 6) {return 'juin';}
	else if (m == 7) {return 'juillet';}
	else if (m == 8) {return 'aout';}
	else if (m == 9) {return 'septembre';}
	else if (m == 10) {return 'octobre';}
	else if (m == 11) {return 'novembre';}
	else if (m == 12) {return 'décembre';}
	else {return '';}
}

function view_duration(n) {
	var unites = [['j', 86400], ['h', 3600], ['m', 60], ['s', 1]];
	str = '';
	for (i = 0; i < unites.length; i++) {
		t = Math.trunc(n/unites[i][1]);
		if (t > 0) {
			n -= t*unites[i][1];
			str += ' '+t+unites[i][0];
		}
	}
	return str;
}

function secondeString(n) {
}