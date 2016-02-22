var Section = function(api) {
	//console.log(api);
	this.type = api.type;
	this.mode = api.mode;
	this.duration = api.duration;
	this.waitingDuration = api.waitingDuration;
	this.departure_date_time = api.departure_date_time;
	this.arrival_date_time = api.arrival_date_time;
	this.links = api.links;
	this.geojson = api.geojson;
	this.transferType = api.transferType;
	this.stop_date_times = api.stop_date_times;
	this.additionnalInformations = api.additionnalInformations;
	this.from = new Position(api.from);
	this.to = new Position(api.to);
	this.displayInformations = new DisplayInformations(api.displayInformations);

	this.layer = L.geoJson(this.geojson, {
		"color": this.displayInformations.getColor(),
		"weight": 5,
		"opacity": 1.00
	});
};

Section.prototype.getLayer = function() {
	return this.layer;
}