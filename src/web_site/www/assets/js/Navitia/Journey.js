var Journey = function(api) {
	//console.log(api);
	this.duration = api.duration;
	this.duration_walking = api.duration_walking;
	this.nb_transfers = api.nb_transfers;
	this.departure_date_time = api.departure_date_time;
	this.arrival_date_time = api.arrival_date_time;
	this.sections = Array();
	for (var i = 0; i < api.sections.length; i++) {
		this.sections.push(new Section(api.sections[i]));
	}
};

Journey.prototype.show = function(map) {
	var that = this;
	$.each(this.sections, function(i, s) {
		s.getLayer().addTo(map);
	});
}

Journey.prototype.hide = function(map) {
	var that = this;
	$.each(this.sections, function(i, s) {
		if (map.hasLayer(s.getLayer())) {map.removeLayer(s.getLayer());}
	});
}