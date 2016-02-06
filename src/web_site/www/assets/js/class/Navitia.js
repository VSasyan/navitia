var Navitia = function(proxy) {
   this.proxy = proxy; // requete.php?r=
};

Navitia.prototype.coord = function(latlng, callback) {
	// https://api.navitia.io/v1/coord/{lat};{lng}
	//var url = this.proxy + encodeURIComponent('coord/' + latlng.lng + ';' + latlng.lat);
	var url = this.proxy + 'position/' + latlng.lng + ';' + latlng.lat;
	$.get({
		url : url,
		type : 'GET',
		success : callback
	});
};

Navitia.prototype.journeys = function(params, callback) {
	//	https://api.navitia.io/v1/journeys?from={resource_id_1}&to={resource_id_2}&datetime={date_time_to_leave}
	var url = this.proxy + 'journeys/' + btoa(JSON.stringify(params));
	console.log(url);
	$.get({
		url : url,
		type : 'GET',
		success : callback
	});
};

